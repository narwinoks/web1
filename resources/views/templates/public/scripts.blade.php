<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/plugin/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/plugin/bs-notify/bs-notify.min.js') }}"></script>
<script>
    $("#logout").click(function(event) {
        event.preventDefault();
        var form = $('#form-logout');
        form.submit();;
    });
</script>
<script>
    $(".burger").click(function() {
        $(".navbar-content").toggleClass("show");
    });

    $(".btn-close-white").click(function() {
        console.log("ss");
        $(".navbar-content").removeClass("show");
    });
</script>
@stack('scripts')
