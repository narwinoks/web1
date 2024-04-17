@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title">ADD For Photographers Product</h4>
                </div>
                <div class="card-body">
                    <form id="form-add-product">
                        <input type="hidden" name="key" id="key" value="product">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <div class="card-add">
                                    <header class="panel-heading">
                                        Product
                                    </header>
                                    <input type="hidden" value="{{ $product->id }}" name="id" id="id">
                                    <div class="mb-1 mt-2">
                                        <label for="name" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control input-custom" placeholder="NAMA PRODUK"
                                            aria-label="name" aria-describedby="basic-addon1" value="{{ $product->name }}"
                                            id="name" name="name">
                                        <span class="error-name text-danger d-none"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label for="price" class="form-label">Haga</label>
                                                <input type="text" class="form-control input-custom" placeholder="250000"
                                                    aria-label="price" aria-describedby="basic-addon1" id="price"
                                                    name="price" value="{{ $product->price }}">
                                                <span class="error-price text-danger d-none"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label for="promo" class="form-label">Promo</label>
                                                <input type="text" class="form-control input-custom" placeholder="200000"
                                                    aria-label="promo" aria-describedby="basic-addon1" id="promo"
                                                    name="promo" value="{{ $product->promo }}">
                                                <span class="error text-danger">* Harga Promo</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="stock" class="form-label">Stok</label>
                                        <input type="number" class="form-control input-custom" placeholder="STOCK"
                                            aria-label="name" aria-describedby="basic-addon1" id="stock" name="stock"
                                            value="{{ $product->stock }}">
                                    </div>
                                    <div class="mb-1 mt-1">
                                        <div class="d-flex justify-content-between">
                                            <label for="description" class="form-label">Description</label>
                                            <button class="btn btn-sm btn-warning" id="show-modal-image">Image</button>
                                        </div>
                                        <textarea class="tinymce" name="description" rows="6" placeholder="Description..">{{ $product->description }}</textarea>
                                        <span class="error-content text-danger d-none"></span>
                                    </div>
                                    <div class="mb-1">
                                        <label for="tag" class="form-label">Tag</label>
                                        <textarea class="form-control input-custom" name="tag" rows="2" placeholder="tag..">{{ $product->tag }}</textarea>
                                        <span class="error-content text-danger ">*pisahkan dengan koma</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="card-add mb-1">
                                    <header class="panel-heading">
                                        Simpan
                                    </header>
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <button type="button"
                                                class="btn btn-sm close-modal-add-image btn-secondary">Close</button>
                                            <button type="submit" id="button" class="btn btn-sm btn-primary is-rounded">
                                                <div class="spinner-border d-none mx-4" role="status">
                                                </div>
                                                <span class="mr-4" id="tag-button"> <i aria-disabled="true"
                                                        class="fas fa-save"></i>
                                                    Simpan</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-add ">
                                    <header class="panel-heading">
                                        Image
                                    </header>
                                    <div class="justify-content-center text-center">
                                        <img id="blah" src="{{ asset('assets/img/no-images.png') }}"
                                            alt="your image" class="img-fluid img-product" /><br><br>
                                        <input type='file' id="imgInp" class="file" name="image" />
                                        <span class="error-image text-danger d-none"></span>
                                    </div>
                                    <div class="row col-12">
                                        <div class="mt-5" id="image">
                                            <label class="form-label mb-4" for="images">Upload image</label>
                                            <br>
                                            <label>*ukuran maks 5MB, lebar maks: 5000px, tinggi maks: 5000px, per gambar
                                            </label>
                                            <div class="input-images"></div>
                                            <br>
                                            <span class="error text-danger d-none images"></span>
                                        </div>
                                    </div>
                                    <div class="row" id="fillimageDetail">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modal-image"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">Image Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row" id="fillimage">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-5" id="image">
                                <h5 class="mt-3">Pilih Gambar</h5>
                                <hr>
                                <form action="#" method="POST" id="form-add-image">
                                    @csrf
                                    @method('POST')
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image-input"
                                                name="image" accept="image/*">
                                            <label class="custom-file-label" for="image-input">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="error text-danger d-none image"></span>
                                    <button class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" aria-label="Close"
                        class="btn btn-sm close-modal-add-image btn-secondary">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection
@push('styles')
    <style>
        .card-add {
            margin: auto;
            padding: 10px;
            position: relative;
            border: 1px solid #ccc;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border-radius: .25rem;
        }

        .img-product {
            max-width: 100px;
        }

        .panel-heading {
            margin: 0px;
            padding: 10px 15px;
            border-radius: 0px;
            background: #fff;
            border-bottom: 1px solid #f1f1f1;
            color: #777;
            text-transform: uppercase;
        }

        .image-preview {
            position: relative;
            display: inline-block;
        }

        .image-preview img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
        }

        .image-buttons {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

        .delete-button,
        .set-picture-button {
            margin-right: 5px;
        }
    </style>
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets/templates/plugins/image-upload/image-uploader.min.css') }}" />
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/templates/plugins/image-upload/image-uploader.min.js') }}">
    </script>
    <script src="{{ asset('assets/templates/plugins/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        tinymce.init({
            selector: "textarea.tinymce",
            theme: "modern",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code | fontsizeselect",
            image_advtab: true,
            fontsize_formats: '8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 18pt',
            content_style: "div, p { font-size: 14px; }",
            height: "400",
            relative_urls: false,
            remove_script_host: false,
            document_base_url: "#",
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
            $('.input-images').imageUploader();

            $("body").on("submit", "#form-add-product", function(e) {
                $(this).prop('disabled', false);
                $(this).find('.spinner-border').removeClass('d-none');
                $(this).find('#tag-button').addClass('d-none');
                event.preventDefault();
                var form = document.getElementById('form-add-product');
                var formData = new FormData(form);
                $.ajax({
                    url: '{{ route('admin.saveContent') }}',
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
            $("body").on("click", "#show-modal-image", function(e) {
                e.preventDefault();
                $("#modal-image").modal("show");
                loadArticleGallery();
            });
            $("body").on("click", ".remove-image", function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('admin.deleteContent') }}",
                    data: {
                        id: id,
                        key: 'delete-image'
                    },
                    success: function(response) {
                        showAlert(response.message || 'Success', 'success')
                        loadImg();
                    },
                    error: function(xhr) {
                        showAlert("Gagal" || 'Error', 'danger')
                    }
                });
                console.log("sss", id);
            })
            $("body").on("click", ".add-image", function(e) {
                e.preventDefault();
                var imageUrl = $(this).data('image');
                var imgElement = '<img class="img-responsive" src="' + imageUrl +
                    '" alt="Image" style="max-width: 750px; margin-left: auto; margin-right: auto;">';
                var tinymceEditor = tinymce.get('description');
                tinymceEditor.insertContent(imgElement);
                $("#modal-image").modal("hide");
            });

            function loadArticleGallery() {
                $.ajax({
                    url: '{{ route('admin.content') }}',
                    type: 'GET',
                    data: {
                        key: "img-gallery"
                    }
                }).done(function(data) {
                    $("body").find("#fillimage").html(data);
                });
            }

            function loadImg() {
                $.ajax({
                    url: '{{ route('admin.content') }}',
                    type: 'GET',
                    data: {
                        key: "img-gallery",
                        id: $('#id').val()
                    }
                }).done(function(data) {
                    $("body").find("#fillimageDetail").html(data);
                });
            }
            loadImg()
        })
    </script>
@endpush
