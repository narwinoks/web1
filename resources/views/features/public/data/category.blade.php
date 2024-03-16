@foreach ($categories as $key => $category)
    <div class="row text-center justify-content-center align-items-center">
        <div class="col-md-5">
            <a href="#">
                <div class="category mb-3">
                    <img src="{{ asset('assets/img/' . $category->image) }}" alt="category-1" class="img-fluid is-rounded">
                </div>
            </a>
        </div>
    </div>
@endforeach
