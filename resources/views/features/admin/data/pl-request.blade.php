@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
    @endphp
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center justify-content-center">
                    <div class="col-auto">
                        <img class="img-fluid" style="width:70px;" src="{{ asset('assets/img/avatar2.png') }}"
                            alt="dashboard-user">
                    </div>
                    <div class="col">
                        <h5>{{ $data['name'] ?? '' }}</h5>
                        <span>CUSTOMER</span>
                    </div>
                </div>
                <ul class="task-list">
                    <li>
                        <i class="task-icon bg-c-green"></i>
                        <h6>Phone Number / Email</h6>
                        <p class="text-muted">{{ $data['number'] ?? '' }} / {{ $data['email'] }}</p>
                    </li>
                    <li>
                        <i class="task-icon bg-c-green"></i>
                        <h6>PACKAGE / EVENT LOCATION</h6>
                        <p class="text-muted">{{ $data['package'] ?? '' }} / {{ $data['location'] ?? '' }}</p>
                    </li>
                    <li>
                        <i class="task-icon bg-c-green"></i>
                        <h6>Petimbangan</h6>
                        <p class="text-muted">{{ $data['why'] ?? '' }}</p>
                    </li>
                    <li>
                        <i class="task-icon bg-c-green"></i>
                        <h6>Estimed Date</h6>
                        <p class="text-muted">{{ $data['estimed'] ?? '' }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
