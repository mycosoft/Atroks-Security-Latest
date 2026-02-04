@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <!-- Total Records Box -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalRecords }}</h3>
                    <p>Safe Keeping Records</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('safe-keeping.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Total Users Box -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>
                    <p>System Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Total Clients Box -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalClients }}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <a href="{{ route('clients.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Tracking Box -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Track</h3>
                    <p>Search Shipment</p>
                </div>
                <div class="icon">
                    <i class="fas fa-search-location"></i>
                </div>
                <a href="{{ route('admin.tracking.index') }}" class="small-box-footer">Go to Tracking <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Recent SAFE KEEPING Activity</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Ref No</th>
                                <th>Client</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($recentRecords as $record)
                                <tr>
                                    <td><a href="{{ route('safe-keeping.show', $record->id) }}">{{ $record->reference_number }}</a></td>
                                    <td>{{ $record->client ? $record->client->name : 'No Client' }}</td>
                                    <td>{{ $record->item_description }}</td>
                                    <td><span class="badge badge-success">{{ $record->status }}</span></td>
                                    <td>{{ $record->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No recent records found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <a href="{{ route('safe-keeping.create') }}" class="btn btn-sm btn-info float-left">Create New Record</a>
                    <a href="{{ route('safe-keeping.index') }}" class="btn btn-sm btn-secondary float-right">View All Records</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Dashboard loaded!'); </script>
@stop
