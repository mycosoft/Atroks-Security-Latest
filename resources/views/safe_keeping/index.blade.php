@extends('adminlte::page')

@section('title', 'Safe Keeping Records')

@section('content_header')
    <h1>All Safe Keeping Records</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Records List</h3>
            <div class="card-tools">
                <a href="{{ route('safe-keeping.create') }}" class="btn btn-primary btn-sm">Create New</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ref No</th>
                        <th>Client</th>
                        <th>Item</th>
                        <th>Weight</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ $record->reference_number }}</td>
                            <td>{{ $record->client ? $record->client->name : 'No Client' }}</td>
                            <td>{{ $record->item_description }}</td>
                            <td>{{ $record->weight }}</td>
                            <td>{{ optional($record->stored_at)->format('d/m/Y') ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('safe-keeping.edit', $record->id) }}" class="btn btn-xs btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('safe-keeping.show', $record->id) }}" class="btn btn-xs btn-info">
                                    <i class="fas fa-eye"></i> View Receipt
                                </a>
                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#statusModal{{ $record->id }}">
                                    <i class="fas fa-tasks"></i> Add Status
                                </button>
                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal{{ $record->id }}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>

                        <!-- Status Update Modal -->
                        <div class="modal fade" id="statusModal{{ $record->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5 class="modal-title text-white">Add Status Update</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('safe-keeping.add-status', $record->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="alert alert-info">
                                                <strong>Reference:</strong> {{ $record->reference_number }}<br>
                                                <strong>Current Status:</strong> <span class="badge badge-primary">{{ $record->status }}</span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="status{{ $record->id }}">New Status <span class="text-danger">*</span></label>
                                                <select class="form-control" id="status{{ $record->id }}" name="status" required>
                                                    <option value="">-- Select Status --</option>
                                                    <option value="Received">Received</option>
                                                    <option value="Stored">Stored</option>
                                                    <option value="In Transit">In Transit</option>
                                                    <option value="Released">Released</option>
                                                    <option value="On Hold">On Hold</option>
                                                    <option value="Custom">Custom (Enter below)</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group" id="customStatusGroup{{ $record->id }}" style="display: none;">
                                                <label for="customStatus{{ $record->id }}">Custom Status</label>
                                                <input type="text" class="form-control" id="customStatus{{ $record->id }}" placeholder="Enter custom status">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="description{{ $record->id }}">Description</label>
                                                <input type="text" class="form-control" id="description{{ $record->id }}" name="description" placeholder="Brief description of this status">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="notes{{ $record->id }}">Notes (Optional)</label>
                                                <textarea class="form-control" id="notes{{ $record->id }}" name="notes" rows="3" placeholder="Additional notes or comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-check"></i> Add Status
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal{{ $record->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title text-white">Confirm Delete</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this record?</p>
                                        <div class="alert alert-warning">
                                            <strong>Reference Number:</strong> {{ $record->reference_number }}<br>
                                            <strong>Client:</strong> {{ $record->client ? $record->client->name : 'No Client' }}<br>
                                            <strong>Item:</strong> {{ $record->item_description }}
                                        </div>
                                        <p class="text-danger"><strong>This action cannot be undone!</strong></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('safe-keeping.destroy', $record->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i> Yes, Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
<script>
$(document).ready(function() {
    // Handle custom status input
    $('select[name="status"]').on('change', function() {
        var recordId = $(this).attr('id').replace('status', '');
        var customGroup = $('#customStatusGroup' + recordId);
        var customInput = $('#customStatus' + recordId);
        
        if ($(this).val() === 'Custom') {
            customGroup.show();
            customInput.attr('required', true);
        } else {
            customGroup.hide();
            customInput.attr('required', false);
        }
    });
    
    // Update status value when custom is entered
    $('input[id^="customStatus"]').on('input', function() {
        var recordId = $(this).attr('id').replace('customStatus', '');
        var statusSelect = $('#status' + recordId);
        
        if ($(this).val().trim() !== '') {
            statusSelect.val($(this).val());
        }
    });
});
</script>
@stop

