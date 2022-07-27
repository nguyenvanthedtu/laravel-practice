<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.store') }}" method="POST" id="addform_Data" >
                <div class="alert alert-danger  errors msg_error" role="alert" style="display:none;">
                    {{-- Please check the input data --}}
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="alert alert-danger " id="success-message" role="alert" style="display:none;">
                    {{-- Please check the input data --}}
                </div>

                <div class="modal-body">
                    <ul class="alert alert-warning d-none" role="alert" id="save_errorList">

                    </ul>
                    <div class="form-group">
                        <label> FullName </label>
                        <input type="text" name="fullname" 
                            class="form-control" placeholder="Enter FullName">
                        <span class="message errors fullname_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email-add" class="form-control"
                            placeholder="Enter Email">
                        <span class="message errors email_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password-add" class="form-control"
                            placeholder="Enter Password">
                        <span class="message errors password_error"></span>
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
                                <input type="radio" name="gender" value="0"{{old('gender')}} id="gender-add">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="" id="" class="btn btn-primary">Save</button>
                </div>
                @csrf
            </form>

        </div>
    </div>
</div>
