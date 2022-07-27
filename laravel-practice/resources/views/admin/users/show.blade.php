
<div class="modal fade" tabindex="-1" role="dialog" id="viewadminprofile">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                <div class="modal-body">

                    <div class="form-group">
                        <label> FullName </label>
                        <input id="fullname-show" name="fullname" class="form-control" disabled>

                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input type="text" id="email-show" name="email" class="form-control" disabled>

                    </div>

                    <div class="mb-3">
                        <div>
                            <label class="radio-container">Male
                                <input type="radio" value="1" name="gender" checked id="gender-show" disabled>
                            </label>
                            <label class="radio-container">Female
                                <input type="radio" name="gender" value="0" id="gender-show" disabled>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>

                 
                    <div class="mb-3">
                        <label>Role</label>
                        <select class="form-select form-control" aria-label="Default select example" id="role_id-show"
                            name="role_id"disabled>
                            <option selected>Choose role</option>
                            <option value="1" {{ old('role_id') == '1' ? 'selected' : '' }}>User</option>
                            <option value="2" {{ old('role_id') == '2' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                @csrf

        </div><!-- /.modal-content -->
    </div>
</div>


