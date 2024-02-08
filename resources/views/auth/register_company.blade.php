@extends('layouts.app')

@section('content')

    {{-- ------------------------------------ Register as company ------------------------------------ --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }} As Organization</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Organization Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="phone"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            <div class="row mb-3">--}}
{{--                                <label for="name" class="col-md-4 col-form-label text-md-end">Organization Type</label>--}}

{{--                                <div class="col-md-6">--}}

{{--                                    <select class="form-select" name="company_type">--}}
{{--                                        <option disabled selected>Select Company Type</option>--}}
{{--                                        <option--}}
{{--                                            value="company" {{ old('company_type') == 'company' ? 'selected' : '' }}>--}}
{{--                                            Company--}}
{{--                                        </option>--}}
{{--                                        <option value="bank" {{ old('company_type') == 'bank' ? 'selected' : '' }}>--}}
{{--                                            Bank--}}
{{--                                        </option>--}}
{{--                                        <option value="ngo" {{ old('company_type') == 'ngo' ? 'selected' : '' }}>NGO--}}
{{--                                        </option>--}}
{{--                                        <option value="mfi" {{ old('company_type') == 'mfi' ? 'selected' : '' }}>MFI--}}
{{--                                        </option>--}}
{{--                                    </select>--}}

{{--                                    @error('company_type')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

{{--                            </div>--}}

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Organization Type</label>

                                <div class="col-md-6">

                                    <select class="form-select" name="company_plan" id="organization">
                                        <option disabled selected>Select Organization</option>
                                        <option value="plan_1" {{ old('company_plan') == 'plan_1' ? 'selected' : '' }}>Agritech Company
                                        </option>
                                        <option value="plan_2" {{ old('company_plan') == 'plan_2' ? 'selected' : '' }}>Insurance Company
                                        </option>

                                    </select>

                                    @error('company_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
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

    {{-- ------------------------------------ Register as company ------------------------------------ --}}


    <br>

    {{-- ------------------------------------ Information Box  ------------------------------------ --}}


    <div class="container" style="display: none" id="plan_1_container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Plan 1- Includes</div>

                    <div class="card-body">

                        <div class="row">
                            <p>Plan 1 Includes: The organization will be able to</p>
                            <div>
                                <ol>
                                    <li>Register Animals</li>
                                    <li>Insuring Animals</li>
                                    <li>Claim Animals</li>
                                    <li>View Registered Animals and Farmer List</li>
                                    <li>View Animal Insurance Requests</li>
                                    <li>Total Insurance Amount</li>
                                    <li>Insurance Due Amount</li>
                                    <li>Pending Insurance List</li>
                                    <li>Total Claimed List</li>
                                    <li>Set Permissions To Farmers</li>
                                </ol>

                                <p>For permissions, please contact with <strong>Insurecow</strong></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="display: none" id="plan_2_container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Plan 2- Includes</div>

                    <div class="card-body">

                        <div class="row">
                            <p>Plan 2 Includes: The organization will be able to</p>
                            <div>
                                <ol>
                                    <li>Add Insurance Packages</li>
                                    <li>View Insurance Packages</li>
                                    <li>View Animal Insurance Requests</li>
                                    <li>View Animal Insurance Transactions</li>
                                    <li>Pending Insurance List</li>
                                    <li>View Claimed Insurance List</li>
                                </ol>

                                <p>For permissions, please contact with <strong>Insurecow</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ------------------------------------ Information Box ------------------------------------ --}}

    {{-- ------------------------------------ Script File ------------------------------------ --}}

    <script>
        document.getElementById("organization").addEventListener("change", function () {
            var selectedOption = document.getElementById("organization").value;
            if (selectedOption === "plan_1") {
                document.querySelector("#plan_1_container").style.display = "block";
                document.querySelector("#plan_2_container").style.display = "none";

            } else if (selectedOption === "plan_2") {
                document.querySelector("#plan_1_container").style.display = "none";
                document.querySelector("#plan_2_container").style.display = "block";
            }
        });
    </script>

    {{-- ------------------------------------ Script File ------------------------------------ --}}

@endsection
