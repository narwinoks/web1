@foreach ($categories as $key => $category)
    <div class="col-12 col-md-6 col-lg-3">
        <div class="img-category">
            <img src="{{ asset('assets/img/' . $category->image) }}" alt="image-1" class="img-fluid img-category">
        </div>
    </div>
@endforeach
