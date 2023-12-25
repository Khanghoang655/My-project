@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mt-5">
            <h1 class="display-3 font-weight-bold ">Welcome To Admin Page</h1>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="btn-group">
            <a href="{{ route('admin.update-matches') }}" class="btn btn-primary btn-lg mx-3">Matches</a>
            <a href="{{ route('admin.update-competition') }}" class="btn btn-primary btn-lg mx-3">Competition</a>
        </div>
    </div>
