<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FootballMatch;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::withTrashed()->get();

        return view('admin.seat.admin-seat', compact('matches'));
    }
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào và validate theo các quy tắc
       $request->validate([
            'area_id' => 'required|exists:seats,id',  // Sửa lại thành exists:areas,id
    'seat_number' => 'required|numeric|digits_between:1,20',
    'status' => 'required|in:available,unavailable',
    'match_id' => 'required|exists:football_matches,id',
        ]);
        // Tạo bản ghi Seat mới với dữ liệu đã được validate
        $seat = Seat::create([
            'area_id' => $request->area_id,
            'seat_number' => $request->seat_number,
            'status' => $request->status,
            'match_id' => $request->match_id,
        ]);
    
        // Chuyển hướng đến trang chi tiết ghế ngồi vừa tạo
        return redirect()->route('admin.seat.index', $seat->id)->with('msg', 'Tạo thành công');
    }
    
    
    

}
