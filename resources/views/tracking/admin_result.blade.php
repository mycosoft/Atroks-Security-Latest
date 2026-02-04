@extends('adminlte::page')

@section('title', 'Tracking Result')

@section('content_header')
    <h1>Tracking Result: {{ $record->reference_number }}</h1>
@stop

@section('content')
    @php
        $statusClass = match($record->status) {
            'Stored' => 'bg-info',
            'Released' => 'bg-success',
            'In Transit' => 'bg-warning',
            default => 'bg-secondary'
        };
    @endphp

    <div class="row">
        <div class="col-md-6">
            <div class="card card-widget widget-user-2 shadow-sm">
                <div class="widget-user-header {{ $statusClass }}">
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="https://ui-avatars.com/api/?name=PKG&background=fff&color=000" alt="Package">
                    </div>
                    <h3 class="widget-user-username">{{ $record->client_name }}</h3>
                    <h5 class="widget-user-desc">Ref: {{ $record->reference_number }}</h5>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="nav-link">
                                Status <span class="float-right badge {{ $statusClass }}">{{ $record->status }}</span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">
                                Shipper <span class="float-right">{{ $record->shipper_name ?? 'N/A' }}</span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">
                                Item Description <span class="float-right">{{ $record->item_description }}</span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">
                                Weight <span class="float-right">{{ $record->weight }}</span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">
                                Date Stored <span class="float-right">{{ $record->created_at->format('d M Y') }}</span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
             <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Actions</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('safe-keeping.show', $record->id) }}" class="btn btn-info btn-block">
                        <i class="fas fa-print"></i> Print Receipt
                    </a>
                    <a href="{{ route('safe-keeping.edit', $record->id) }}" class="btn btn-warning btn-block">
                        <i class="fas fa-edit"></i> Edit Record
                    </a>
                    <a href="{{ route('admin.tracking.index') }}" class="btn btn-default btn-block">
                        Track Another
                    </a>
                </div>
             </div>
        </div>
    </div>
@stop
