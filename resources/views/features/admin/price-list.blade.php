@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title">Pricelist</h4>
                </div>
                <div class="card-body">
                    <div class="row search">
                        <div class="col-md-4">
                            <select class="form-select form-select-sm input-custom" id="category"
                                aria-label=".form-select-sm example" name="category">
                                <option value="" selected>Pilih Category</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type['value'] }}">{{ $type['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-auto">
                            <button class="btn btn-secondary btn-rounded" id="btn-search">
                                <i class="feather icon-search"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-success btn-rounded" id="btn-add">
                                <i class="feather icon-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-5" id="content">
                    </div>
                    <div class="row justify-content-center">
                        <div id="loading-animation" class="text-center" style="display: none">
                            <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" id="modal-pricelist"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
    <!-- end modal -->
    <input type="hidden" value="false" name="istrue" id="istrue">
@endsection
@push('scripts')
    <script src="{{ asset('assets/templates/plugins/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });
            $("#btn-add").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.showModal') }}",
                    data: {
                        key: "pricelist",
                    },
                    success: function(data) {
                        $("#modal-content").html(data);
                        $("#modal-pricelist").modal("show");
                        loadTimy();
                    },
                });
            });
            $("body").on("click", ".close-modal", function(e) {
                e.preventDefault();
                $("#modal-pricelist").modal("hide");
            });
            $("body").on("submit", "#form-add-pricelist", function(e) {
                $(this).prop('disabled', false);
                $(this).find('.spinner-border').removeClass('d-none');
                $(this).find('#tag-button').addClass('d-none');
                tinymce.triggerSave();
                event.preventDefault();
                var form = document.getElementById('form-add-pricelist');
                var formData = new FormData(form);
                $.ajax({
                    url: '{{ route('admin.saveContent') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        showAlert(response.message, 'success')
                        $("#modal-pricelist").modal("hide");
                        loadMoreData();
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
        })
        $("#btn-search").click(function() {
            $('#offset').val(0)
            $('#limit').val(6)
            $("#istrue").val(false);
            loadMoreData();
        });
        loadMoreData();

        function loadMoreData() {
            $("#loading-animation").show();
            let isTrue = $("#istrue").val() === "true" ? true : false;
            var category = $('#category').val();
            $.ajax({
                url: "{{ route('admin.content') }}",
                type: 'GET',
                async: false,
                data: {
                    category: category,
                    key: 'price-list'
                },
            }).done(function(data) {
                setTimeout(function() {
                    $("#loading-animation").hide();
                }, 2000)
                $('#content').empty()
                $('#content').append(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })

        }
        $("body").on("click", ".delete-button-pricelist", function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'DELETE',
                url: "{{ route('admin.deleteContent') }}",
                data: {
                    id: id,
                    key: 'delete'
                },
                success: function(response) {
                    showAlert(response.message || 'Success', 'success')
                    loadMoreData();
                },
                error: function(xhr) {
                    showAlert("Gagal" || 'Error', 'danger')
                }
            });
        })
        $("body").on("click", ".edit-button-pricelist", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                type: "GET",
                url: "{{ route('admin.showModal') }}",
                data: {
                    key: "pricelist",
                    id: id
                },
                success: function(data) {
                    $("#modal-content").html(data);
                    $("#modal-pricelist").modal("show");
                    loadTimy();
                },
            });
        });

        function loadTimy() {

            tinymce.init({
                selector: "textarea.tinymce",
                theme: "modern",
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor code template"
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
                toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code | fontsizeselect template",
                image_advtab: true,
                fontsize_formats: '8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 18pt',
                content_style: "div, p { font-size: 14px; }",
                height: "400",
                relative_urls: false,
                remove_script_host: false,
                document_base_url: "#",
                templates: [{
                    title: 'PRICELIST',
                    description: 'TEMPLATE',
                    content: '<ul class="pricing-content">' +
                        '<li><b>1</b> Photographer</li>' +
                        '<li><b>15</b> Workhour & include Hieros</li>' +
                        '<li>Print 1pc 16Rp w/ minimalist frame</li>' +
                        '<li><b>1</b>Autofit</li>' +
                        '<li>All edited & JPG files via Google Drive</li>' +
                        '</ul>'
                }],
                init_instance_callback: function(editor) {
                    editor.setContent(
                        '<ul class="pricing-content">' +
                        '<li><b>1</b> Photographer</li>' +
                        '<li><b>15</b> Workhour & include Hieros</li>' +
                        '<li>Print 1pc 16Rp w/ minimalist frame</li>' +
                        '<li><b>1</b>Autofit </li>' +
                        '<li>All edited & JPG files via Google Drive</li>' +
                        '</ul>'
                    );
                }
            });

        }
    </script>
@endpush
@push('styles')
@endpush
