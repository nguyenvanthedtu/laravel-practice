@extends('admin.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom_table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
@endsection
@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    @if (Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger" role="alert">
            {{ session('fail') }}
        </div>
    @endif
    <div class="alert alert-success success" role="alert" style="display: none">

    </div>
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">

                    <button type="button" class="btn btn-primary add-category" data-toggle="modal">
                        Add Category
                    </button>
                </h6>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable123" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($categories))
                        @foreach ($categories as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <div class="tools">
                                        <a href="{{route('admin.categories.edit', ['id'=> $row->id])}}" class="btn btn-warning btn-sm edit-data "
                                            >Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete this item?')"
                                            href="{{ route('admin.categories.delete', ['id' => $row->id]) }}"
                                            class="btn btn-danger btn-sm btn-delete">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">No categories</td>
                        </tr>   
                        @endif
                    </tbody>
                </table>
                @include('admin.categories.create')
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.add-category').click(function() {
                $('#addcategories').modal('show');
            });

            $('#addform_categories').on('submit', function(e) {
                e.preventDefault();
                let name = $('#name[name="name"]').val().trim();
                // let status = $('#status[name="status"]').val().trim();
                let actionUrl = $(this).attr("action");
                let cstfToken = $(this).find('input[name="_token"]').val();
                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(data) {
                        $('#addcategories').modal('hide');
                        $('.success').css('display', 'block');
                        setTimeout(function() {
                            $('.success').css('display', 'none');
                        }, 1500);
                        $('#addform_categories')[0].reset();
                        // $('#dataTable123').DataTable().ajax().reload();
                        location.reload();
                        $(".success").html(data.message)
                        
                    },
                    error: function(error) {
                        let responJson = error.responseJSON.errors;
                        if (Object.keys(responJson).length > 0) {
                            $(".msg_error").text(responJson.msg);
                            for (let key in responJson) {
                                $("." + key + "_error").text(responJson[key]);
                            }
                        }
                    }
                });

            });

        });
    </script>
    
@endsection
