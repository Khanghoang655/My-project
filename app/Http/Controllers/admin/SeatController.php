<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FootballMatch;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::withTrashed()->with('seats')->get();

        return view('admin.seat.admin-seat', compact('matches'));
    }
    public function store(Request $request)
    {
        // Kiểm tra số ghế đã đủ hay chưa

        $seatsRemaining = $this->calculateRemainingSeats($request->match_id);
        if ($seatsRemaining < $request->seat_number) {
            return redirect()->route('admin.seat.index')->with('msg', "Số ghế quá lớn hoặc Số ghế quá đã đủ vui lòng nhập lại");
        }

        // Kiểm tra dữ liệu nhập vào và validate theo các quy tắc
        $request->validate([
            'seat_number' => 'required|numeric|min:1000|integer',
            'status' => 'required|in:available,unavailable',
            'match_id' => 'required|exists:football_matches,id',
        ]);

        // Tạo hoặc cập nhật bản ghi Seat mới với dữ liệu đã được validate
        try {
            $seat = Seat::updateOrCreate(
                ['area_name' => $request->area_name, 'match_id' => $request->match_id],
                [
                    'area_name' => $request->area_name,
                    'seat_number' => DB::raw('seat_number + ' . $request->seat_number),
                    'status' => $request->status,
                    'match_id' => $request->match_id,
                ]
            );

            // Check if decrementing by requested seat number would result in a negative value
            $remainingAfterDecrement = max(0, $seatsRemaining - $request->seat_number);

            FootballMatch::where('id', $request->match_id)->update(['seats_remaining' => $remainingAfterDecrement]);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        // Hiển thị thông điệp
        if ($remainingAfterDecrement === 0) {
            return redirect()->route('admin.seat.index', $seat->id)->with('msg', "Đã đủ số ghế. Số ghế còn lại: 0");
        } else {
            return redirect()->route('admin.seat.index', $seat->id)->with('msg', "Tạo thành công. Số ghế còn lại: $remainingAfterDecrement");
        }
    }

    public function forceDelete($id, $area_name)
    {
        Seat::where('match_id', $id)->where('area_name', $area_name)->forceDelete();
        return view('admin.seat.admin-seat')->with('msg', "Xóa khu vực $area_name thành công ");
    }
    public function detail($id, $area_name)
    {
        $seat = Seat::with('footballMatch')->where('match_id', $id)->where('area_name', $area_name)->firstOrFail();

        return view('admin.seat.admin-seat-update', [
            'seat' => $seat,
            'area_name' => $area_name
        ]);

    }
    public function update($id, $area_name, Request $request)
    {
        // Find the seat
        $seat = Seat::where('match_id', $id)->where('area_name', $area_name)->firstOrFail();

        // Kiểm tra dữ liệu nhập vào và validate theo các quy tắc
        $request->validate([
            'seat_number' => 'required|numeric|min:1000|integer',
            'status' => 'required|in:available,unavailable',
            'match_id' => 'required|exists:football_matches,id',
        ]);

        // Calculate remaining seats after validation
        $seatsRemaining = $this->calculateRemainingSeats($request->match_id);

        // Check if remaining seats are sufficient
        if ($seatsRemaining < $request->seat_number) {
            return view('admin.seat.admin-seat-update', [
                'msg' => "Số ghế quá lớn hoặc Số ghế quá đã đủ vui lòng nhập lại",
                'id' => $id,
                'seat' => $seat,
                'area_name' => $area_name,
            ]);
        }

        // Update the seat
        $seat->update([
            'area_name' =>$request->area_name,
            'seat_number' => $request->seat_number,
            'status' => $request->status,
        ]);

        // Update the remaining seats
        $remainingAfterDecrement = max(0, $seatsRemaining - $request->seat_number);
        FootballMatch::where('id', $request->match_id)->update(['seats_remaining' => $remainingAfterDecrement]);

        // Hiển thị thông điệp
        return view('admin.seat.admin-seat-update', [
            'msg' => "Tạo thành công. Số ghế còn lại: $remainingAfterDecrement",
            'id' => $id,
            'seat' => $seat,
            'area_name' => $area_name,
        ]);
    }


    protected function calculateRemainingSeats($matchId)
    {
        // Lấy thông tin về trận đấu và mối quan hệ với seats
        $match = FootballMatch::find($matchId);

        // Kiểm tra xem có thông tin trận đấu không
        if ($match) {
            // Lấy tổng số ghế và tổng số ghế đã sử dụng
            $totalSeats = $match->seat;
            $usedSeats = Seat::where('match_id', $matchId)->sum('seat_number');

            // Tính toán số ghế còn lại
            return $totalSeats - $usedSeats;
        }

        // Trả về giá trị mặc định nếu không có thông tin
        return 0;
    }
}
