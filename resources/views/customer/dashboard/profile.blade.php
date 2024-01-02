@extends('customer.layouts.app')

@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Account Setting</h4>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          {{-- <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="../assets/img/avatars/1.png"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
              />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input
                    type="file"
                    id="upload"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg"
                  />
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                  <i class="bx bx-reset d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" /> --}}
          <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            <form id="formAccountSettings" method="POST" action="{{ route('update-profile') }}">
                @csrf
              <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ $customer->name }}" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{ $customer->email }}" readonly />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Profile Url</label>
                    <input class="form-control" type="text" id="profile_url" name="profile_url" value="{{ $customer->profile_url }}" autofocus />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Mobile Number</label>
                    <input class="form-control" type="number" id="mobile_number" name="mobile_number" value="{{ $customer->mobile_number }}" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">country</label>
                  <input type="text" class="form-control" id="country" name="country" value="{{ $customer->country }}" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">New Password</label>
                    <input class="form-control" type="password" id="password" name="password" />
                </div>

              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
        <div class="card">
          <h5 class="card-header">Delete Account</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
              </div>
            </div>
            <!-- Add this form inside the existing content section -->
            <form id="formAccountDeactivation" method="POST" action="{{ route('deactivate-account') }}">
                @csrf
                <div class="form-check mb-3">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="accountActivation"
                        id="accountActivation"
                    />
                    <label class="form-check-label" for="accountActivation">I confirm my account deletion</label>
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">Delete Account</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->


@endsection
