@extends('layouts.app')

@section('content')
    <a href="{{ route('admin-index') }}" class="btn btn-primary btn-lg mx-3">Back to Admin Page</a>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.seat.store') }}" method="post">
                @csrf <!-- Include the CSRF token for security -->
                <table class="table table-bordered" id="table-product">
                    <tr>
                        <td>Area</td>
                        <td>
                            <select name="area_id" required>
                                <option value="1">Normal</option>
                                <option value="2">VIP</option>
                                <option value="3">Special</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Value</td>
                        <td><input type="number" name="seat_number" value="10" required></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td> <select name="status" required>
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Match ID</td>
                        <td>
                            <select name="match_id" required>
                                @foreach ($matches as $match)
                                    <option value="{{ $match->match_id }}">{{ $match->home_team }} vs
                                        {{ $match->away_team }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </td>
                    </tr>
                </table>
            </form>

        </div>

    </section>
@endsection
