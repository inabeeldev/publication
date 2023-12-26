@extends('layouts.home')

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
            <form id="formAccountSettings" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="firstName"
                    value="John"
                    autofocus
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="john.doe@example.com"
                    placeholder="john.doe@example.com"
                  />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="profile_url" class="form-label">Agency URL or Personal LinkedIn (If solo professional)</label>
                    <input type="text" class="form-control" id="profile_url" name="profile_url" placeholder="https://" />
                  </div>

                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                  <div class="input-group input-group-merge">
                    {{-- <span class="input-group-text">US (+1)</span> --}}
                    <input
                      type="text"
                      id="phoneNumber"
                      name="phoneNumber"
                      class="form-control"
                      placeholder="202 555 0111"
                    />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="state" class="form-label">State</label>
                  <input class="form-control" type="text" id="state" name="state" placeholder="California" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="zipCode" class="form-label">Zip Code</label>
                  <input
                    type="text"
                    class="form-control"
                    id="zipCode"
                    name="zipCode"
                    placeholder="231465"
                    maxlength="6"
                  />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">Country</label>
                    <input class="form-control" type="text" id="country" name="country" placeholder="USA" />
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
            <form id="formAccountDeactivation" onsubmit="return false">
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="accountActivation"
                  id="accountActivation"
                />
                <label class="form-check-label" for="accountActivation"
                  >I confirm my account deletion</label
                >
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
