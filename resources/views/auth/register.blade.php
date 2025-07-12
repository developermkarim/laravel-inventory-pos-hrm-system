@extends('auth.body.main')

@section('auth-container')

      <div class="form-outer text-center d-flex align-items-center">
        <div class="form-inner">
          <div class="logo">
            <span>{{ $general_setting->site_title ?? 'Site Title' }}</span>
          </div>
    <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username Field -->
            <div class="form-group-material">
              <input id="register-username" type="text" name="name" required class="input-material" value="{{ old('name') }}">
              <label for="register-username" class="label-material">Username *</label>
              @error('name')
                <p><strong>{{ $message }}</strong></p>
              @enderror
            </div>

            <!-- Email Field -->
            <div class="form-group-material">
              <input id="register-email" type="email" name="email" required class="input-material" value="{{ old('email') }}">
              <label for="register-email" class="label-material">Email *</label>
              @error('email')
                <p><strong>{{ $message }}</strong></p>
              @enderror
            </div>

           {{--  <!-- Phone Number Field -->
            <div class="form-group-material">
              <input id="register-phone" type="text" name="phone_number" required class="input-material" value="{{ old('phone_number') }}">
              <label for="register-phone" class="label-material">Phone Number *</label>
            </div>

            <!-- Company Name Field -->
            <div class="form-group-material">
              <input id="register-company" type="text" name="company_name" class="input-material" value="{{ old('company_name') }}">
              <label for="register-company" class="label-material">Company Name</label>
            </div>
 --}}
            <!-- Role Selection -->
            {{-- <div class="form-group-material">
              <select name="role_id" id="role-id" required class="selectpicker form-control" data-live-search="true">
                @foreach($lims_role_list as $role)
                  <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
              </select>
            </div> --}}

            <!-- Customer Section -->
            {{-- <div id="customer-section">
              <div class="form-group-material">
                <input id="customer-name" type="text" name="customer_name" class="input-material customer-field">
                <label for="customer-name" class="label-material">Customer Name *</label>
              </div>
              <div class="form-group-material">
                <select name="customer_group_id" required class="selectpicker form-control customer-field" data-live-search="true">
                  @foreach($lims_customer_group_list as $customer_group)
                    <option value="{{ $customer_group->id }}">{{ $customer_group->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group-material">
                <input id="customer-tax-number" type="text" name="tax_no" class="input-material">
                <label for="customer-tax-number" class="label-material">Tax Number</label>
              </div>
              <div class="form-group-material">
                <input id="customer-address" type="text" name="address" class="input-material customer-field">
                <label for="customer-address" class="label-material">Address *</label>
              </div>
              <div class="form-group-material">
                <input id="customer-city" type="text" name="city" class="input-material customer-field">
                <label for="customer-city" class="label-material">City *</label>
              </div>
              <div class="form-group-material">
                <input id="customer-state" type="text" name="state" class="input-material">
                <label for="customer-state" class="label-material">State</label>
              </div>
              <div class="form-group-material">
                <input id="customer-postal" type="text" name="postal_code" class="input-material">
                <label for="customer-postal" class="label-material">Postal Code</label>
              </div>
              <div class="form-group-material">
                <input id="customer-country" type="text" name="country" class="input-material">
                <label for="customer-country" class="label-material">Country</label>
              </div>
            </div> --}}

            <!-- Biller ID Selection -->
            {{-- <div class="form-group-material" id="biller-id">
              <select name="biller_id" class="selectpicker form-control" data-live-search="true">
                @foreach($lims_biller_list as $biller)
                  <option value="{{ $biller->id }}" {{ old('biller_id') == $biller->id ? 'selected' : '' }}>
                    {{ $biller->name }} ({{ $biller->phone_number }})
                  </option>
                @endforeach
              </select>
            </div> --}}

            <!-- Password Fields -->
            <div class="form-group-material">
              <input id="password" type="password" class="input-material" name="password" required>
              <label for="password" class="label-material">Password *</label>
              @error('password')
                <p><strong>{{ $message }}</strong></p>
              @enderror
            </div>

            <div class="form-group-material">
              <input id="password-confirm" type="password" name="password_confirmation" required class="input-material">
              <label for="password-confirm" class="label-material">Confirm Password *</label>
            </div>

            <!-- Submit Button -->
            <input id="register" type="submit" value="Register" class="btn btn-primary">
          </form>

          <!-- Login Link -->
          <p>Already have an account?
            <a href="{{ url('login') }}" class="signup">Log In</a>
          </p>
        </div>
      </div>


@endsection
