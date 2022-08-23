@extends('layouts.aplikasi_admin')

<div id="auth">
    <div class="row h-100">
        <center style="margin-top: 30px;">
        <div class="col-lg-10 col-10">
            <div id="auth-left">
                <div class="auth-logo">
                </div>
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username" autofocus>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </form>
                {{-- <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                            class="font-bold">Sign
                            up</a>.</p>
                    <p><a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.</p>
                </div> --}}
            </div>
        </div>
    </center>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>


                
{{-- <section id="form-and-scrolling-components">

  <!-- Button trigger for login form modal -->
  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
  data-bs-target="#inlineForm">
  Launch Modal
</button>

<!--login form Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1"
  role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
      role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
              <button type="button" class="close" data-bs-dismiss="modal"
                  aria-label="Close">
                  <i data-feather="x"></i>
              </button>
          </div>
          <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="modal-body">
                  <label>Email: </label>
                  <div class="form-group">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  </div>
                  <label>Password: </label>
                  <div class="form-group">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  </div>
                  <div class="form-group">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </div>
              </div>
              <div class="modal-footer">
                  
                  <button type="button" class="btn btn-light-secondary"
                      data-bs-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="submit" class="btn btn-primary">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">login</span>
                  </button>
                 
                  @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
                         
              </div>
          </form>                          
 
</section> --}}
                           
<script src="{{ asset('mazer') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('mazer') }}/assets/js/bootstrap.bundle.min.js"></script>
                
<script src="{{ asset('mazer') }}/assets/js/main.js"></script>                    
