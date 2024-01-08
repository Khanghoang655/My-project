@extends('admin.layouts.app')


@section('content')

    <body style="background-color: #fff; color: #000; padding: 50px; text-align: center;">
        <section class="content" style="margin: 0 auto; max-width: 500px;">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <form action="{{ route('admin.seat.store') }}" method="post">
                @csrf
                <table style="width: 100%;" class="table table-bordered" id="table-product">
                    <tr>
                        <td style="width: 20%;">Area</td>
                        <td>
                            <select name="area_name" required style="width: 100%; padding: 5px;">
                                <option value="Normal">Normal</option>
                                <option value="VIP">VIP</option>
                                <option value="Special">Special</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Value</td>
                        <td><input type="number" name="seat_number" value="1000" required
                                style="width: 100%; padding: 5px;"></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" required style="width: 100%; padding: 5px;">
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Match ID</td>
                        <td>
                            <select name="match_id" required style="width: 100%; padding: 5px;">
                                @forelse ($matches as $match)
                                    @php
                                        $match_date = \Carbon\Carbon::parse($match->date_time);
                                    @endphp
                                    @if ($match_date->isFuture())
                                        <option value="{{ $match->id }}">{{ $match->home_team }} vs {{ $match->away_team }}</option>
                                    @endif
                                @empty
                                    <option>Không có trận đấu nào đã diễn ra</option>
                                @endforelse
                            </select>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit"
                                style="width: 100%; background-color: #007BFF; color: #fff; padding: 10px; border: none; border-radius: 5px;">Thêm</button>
                        </td>
                    </tr>
                </table>
            </form>

            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Home Team</th>
                        <th scope="col">Away Team</th>
                        <th scope="col">Match Time</th>
                        <th scope="col">Date Time</th>
                        <th scope="col">Current Time</th>
                        <th scope="col">Area Name</th>
                        <th scope="col">Total Seat</th>
                        <th scope="col">Sold Seat</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matches as $match)
                        @if (strtotime($match->date_time) > time())
                            <tr>
                                <td>{{ $match->home_team }}</td>
                                <td>{{ $match->away_team }}</td>
                                <td>{{ $match->match_time }}</td>
                                <td>{{ Carbon\Carbon::parse($match->date_time)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}</td>
                                <td>{{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}</td>
                                <td>
                                    @foreach ($match->seats as $seat)
                                        {{ $seat->area_name }}
                                        <br>
                                        <small>{{ $seat->seat_number }}</small>
                                    @endforeach
                                </td>
                                <td>{{$match->seat}}</td>
                                <td>{{$match->seats_remaining}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @if (!$match->seats->isEmpty())
                                            @php
                                                $firstSeat = $match->seats->first();
                                            @endphp
                                            <form action="{{ route('admin.seat.force.delete', ['id' => $match->id, 'area_name' => $firstSeat->area_name]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning">Force Delete</button>
                                            </form>
                                            <form action="{{ route('admin.seat.detail',['id' => $match->id, 'area_name' => $firstSeat->area_name]) }}"method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                            </form>
                                        @else
                                            <p>No seats available for this match.</p>
                                        @endif
                                    </div>
                                    
                                    
                                </td>
                                
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            
        </section>
    </body>
@endsection
