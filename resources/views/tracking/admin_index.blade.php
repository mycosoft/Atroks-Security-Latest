@extends('adminlte::page')

@section('title', 'Track Shipment')

@section('content_header')
    <h1>Track Shipment</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Search by Reference Number</h3>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.tracking.search') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="reference_number">Reference Number</label>
                    <input type="text" name="reference_number" class="form-control" id="reference_number" placeholder="Enter Reference Number (e.g. WR...)" required>
                </div>
                <button type="submit" class="btn btn-primary">Track</button>
            </form>
        </div>
    </div>
@stop
