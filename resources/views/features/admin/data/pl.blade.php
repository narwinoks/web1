@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
    @endphp
    <div class="col-md-4">
        <div class="category-card">
            <div class="action-buttons">
                <button type="button" class="btn btn-sm is-rounded btn-danger delete-button-pricelist"
                    data-id="{{ $content->id }}"><i class="fa fa-trash"></i></button>
                <button type="button" class="btn btn-primary edit-button-pricelist" data-id="{{ $content->id }}"><i
                        class="fa fa-edit"></i></button>
            </div>
            <div class="category-name">{{ $data['category'] }}</div>
            <div class="category-description">{{ $content->name }}</div>
        </div>
    </div>
@endforeach
