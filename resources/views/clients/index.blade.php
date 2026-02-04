@extends('adminlte::page')

@section('title', 'Clients')

@section('content_header')
    <h1>Clients Management</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Clients</h3>
            <div class="card-tools">
                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">Add New Client</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Records</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ Str::limit($client->address, 30) }}</td>
                            <td>{{ $client->phone_number ?? 'N/A' }}</td>
                            <td>{{ $client->email ?? 'N/A' }}</td>
                            <td><span class="badge badge-info">{{ $client->safe_keeping_records_count }}</span></td>
                            <td>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-xs btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @if($client->safe_keeping_records_count == 0)
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No clients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
