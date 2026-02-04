@extends('adminlte::page')

@section('title', 'Create Client')

@section('content_header')
    <h1>Create Client</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Client Details</h3>
        </div>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Client Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter client name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number (Optional)</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="+256...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email (Optional)</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="client@example.com">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create Client</button>
                <a href="{{ route('clients.index') }}" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
@stop
