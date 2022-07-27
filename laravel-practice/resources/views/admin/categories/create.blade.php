<div class="modal fade" id="addcategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST" id="addform_categories">
                
                <div class="alert alert-danger  errors msg_error" role="alert" style="display:none;">
                    {{-- Please check the input data --}}
                </div>

                <div class="alert alert-danger " id="success-message" role="alert" style="display:none;">
                    {{-- Please check the input data --}}
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                        <span class="message errors name_error"></span>
                            
                    </div>

                   <input type="hidden" name="status" id="status">




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
