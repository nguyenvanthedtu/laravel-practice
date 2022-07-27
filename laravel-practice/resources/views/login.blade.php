
<div class="container mt-5 content">
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="modal fade" id="login-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="login-wrap p-4 p-md-5">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-user-o"></span>
                                </div>
                                <h3 class="text-center mb-4">Have an account?</h3>

                                <!-- Login Form -->
                                <form action="{{ route('login-store') }}" method="post" id="users-form-login">

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger cus-alert" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="alert alert-danger  error msg_error success" role="alert"
                                        style="display:none;">
                                    </div>


                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control rounded-left" name="email"
                                            id="email" placeholder="email" value="{{ old('email') }}">
                                        {{-- @error('email') --}}
                                        <span class="message error email_error"></span>
                                        {{-- @enderror --}}
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control rounded-left" name="password"
                                            id="password" placeholder="password" value="{{ old('password') }}">
                                        {{-- @error('password') --}}
                                        <span class="message error password_error"></span>
                                        {{-- @enderror --}}
                                    </div>
                                    <div class="form-group d-md-flex">
                                        <div class="w-50">
                                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                                <input type="checkbox" name="remember" id="remember">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                      
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary rounded ">Sign In</button>
                                    </div>
                                    <div class="form-group">

                                        <a href="" class=" btn-checkbox-primary text-register"
                                            style="font-size:13px; text-decoration:none; font-style:italic">Don't have an account? Register
                                            here
                                            for free!</a>
                                    </div>
                                    @csrf

                                </form>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- Load Modal --}}
@push('scripts')
<script src="{{asset('assets/auth/js/ajax.js')}}"></script>
</script>
@endpush
