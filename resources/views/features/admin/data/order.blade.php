@foreach ($orders as $key => $order)
    <div class="col-12">
        <div class="card border shadow-none">
            <div class="card-body">
                <div class="d-flex align-items-start border-bottom pb-3">
                    <div class="mr-4">
                        <img src="{{ asset('assets/img/' . $order->product->image) }}" alt=""
                            class="avatar-lg rounded">
                    </div>
                    <div class="flex-grow-1 align-self-center overflow-hidden">
                        <div>
                            <h5 class="text-truncate font-size-18"><a href="#"
                                    class="text-dark">{{ $order->product->name ?? '' }} </a>
                            </h5>
                            <p class="mb-0 mt-1">No Order : <span class="fw-medium">{{ $order->number_order }}</span>
                            </p>
                            <p class="mb-0 mt-1">Email / Whatsapp : <span
                                    class="fw-medium text-danger">{{ $order->email }} / {{ $order->whatsapp }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Nama</p>
                                <h5 class="mb-0 mt-2">
                                    {{ $order->name }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Harga</p>
                                <h5 class="mb-0 mt-2">
                                    {{ number_format($order->price, 2) }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Status</p>
                                <h5 class="mb-0 mt-2">
                                    <span
                                        class="badge bg-{{ $order->status == 'complated' ? 'success' : 'warning' }}">{{ $order->status }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Bukti Pembayaran</p>
                                <h5 class="mb-0 mt-2">
                                    @if ($order->file)
                                        <a href="{{ asset('assets/img/' . $order->file) }}" target="_blank">file</a>
                                    @else
                                        -
                                    @endif
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Bayar</p>
                                <h5 class="mb-0 mt-2">
                                    {{ $order->bank }} ({{ $order->name_rek }})
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end card -->
        </div>
    </div>
@endforeach
