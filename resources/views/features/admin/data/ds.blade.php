    <div class="card support-bar overflow-hidden">
        <div class="card-body pb-0">
            <h2 class="m-0">{{ $image }}</h2>
            <span class="text-c-blue">Gallery Image</span>
            <p class="mb-3 mt-3">Galley Image for event by herioes.</p>
        </div>
        <div id="support-chart-2"></div>
        <div class="card-footer bg-success text-white">
            <div class="row text-center">
                @foreach ($countByCategories as $key => $sum)
                    <div class="col-4">
                        <h4 class="m-0 text-white">{{ $sum->total }}</h4>
                        <span class="subtitle">{{ $sum->category }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ json_encode($imagesResult) }}" id="image-result">
