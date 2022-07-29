<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="modal fade" id="register-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                  <div class="modal-header">
                         
                           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                         </div>
          <div class="login-wrap p-4 p-md-5">
  
              <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-user-o"></span>
              </div>
              <h3 class="text-center mb-4">Have an account?</h3>
  
  
  
    <!-- Login Form -->
    <form action="{{route('register')}}" method="post" id="users-form-register">
        <div class="alert alert-danger  error msg_error success" role="alert"
        style="display:none;">
    </div>
          <div class="mb-3">
              <label> FullName </label>
              <input type="text" name="fullname" class="form-control" placeholder="Enter Username" id="fullname_register">
              <span class="message error fullname_error"></span>
          </div>
          <div class="mb-3">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Enter Email" id="email_register">
              <span class="message error email_error"></span>
          </div>
          <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password_register">
              <span class="message error password_error"></span>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password-add" class="form-control"
                placeholder="Confirm Password">
            <span class="message errors confirm_password_error"></span>
        </div>
          <div class="mb-3">
            <div>
                <label class="radio-container">Male
                    <input type="radio" value="1"{{old('gender')}} name="gender" checked id="gender-add">
                </label>
                <label class="radio-container">Female
                    <input type="radio" name="gender" name="gender" value="0"{{old('gender')}} id="gender-add">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
          <div class="mb-3">
              <label>Role</label>
              <select class="form-select form-control" aria-label="Default select example" name="role" id="role">
                <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>User</option>
                {{-- <option value="2" {{ old('role_id') == '2' ? 'selected' : '' }}>Admin</option> --}}
              </select>
          </div>
      
      <div class="form-group">
          <button type="submit" class="btn btn-primary rounded ">Sign up</button>
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
