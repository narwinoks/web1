@extends('templates.public.main')
@section('title', 'Form Booking')
@section('content')
    <section class="form-booking">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-auto col-12">
                    <div class="contact-us text-center justify-content-center">
                        <img src="{{ asset('assets/img/hero-booking.png') }}" alt="about-us-hero" class="image-contact">
                    </div>
                    <div class="content text-center mt-2">
                        <p class="h6"><span>Sebelum mengisi data di bawah ini, silahkan pelajari perjanjian kerjasama di
                                bawah ini
                            </span></p>
                        <a href="{{ $profile['file1'] }}" target="_blank">Surat Perjanjian Kerjasama Hieros 2024 -
                            SPK/001/MMXXIV
                        </a>
                        <p class="h6 mt-4">
                            <span>
                                Sesuai dengan <span class="fw-bolder">Undang-Undang No. 28 Tahun 2014 Tentang Hak
                                    Cipta</span>, fotografer
                                adalah pemegang
                                Hak Cipta pada sebuah karya fotografi.
                            </span><br />
                            <span>
                                Untuk melindungi kedua belah pihak baik fotografer maupun model, mohon untuk mengisi form
                                release di bawah ini.
                            </span>
                        </p>
                        <p class="h6 mt-4">
                            <span>Dokumen ini merupakan dokumen digital tanpa memerlukan tanda tangan basah:
                            </span>
                        </p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-5 col-sm-12 col-5">
                            <form id="form-booking">
                                <div class="form mt-5">
                                    <div class="mb-1">
                                        <label for="type" class="form-label">Saya yang mengisi form ini </label>
                                        <select class="form-select form-select-sm" id="type"
                                            aria-label=".form-select-sm example" name="type">
                                            <option value="calon pengantin" selected>Calon Pengantin</option>
                                            <option value="vendor">Vendor</option>
                                        </select>
                                    </div>
                                    <div class="vendor" style="display: none">
                                        <div class="mb-1">
                                            <label for="vendor" class="form-label">vendor</label>
                                            <input type="text" class="form-control-sm form-control" id="vendor"
                                                name="vendor" placeholder="..">
                                        </div>
                                        <div class="mb-1">
                                            <label for="penanggung jawab" class="form-label">Nama penanggung jawab</label>
                                            <input type="text" class="form-control-sm form-control" id="penanggung jawab"
                                                name="penanggung jawab" placeholder="tulisankan nama lengkap">
                                        </div>
                                        <div class="mb-1">
                                            <label for="jabatan" class="form-label">Jabatan</label>
                                            <input type="text" class="form-control-sm form-control" id="jabatan"
                                                name="jabatan" placeholder="CEO">
                                        </div>
                                    </div>
                                    <div class="mb-1 option">
                                        <label for="option" class="form-label">Paket yang saya pilih</label>
                                        <select class="form-select form-select-sm" id="option"
                                            aria-label=".form-select-sm example" name="option">
                                            <option value="prewedding" selected>Prewedding</option>
                                            <option value="wedding">Wedding</option>
                                            <option value="2 Days Bulding (Prewedding & Wedding)">2 Days Bundling
                                                (Prewedding &
                                                Wedding)</option>
                                            <option value="2 Days Bundling (Prewedding,Traditional Ceremony & Wedding)">2
                                                Days
                                                Bundling (Prewedding,Traditional Ceremony & Wedding)
                                            </option>
                                            <option value="2 Days Bundling (Prewedding,Traditional Ceremony & Wedding)">2
                                                Days
                                                FULLDAY Bundling (Fullday Prewedding & Fullday Wedding)
                                            </option>
                                            <option value="engagement">
                                                Engagement
                                            </option>
                                            <option value="Family Portraiture (Hieros.kin)">
                                                Family Portraiture (Hieros.kin)
                                            </option>
                                            <option value="Tradional ceremony (Pengajian Siraman)">
                                                Tradional ceremony (Pengajian Siraman)
                                            </option>
                                            <option value="Custome Page">
                                                Custome Page
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-1 prewedding-content">
                                        <label for="type" class="form-label">Prewedding Package </label>
                                        <select class="form-select form-select-sm" id="prewedding-package"
                                            aria-label=".form-select-sm example" name="prewedding-package">
                                            <option value="Short Session (4 Hours)">Short Session (4 Hours)</option>
                                            <option value="Halftday Session (6 Hours)">Halftday Session (6 Hours)</option>
                                            <option value="Fullday Session (12 Hours)">Fullday Session (12 Hours)</option>
                                            <option value="Prewedding at Hieros's Studio">Prewedding at Hieros's Studio
                                            </option>
                                            <option value="Custom">Custom</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 wedding-content" style="display: none">
                                        <label for="type" class="form-label">Wedding Package </label>
                                        <select class="form-select form-select-sm" id="wedding-package"
                                            aria-label=".form-select-sm example" name="wedding-package">
                                            <option value="Short Session (4 Hours)">Halfdat wedding (8 Hours)</option>
                                            <option value="Halftday Session (6 Hours)">Candid "Memorabilia" Package (8
                                                Hours)
                                            </option>
                                            <option value="Fullday Session (15 Hours)">Fullday Session (15 Hours)</option>
                                            <option value="Prewedding at Hieros's Studio">Holy Matrimony / Akad Only (5
                                                Hours)
                                            </option>
                                            <option value="Custom">Custom</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 etc" style="display: none">
                                        <label for="tuliskan" class="form-label">Tulis disini </label>
                                        <textarea name="etc" class="form-control-sm form-control" placeholder="event 1, event 2 dst ..." id="etc"
                                            rows="2"></textarea>
                                    </div>
                                    <hr class="hr" />
                                    <div class="mb-1 etc">
                                        <label for="name" class="form-label">Nama lengkap CPW </label>
                                        <input type="text" class="form-control-sm form-control" id="name"
                                            name="name" placeholder="Dimas Setiawan ">
                                    </div>
                                    <div class="mb-1 etc">
                                        <label for="instagram" class="form-label">Instagram (opsional) </label>
                                        <input type="text" class="form-control-sm form-control" id="instagram"
                                            name="instagram" placeholder="@...">
                                    </div>
                                    <div class="mb-1 etc">
                                        <label for="namecpp" class="form-label">Nama lengkap CPP </label>
                                        <input type="text" class="form-control-sm form-control" id="namecpp"
                                            name="namecpp" placeholder="Dina Febria">
                                    </div>
                                    <div class="mb-1 etc">
                                        <label for="instaramcp" class="form-label">Instagram (opsional)</label>
                                        <input type="text" class="form-control-sm form-control" id="instaramcp"
                                            name="instaramcp" placeholder="Dina Febria">
                                    </div>
                                    <div class="mb-1 etc">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control-sm form-control" id="email"
                                            name="email" placeholder="@">
                                    </div>
                                    <div class="mb-1 etc">
                                        <label for="whatsapp" class="form-label">Whatsapp</label>
                                        <input type="text" class="form-control-sm form-control" id="whatsapp"
                                            name="whatsapp" placeholder="+62">
                                    </div>
                                    <div class="mb-1 etc">
                                        <label for="address" class="form-label">Alamat lengkap </label>
                                        <textarea name="address" class="form-control-sm form-control" placeholder="Jl..." id="address" rows="2"></textarea>
                                    </div>
                                    <div class="mb-1">
                                        <label for="list" class="form-label">List backsound video</label>
                                        <select class="form-select form-select-sm" id="list"
                                            aria-label=".form-select-sm example" name="list">
                                            <option
                                                value="Saya mempercayakan backsound kepada Hieros & setuju tidak dapat diganti (revisi)"
                                                selected>Saya mempercayakan backsound kepada Hieros & setuju tidak dapat
                                                diganti
                                                (revisi)</option>
                                            <option value="Saya akan memberi tahu pihak Hieros nanti (Max H-1)">Saya akan
                                                memberi tahu pihak Hieros nanti (Max H-1)</option>
                                            <option value="Saya sudah memiliki pilihan lagu sebagai berikut:">Saya sudah
                                                memiliki pilihan lagu sebagai berikut:</option>
                                            <option value="Saya tidak menggunakan video">Saya tidak menggunakan video
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-1 url" style="display: none">
                                        <label for="urlVideo" class="form-label">List backsound untuk video saya (copas
                                            link)
                                        </label>
                                        <textarea name="urlVideo" class="form-control-sm form-control" placeholder="..." id="urlVideo" rows="2"></textarea>
                                    </div>
                                    <hr class="hr" />
                                    <div class="mb-1 ">
                                        <label for="other" class="form-label">Tanggal, jam & lokasi acara </label>
                                        <textarea name="other" class="form-control-sm form-control" placeholder="Jl..." id="other" rows="2"></textarea>
                                    </div>
                                    <div class="mb-1">
                                        <label for="notes" class="form-label">Catatan tambahan untuk Hieros</label>
                                        <textarea name="notes" class="form-control-sm form-control"
                                            placeholder="Tuliskan secara detil jika anda memiliki preferensi khusus" id="notes" rows="2"></textarea>
                                    </div>
                                    <hr class="hr" />
                                    <div class="mt-4">
                                        <h3>Agreement</h3>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agreement1"
                                                value="true" id="agreement1">
                                            <label class="form-check-label" for="agreement1">
                                                Saya secara sadar telah membaca dan menyetujui Surat Perjanjian Kerjasama
                                                Hieros
                                                2024 - SPK/001/MMXXIV di atas.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agreement2"
                                                value="true" id="agreement2">
                                            <label class="form-check-label" for="agreement2">
                                                Dengan ini saya yang namanya tercantum di atas, memberikan izin kepada
                                                Hieros
                                                Photography untuk melisensikan dan menggunakan foto dimana terdapat saya dan
                                                pasangan pada foto tersebut. Kecuali hal-hal yang melanggar hukum seperti
                                                penghinaan, fitnah & pornografi.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-1 mt-4">
                                        <div class="row px-3">
                                            <button type="submit" id="button" class="btn btn-purple is-rounded">
                                                <div class="spinner-border d-none mx-4" role="status">
                                                </div>
                                                <span class="mr-4" id="tag-button"> <i aria-disabled="true"
                                                        class="fa fa-check-square-o"></i> Kirim Ke
                                                    Herios Photograpy</span>
                                            </button>
                                        </div>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#type").on('change', function() {
                var type = $(this).val();
                if (type != 'calon pengantin') {
                    $('.vendor').show();
                } else {
                    $('.vendor').hide();
                }
            })
            $("#option").on('change', function() {
                var option = $(this).val();
                console.log(option);
                if (option == 'wedding') {
                    $('.etc').hide();
                    $('.wedding-content').show();
                    $('.prewedding-content').hide();
                } else if (option == 'Custome Page') {
                    $('.wedding-content').hide();
                    $('.prewedding-content').hide();
                    $('.etc').show();
                } else if (option == 'prewedding') {
                    $('.etc').hide();
                    $('.wedding-content').hide();
                    $('.prewedding-content').show();
                }
            })
            $("#list").on('change', function() {
                var list = $(this).val();
                if (list == 'Saya sudah memiliki pilihan lagu sebagai berikut:') {
                    $('.url').show();
                }
            })
        });
        $('#form-booking').submit(function(event) {
            $(this).prop('disabled', false);
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).find('#tag-button').addClass('d-none');
            event.preventDefault();
            var form = document.getElementById('form-booking');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('account.register') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showAlert(response.message, 'success')
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
