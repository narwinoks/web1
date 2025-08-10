<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/plugin/jquery/jquery.min.js') }}"></script>
<!-- Masukkan jQuery sebelum script lainnya -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/plugin/bs-notify/bs-notify.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $("#logout").click(function(event) {
        event.preventDefault();
        var form = $('#form-logout');
        form.submit();;
    });
</script>
<script>
$(document).ready(function() {
    $(".burger").off('click').on('click', function() {
        console.log('clicked burger');
        $(".navbar-content").toggleClass("show");
    });

    $(".btn-close-white").click(function() {
            console.log('clicked btn-close-whi')
        $(".navbar-content").removeClass("show");
    });
});
</script>
@stack('scripts')
