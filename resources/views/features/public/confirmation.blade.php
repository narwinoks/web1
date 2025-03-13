@extends('templates.public.main')
@section('content')
@php

$whatsapp = \App\Helpers\Helper::getProfile('whatsapp');
$whatsapp = str_replace('-', '', $whatsapp);
@endphp
    <section class="confirmation">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12 col-md-8">
                    <div class="form">
                        <p class="h5 text-center">Konfirmasi Pembayaran !</p>
                        <div class="col-12">
                            <form id="form-confirmation">
                                @csrf
                                <input type="hidden" name="key" value="confirmation" id="key">
                                <input type="hidden" name="id" value="{{ $order?->id }}" id="id">
                                <div class="mb-1">
                                    <label for="no_order" class="form-label">Nomor Invoice </label>
                                    <input type="text" class="form-control-sm form-control readonly" readonly
                                        id="no_order" name="no_order" value="{{ $order->number_order }}" placeholder="..">
                                    <span class="error-no_order text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="date" class="form-label">Waktu Pembayaran </label>
                                    <input type="date" class="form-control-sm form-control" id="date" name="date"
                                        placeholder=".." value="{{ date('Y-m-d') }}">
                                    <span class="error-date text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="transfer_to" class="form-label">Ditransfer Ke</label>
                                    <select id="transfer_to" class="form-select form-select-sm is-rounded"
                                        aria-label=".form-select-sm is-rounded example" name="transfer_to">
                                        @foreach ($banks as $bank)
                                            @php
                                                $data = json_decode($bank->content, true);
                                                $b =
                                                    $data['category'] . ' ' . $data['name'] . ' ' . $data['norekening'];
                                            @endphp
                                        @endforeach
                                        <option value="{{ $b }}">{{ $b }}</option>
                                    </select>
                                    <span class="error-transfer_to text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="bank" class="form-label">Bank Asal </label>
                                    <input type="text" class="form-control-sm form-control" id="bank" name="bank"
                                        placeholder="BCA">
                                    <span class="error-bank text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="name_rek" class="form-label">Nama Pemilik Rekening </label>
                                    <input type="text" class="form-control-sm form-control" id="name_rek"
                                        name="name_rek" placeholder="Nama">
                                    <span class="error-name_rek text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="price" class="form-label">Total </label>
                                    <input type="text" class="form-control-sm form-control" id="price" name="price"
                                        placeholder="0" value="{{ ($order->discount ?? $order->price) }}">
                                    <span class="error-price text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="file" class="form-label">Bukti Transfer </label>
                                    <input type="file" class="form-control-sm form-control" id="file"
                                        name="file">
                                    <span class="error-file text-danger d-none"></span>
                                </div>
                                <div class="mb-1 mt-4">
                                    <div class="row px-3">
                                        <button type="submit" id="button" class="btn btn-primary is-rounded">
                                            <div class="spinner-border d-none mx-4" role="status">
                                            </div>
                                            <span id="tag-button">
                                                Konfirmasi
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>

    </style>
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $('#form-confirmation').submit(function(event) {
            $(this).prop('disabled', false);
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).find('#tag-button').addClass('d-none');
            event.preventDefault();
            var form = document.getElementById('form-confirmation');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('saveForm') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showAlert(response.message, 'success');
                    debugger
                    let phoneNumber = {{$whatsapp}}; // Ganti dengan nomor tujuan (gunakan format i
                        let message = encodeURIComponent("Halo, saya telah Order : "+ '{{$order->number_order }}' +" dengan produk digital - *"+ '{{$order->product->name}}' + "*");
                        let whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;

                        // Redirect ke WhatsApp setelah sukses
                        window.location.href = whatsappUrl;
                },
                error: function(error) {
                    if (error.status == 400 || error.status == 422) {
                        printErrorMsg(error);
                    } else {
                        showAlert(error.responseJSON.message || 'Error', 'danger')
                      
                    }
                },
                complete: function(data) {
                    $('#button').find('.spinner-border').addClass('d-none');
                    $('#button').find('#tag-button').removeClass('d-none');
                }
            });
        });
    </script>
@endpush
