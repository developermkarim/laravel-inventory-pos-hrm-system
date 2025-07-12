@extends('auth.body.main')

@section('auth-container')
<div class="form-outer text-center d-flex align-items-center">
    <div class="form-inner">
      <div class="logo">
        <span>{{ $general_setting->site_title ?? 'Site Title' }}</span>
      </div>

      @if(session()->has('delete_message'))
        <div class="alert alert-danger alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session()->get('delete_message') }}
        </div>
      @endif

      <!-- Login Form -->
      <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf
        <!-- Username Field -->
        <div class="form-group-material">
          <input id="login-username" type="text" name="name" required class="input-material" value="">
          <label for="login-username" class="label-material">Username</label>
          @if ($errors->has('name'))
            <p><strong>{{ $errors->first('name') }}</strong></p>
          @endif
        </div>

        <!-- Password Field -->
        <div class="form-group-material">
          <input id="login-password" type="password" name="password" required class="input-material" value="">
          <label for="login-password" class="label-material">Password</label>
          @if ($errors->has('password'))
            <p><strong>{{ $errors->first('password') }}</strong></p>
          @endif
        </div>


        <div class="form-group-material" style="display:flex; align-items: center; gap: 5px;">
    <input
        id="remember"
        type="checkbox"
        name="remember"
        class="input-material"
        {{ old('remember') ? 'checked' : '' }}
    >
    <label for="remember" class="label-material">Remember Me</label>

    @if ($errors->has('remember'))
        <p><strong>{{ $errors->first('remember') }}</strong></p>
    @endif
    </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary btn-block">Log In</button>
      </form>

      <!-- Forgot Password and Register Links -->
      <a href="{{-- {{ route('password.request') }} --}}" class="forgot-pass">Forgot Password?</a>
      <p>Do not have an account?</p>
      <a href="{{ url('register') }}" class="signup">Register</a>
    </div>

    <!-- Copyright Section -->
    <div class="copyrights text-center">
      <p>Developed By <span class="external">{{ $general_setting->developed_by ?? 'Developer' }}</span></p>
    </div>
  </div>

  

@endsection
