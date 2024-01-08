<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FootballMatch;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::withTrashed()->with('seats')->get();
        return view('admin.seat.admin-seat', compact('matches'));
    }

    public function store(Request $request)
    {
        $seatsSold = $this->calculateSoldSeats($request->match_id);

        // Validate input data
        $request->validate([
            'status'=>'required|in:available,unavailable',
            'seat_number' => 'required|numeric|min:1000|integer',
            'match_id' => 'required|exists:football_matches,id',
        ]);

        
        try {
            // Create or update Seat record
            $seat = Seat::updateOrCreate(
                ['area_name' => $request->area_name, 'match_id' => $request->match_id],
                [
                    'area_name' => $request->area_name,
                    // 'seat_number' => $request->seat_number,
                    'status'=>'anvailable',
                    'match_id' => $request->match_id,
                ]
            );

            // Update seats_remaining based on seat status
            if ($request->status === 'unavailable') {
                // dd("if ($seat->area_name === $request->area_name && $seat->seat_number >= $request->seat_number && $seat->match_id === $request->match_id)");
                if ($seat->area_name === $request->area_name && $seat->seat_number >= $request->seat_number && $seat->match_id === $request->match_id) {
                    // dd("$seat->seat_number ");
    
                    $seat->seat_number -= $request->seat_number;
                    $seat->footballMatch->seats_remaining += $request->seat_number;
                    $seat->footballMatch->save();
                    $seat->save();
                }
                else{
                    return redirect()->route('admin.seat.index', $seat->id)->with('msg', "Tạo không thành công.");
                }
               
            }
            else{
                $seat->seat_number = $request->seat_number;
                $seat->save();
            }

            // Update total_seat for the FootballMatch
            $totalSeat = Seat::where('match_id', $request->match_id)->sum('seat_number') ?? 0;
            $seat->total_seat = $totalSeat;
            $seat->save();
            FootballMatch::where('id', $request->match_id)->update(['seat' => $totalSeat]);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('admin.seat.index', $seat->id)->with('msg', "Tạo thành công.");
    }


    public function forceDelete($id, $area_name)
    {
        $seat = Seat::where('match_id', $id)->where('area_name', $area_name)->first();

        if ($seat) {

            // Xóa ghế
            $seat->forceDelete();

            // Cập nhật total_seat trong FootballMatch
            $match = FootballMatch::find($id);  // Lấy đối tượng trận đấu
            $match->update(['seat' => 0, 'seats_remaining' => 0]);

            $matches = FootballMatch::withTrashed()->with('seats')->get();

            return view('admin.seat.admin-seat', [
                'matches' => $matches,
                'msg' => "Xóa khu vực $area_name thành công",
            ]);
        }

        return redirect()->route('admin.seat.index')->with('msg', "Seat not found");
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
        $seat = Seat::where('match_id', $id)->where('area_name', $area_name)->firstOrFail();

        $request->validate([
            'seat_number' => 'required|numeric|min:1000|integer',
            'status' => 'required|in:available,unavailable',
            'match_id' => 'required|exists:football_matches,id',
        ]);

        $seatsRemaining = $this->calculateRemainingSeats($request->match_id);

        if ($seatsRemaining < $request->seat_number) {
            return view('admin.seat.admin-seat-update', [
                'msg' => "Số ghế quá lớn hoặc Số ghế quá đã đủ vui lòng nhập lại",
                'id' => $id,
                'seat' => $seat,
                'area_name' => $area_name,
            ]);
        }

        $seat->update([
            'area_name' => $request->area_name,
            'seat_number' => $request->seat_number,
            'status' => $request->status,
        ]);

        $remainingAfterDecrement = max(0, $seatsRemaining - $request->seat_number);
        FootballMatch::where('id', $request->match_id)->update(['seats_remaining' => $remainingAfterDecrement]);

        return view('admin.seat.admin-seat-update', [
            'msg' => "Tạo thành công. Số ghế còn lại: $remainingAfterDecrement",
            'id' => $id,
            'seat' => $seat,
            'area_name' => $area_name,
        ]);
    }

    protected function calculateSoldSeats($matchId)
    {
        $match = FootballMatch::find($matchId);

        if ($match) {
            $totalSeats = $match->total_seat;
            $soldSeats = Seat::where('match_id', $matchId)->where('status', 'unavailable')->sum('seat_number');
            return $soldSeats;
        }

        return 0;
    }

    protected function calculateRemainingSeats($matchId)
    {
        $match = FootballMatch::find($matchId);

        if ($match) {
            $totalSeats = $match->total_seat;
            $soldSeats = Seat::where('match_id', $matchId)->where('status', 'unavailable')->sum('seat_number');
            return max(0, $totalSeats - $soldSeats);
        }

        return 0;
    }
}
