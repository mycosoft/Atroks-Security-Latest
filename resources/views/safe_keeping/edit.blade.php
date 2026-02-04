@extends('adminlte::page')

@section('title', 'Edit Safe Keeping Record')

@section('content_header')
    <h1>Edit Safe Keeping Record: {{ $record->reference_number }}</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Details</h3>
        </div>
        <form action="{{ route('safe-keeping.update', ['record' => $record->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="client_id">Select Client</label>
                    <select class="form-control" id="client_id" name="client_id" required>
                        <option value="">-- Select Client --</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id', $record->client_id) == $client->id ? 'selected' : '' }}>
                                {{ $client->name }} - {{ Str::limit($client->address, 30) }}
                            </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">
                        Need to update client info? <a href="{{ route('clients.edit', $record->client_id ?? 0) }}" target="_blank">Edit Client</a>
                    </small>
                </div>
                <div class="form-group">
                    <label for="shipper_name">Shipper / Depositor Name (Optional)</label>
                    <input type="text" class="form-control" id="shipper_name" name="shipper_name" value="{{ old('shipper_name', $record->shipper_name) }}">
                </div>
                <div class="form-group">
                    <label for="stored_at">Date</label>
                    <input type="date" class="form-control" id="stored_at" name="stored_at" value="{{ old('stored_at', optional($record->stored_at)->format('Y-m-d')) }}" required>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight', $record->weight) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="item_description">Item Description</label>
                            <input type="text" class="form-control" id="item_description" name="item_description" value="{{ old('item_description', $record->item_description) }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Record</button>
                <a href="{{ route('safe-keeping.index') }}" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
@stop
