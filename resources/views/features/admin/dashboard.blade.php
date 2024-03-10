@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card support-bar overflow-hidden">
                <div class="card-body pb-0">
                    <h2 class="m-0">350</h2>
                    <span class="text-c-blue">Booking</span>
                    <p class="mb-3 mt-3">Total booking client that come in.</p>
                </div>
                <div id="support-chart"></div>
                <div class="card-footer bg-primary text-white">
                    <div class="row text-center">
                        <div class="col">
                            <h4 class="m-0 text-white">10</h4>
                            <span>Open</span>
                        </div>
                        <div class="col">
                            <h4 class="m-0 text-white">5</h4>
                            <span>Confirm</span>
                        </div>
                        <div class="col">
                            <h4 class="m-0 text-white">3</h4>
                            <span>Block</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/templates/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/templates/js/pages/dashboard-main.js') }}"></script>
@endpush
