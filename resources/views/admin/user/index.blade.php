@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">All Users</h4>

        {{-- <!-- Import and Export Buttons -->
        <div class="d-flex">
            <a href="{{ route('submit-order') }}" class="btn btn-primary me-2 text-white">Submit an order</a>
            <a href="{{ route('request-recommendation') }}" class="btn btn-secondary text-white">Request Recommendations</a>
        </div> --}}
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">List of Users</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Approve</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $user)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input approve-switch" type="checkbox" id="approveSwitch{{ $user->id }}" {{ $user->is_approved ? 'checked' : '' }}>
                            <label class="form-check-label" for="approveSwitch{{ $user->id }}"></label>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="User Actions">
                            <button type="button" class="btn btn-primary btn-show" data-user-id="{{ $user->id }}">Show</button>
                            <button type="button" class="btn btn-warning btn-edit" data-user-id="{{ $user->id }}">Edit</button>
                            <button type="button" class="btn btn-danger btn-delete" data-user-id="{{ $user->id }}">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <!--/ Striped Rows -->


</div>
<!-- / Content -->


@endsection


@section('scripts')
<script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.approve-switch').change(function () {
        var userId = $(this).attr('id').replace('approveSwitch', '');
        var isApproved = $(this).prop('checked');

        // Convert boolean to string before sending
        var isApprovedString = isApproved ? 'true' : 'false';

        // Make AJAX request to update is_approved
        $.ajax({
            url: '{{ route('update-approval', ['id' => ':id']) }}'.replace(':id', userId),
            type: 'POST',
            data: { is_approved: isApprovedString }, // Send boolean as a string
            success: function (data) {
                console.log('Approval status updated successfully');
            },
            error: function (error) {
                console.error('Error updating approval status:', error);
            }
        });
    });
});

</script>
@endsection
