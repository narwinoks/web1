@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
        $img = isset($data['image']) ? $data['image'] : '600x400.png';
    @endphp
    <div class="col-6">
        <div class="card payment-card my-2">
            <div class="action-buttons">
                <button type="button" class="btn btn-sm is-rounded btn-danger delete-button-bank"
                    data-id="{{ $content->id }}"><i class="fa fa-trash"></i></button>
                <button type="button" class="btn btn-primary edit-button-bank" data-id="{{ $content->id }}"><i
                        class="fa fa-edit"></i></button>
            </div>
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/BANK/' . $img) }}" class="img-fluid rounded-start" alt="Bank Logo">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['category'] ?? '' }}</h5>
                        <p class="card-text">{{ $data['name'] ?? '' }}</p>
                        <p class="card-text">({{ $data['norekening'] ?? '' }})</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
