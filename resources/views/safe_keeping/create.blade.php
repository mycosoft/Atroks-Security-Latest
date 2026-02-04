@extends('adminlte::page')

@section('title', 'New Safe Keeping Record')

@section('content_header')
    <h1>Create Safe Keeping Record</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Depositor & Item Details</h3>
        </div>
        <form action="{{ route('safe-keeping.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="client_id">Select Client</label>
                    <select class="form-control" id="client_id" name="client_id" required>
                        <option value="">-- Select Client --</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }} - {{ Str::limit($client->address, 30) }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">
                        Don't see the client? <a href="#" data-toggle="modal" data-target="#addClientModal">Add New Client</a>
                    </small>
                </div>
                <div class="form-group">
                    <label for="shipper_name">Shipper / Depositor Name (Optional)</label>
                    <input type="text" class="form-control" id="shipper_name" name="shipper_name" placeholder="Enter shipper name">
                </div>
                <div class="form-group">
                    <label for="stored_at">Date</label>
                    <input type="date" class="form-control" id="stored_at" name="stored_at" value="{{ date('Y-m-d') }}" required>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="weight">Weight (e.g. 2502KGS)</label>
                            <input type="text" class="form-control" id="weight" name="weight" placeholder="2502KGS" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="item_description">Item Description (e.g. Gold Bars)</label>
                            <input type="text" class="form-control" id="item_description" name="item_description" placeholder="Gold Bars" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Generate Receipt</button>
            </div>
        </form>
    </div>

    <!-- Add Client Modal -->
    <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addClientForm">
                    @csrf
                    <div class="modal-body">
                        <div id="clientFormErrors" class="alert alert-danger d-none"></div>
                        <div id="clientFormSuccess" class="alert alert-success d-none"></div>
                        
                        <div class="form-group">
                            <label for="modal_name">Client Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="modal_name" name="name" placeholder="Enter client name" required>
                        </div>
                        <div class="form-group">
                            <label for="modal_address">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="modal_address" name="address" rows="3" placeholder="Enter address" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modal_phone_number">Phone Number (Optional)</label>
                                    <input type="text" class="form-control" id="modal_phone_number" name="phone_number" placeholder="+256...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modal_email">Email (Optional)</label>
                                    <input type="email" class="form-control" id="modal_email" name="email" placeholder="client@example.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveClientBtn">
                            <i class="fas fa-save"></i> Save Client
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#addClientForm').on('submit', function(e) {
        e.preventDefault();
        
        // Clear previous messages
        $('#clientFormErrors').addClass('d-none').html('');
        $('#clientFormSuccess').addClass('d-none').html('');
        
        // Disable submit button
        $('#saveClientBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        
        $.ajax({
            url: '{{ route("clients.store") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Show success message
                $('#clientFormSuccess').removeClass('d-none').html('Client added successfully!');
                
                // Add new client to dropdown
                var newOption = new Option(response.name + ' - ' + response.address.substring(0, 30), response.id, true, true);
                $('#client_id').append(newOption).trigger('change');
                
                // Reset form
                $('#addClientForm')[0].reset();
                
                // Close modal after 1 second
                setTimeout(function() {
                    $('#addClientModal').modal('hide');
                    $('#clientFormSuccess').addClass('d-none').html('');
                }, 1000);
                
                // Re-enable submit button
                $('#saveClientBtn').prop('disabled', false).html('<i class="fas fa-save"></i> Save Client');
            },
            error: function(xhr) {
                // Re-enable submit button
                $('#saveClientBtn').prop('disabled', false).html('<i class="fas fa-save"></i> Save Client');
                
                // Show error messages
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorHtml = '<ul class="mb-0">';
                    $.each(errors, function(key, value) {
                        errorHtml += '<li>' + value[0] + '</li>';
                    });
                    errorHtml += '</ul>';
                    $('#clientFormErrors').removeClass('d-none').html(errorHtml);
                } else {
                    $('#clientFormErrors').removeClass('d-none').html('An error occurred. Please try again.');
                }
            }
        });
    });
    
    // Clear form when modal is closed
    $('#addClientModal').on('hidden.bs.modal', function () {
        $('#addClientForm')[0].reset();
        $('#clientFormErrors').addClass('d-none').html('');
        $('#clientFormSuccess').addClass('d-none').html('');
    });
});
</script>
@stop

