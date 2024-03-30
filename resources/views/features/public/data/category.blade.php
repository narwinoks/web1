@foreach ($categories as $key => $category)
    @php
        $data = json_decode($category->content, true);
        $url = $data['url'] ?? '/';
    @endphp
    <div class="row text-center justify-content-center align-items-center">
        <div class="col-md-4">
            <a href="{{ $url }}">
                <div class="category mb-3">
                    <img src="{{ asset('assets/img/' . $category->image) }}" alt="category-1" class="img-fluid is-rounded">
                </div>
            </a>
        </div>
    </div>
@endforeach
