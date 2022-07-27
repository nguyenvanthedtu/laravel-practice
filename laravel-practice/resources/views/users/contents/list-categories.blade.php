<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{route('category', $category->id)}}">{{ $category->name }}</a></li>
                    </ul>
                </div>
            @endforeach

        </div>
    </div>
</div>