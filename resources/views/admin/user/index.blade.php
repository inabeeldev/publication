@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row animate__animated animate__fadeIn">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-9">
                  <div class="card-body">
                    <h5 class="card-title text-primary">All Customers</h5>


                    <a href="{{ route('staff-users') }}" class="btn btn-sm btn-outline-primary">Open Staff</a>
                  </div>
                </div>
                <div class="col-sm-3 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{ asset('public/assets/img/illustrations/man-with-laptop-light.png') }}"
                      height="100"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
    <!-- Striped Rows -->
    <div class="card animate__animated animate__fadeInUp">
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
                            <button type="button" class="btn btn-primary btn-show" data-bs-toggle="modal" data-bs-target="#showUserModal2{{ $user->id }}">Show</button>
                            {{-- <button type="button" class="btn btn-warning btn-edit" data-user-id="{{ $user->id }}">Edit</button> --}}
                            <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Show Modal -->
               <!-- Show Modal -->
                <div class="modal fade" id="showUserModal2{{ $user->id }}" tabindex="-1" aria-labelledby="showUserModalLabel2{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="showUserModalLabel2{{ $user->id }}">User Details</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <strong>User Type:</strong> {{ $user->user_type }}
                                </div>
                                <div class="mb-3">
                                    <strong>User Name:</strong> {{ $user->name }}
                                </div>
                                <div class="mb-3">
                                    <strong>User Email:</strong> {{ $user->email }}
                                </div>
                                <div class="mb-3">
                                    <strong>Profile URL:</strong> {{ $user->profile_url ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Mobile Number:</strong> {{ $user->mobile_number ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Country:</strong> {{ $user->country ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Contact Preference:</strong> {{ $user->contact_preference ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>GetClout Services:</strong>
                                    <ul>
                                        @foreach(json_decode($user->getclout_services) as $service)
                                            <li>{{ $service }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="mb-3">
                                    <strong>Order Timing:</strong> {{ $user->order_timing ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Order Quantity:</strong> {{ $user->order_quantity ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>How Did You Hear:</strong> {{ $user->how_did_you_hear ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Zoom Call:</strong> {{ $user->zoom_call ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Additional Notes:</strong> {{ $user->additional_notes ?? 'Not available' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Is Approved:</strong> {{ $user->is_approved ? 'Yes' : 'No' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Instagram Profile:</strong> {{ $user->instagram ? $user->instagram : 'Not provided by customer' }}
                                </div>
                                <div class="mb-3">
                                    <strong>LinkedIn Profile:</strong> {{ $user->linkedin ? $user->linkedin : 'Not provided by customer' }}
                                </div>
                                <div class="mb-3">
                                    <strong>YouTube Channel:</strong> {{ $user->youtube ? $user->youtube : 'Not provided by customer' }}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Show Modal End -->
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
