<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login Basic - Pages | getclout</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/demo.css') }}" />


    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('public/assets/vendor/js/helpers.js') }}"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('public/assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner authentication-inner-register">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center d-flex">
                    <a href="index.html" class="app-brand-link gap-2">
                        <img src="{{ asset('public/assets/img/logo/logo.jpg') }}" alt="" style="object-fit: cover; max-width: 200px; height: auto;">
                    </a>
                </div>
                <!-- /Logo -->
                @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                <h3 class="mb-5 text-center">Sign Up</h3>

            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('customer-register') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                    <label for="name" class="form-label">Who is contact person for this application?</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <label for="profile_url" class="form-label">Agency URL or Personal LinkedIn (If solo professional)</label>
                    <input type="text" class="form-control" id="profile_url" name="profile_url" placeholder="https://" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <label for="mobile_number" class="form-label">Contact person's mobile number</label>
                    <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Your Mobile Number" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Your Country" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="contact_preference" class="form-label">What do you prefer? (must be connected to the number above) </label>
                        <select class="form-select" id="contact_preference" name="contact_preference">
                            <option value="">Select One</option>
                            <option value="imessage">iMessage</option>
                            <option value="whatsapp">WhatsApp</option>
                            <option value="telegram">Telegram</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="getclout_services" class="form-label">Which getclout services are you interested in whitelabeling? (Select all that apply)</label>
                        <select class="form-select select2" id="getclout_services" name="getclout_services[]" multiple="multiple" data-placeholder="Select services...">
                            <option value="digital_press">Digital Press (guaranteed)</option>
                            <option value="print_press">Print Press (guaranteed)</option>
                            <option value="tv_interviews">TV Interviews (guaranteed)</option>
                            <option value="digital_billboards">Digital Billboards</option>
                            <option value="editorial_digital_gift_guides">Editorial Digital Gift Guides</option>
                            <option value="top_tier_digital_press">Top-Tier Digital Press</option>
                            <option value="verification_components">Verification Components (Evaluation, Press, Google Knowledge Panel)</option>
                            <option value="seo_ppc">SEO / PPC</option>
                            <option value="top_lists">Top Lists</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="contact_preference" class="form-label">How quickly do you plan to place an order? </label>
                        <select class="form-select" id="order_timing" name="order_timing">
                            <option value="">Select One</option>
                            <option value="less_than_a_week">Less than a week</option>
                            <option value="less_than_a_month">Less than a month</option>
                            <option value="more_than_a_month">1+ months</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="contact_preference" class="form-label">How many orders do you expect to place per month? </label>
                        <select class="form-select" id="order_quantity" name="order_quantity">
                            <option value="">Select One</option>
                            <option value="one_to_two">1 - 2</option>
                            <option value="three_to_four">3 - 4</option>
                            <option value="more_than_five">5+</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="getclout_services" class="form-label">How did you hear about getclout?</label>
                        <select class="form-select" id="how_did_you_hear" name="how_did_you_hear">
                            <option value="">Select One</option>
                            <option value="google_ads">Google Ads</option>
                            <option value="instagram">Instagram</option>
                            <option value="facebook">Facebook</option>
                            <option value="linkedin">LinkedIn</option>
                            <option value="google_search">Google Search</option>
                            <option value="referred_partner">Referred by Existing Partner</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="zoom_call" class="form-label d-block">I would like to book a Zoom call:</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="zoom_call" id="yes" value="yes">
                            <label class="form-check-label" for="yes">Yes</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="zoom_call" id="no" value="no">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="additional_notes" class="form-label">Anything else you would like us to know?</label>
                        <textarea class="form-control" id="additional_notes" name="additional_notes" rows="2" placeholder="Enter additional notes..."></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            I agree to the
                            <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
            </div>

            </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login-form') }}">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->



    <!-- Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    I agree to be contacted by email AND/OR text message using the platform I selected above to:
                </p>
                <ol>
                    <li>Receive my application status</li>
                    <li>Receive access to partner pricing</li>
                    <li>Provide additional information for this application, if needed</li>
                    <li>If approved, receive future updates and communications.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('public/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/js/bootstrap.js') }}../"></script>
    <script src="{{ asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('public/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('public/assets/js/main.js') }}"></script>



    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>



    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
  </body>
</html>




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
