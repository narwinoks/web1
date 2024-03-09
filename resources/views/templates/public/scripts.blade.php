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
@stack('scripts')
