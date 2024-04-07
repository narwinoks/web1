@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
    @endphp
    <div class="col-md-6">
        <div class="card card-qa">
            <div class="card-body">
                <h5 class="card-title question">{{ Str::limit($data['question'], 50) }}</h5>
                <p class="card-text answer">{!! Str::limit($data['answer'], 200) !!}</p>
            </div>
            <div class="button-group">
                <button class="btn btn-sm is-rounded  btn-primary edit-button-qa" data-id="{{ $content->id }}"><i
                        class="fas fa-edit"></i></button>
                <button class="btn  btn-sm is-rounded btn-danger delete-button-qa" data-id="{{ $content->id }}"><i
                        class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
@endforeach
