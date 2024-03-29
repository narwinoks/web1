<div class="card support-bar overflow-hidden">
    <div class="card-body pb-0">
        <h2 class="m-0">{{ count($booking) }}</h2>
        <span class="text-c-blue">Booking</span>
        <p class="mb-3 mt-3">Total booking client that come in.</p>
    </div>
    <div id="support-chart-1"></div>
    <div class="card-footer bg-primary text-white">
        <div class="row text-center">
            <div class="col">
                <h4 class="m-0 text-white">{{ $reject }}</h4>
                <span>Reject</span>
            </div>
            <div class="col">
                <h4 class="m-0 text-white">{{ $pending }}</h4>
                <span>Pendding</span>
            </div>
            <div class="col">
                <h4 class="m-0 text-white">{{ $accept }}</h4>
                <span>Accept</span>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{ json_encode($bookingsResult) }}" id="booking-result">
