<div class="card support-bar overflow-hidden">
    <div class="card-body pb-0">
        <h2 class="m-0">{{ $user }}</h2>
        <span class="text-c-blue">Total Active Users</span>
        <p class="mb-3 mt-3">The total number of active users currently using the system.</p>
    </div>
    <div id="support-chart-3"></div>
    <div class="card-footer bg-success text-white">
        <div class="row text-center">
            @foreach ($userStatus as $key => $s)
                <div class="col">
                    <h4 class="m-0 text-white">{{ $s->total }}</h4>
                    <span>{{ $s->statusenambled = 1 ? 'Aktif' : '' }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
<input type="hidden" value="{{ json_encode($usersResult) }}" id="user-result">
