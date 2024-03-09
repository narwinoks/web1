<script>
    @if (session('success'))
        $.notify({
            // options
            message: '{{ session('success') }}'
        }, {
            // settings
            type: 'success',
            offset: {
                x: 15,
                y: 68
            }
        });
    @endif

    @if (session('info'))
        $.notify({
            // options
            message: '{{ session('info') }}'
        }, {
            // settings
            type: 'info',
            offset: {
                x: 15,
                y: 68
            }
        });
    @endif

    @if (session('danger'))
        $.notify({
            // options
            message: '{{ session('danger') }}'
        }, {
            // settings
            type: 'danger',
            offset: {
                x: 15,
                y: 68
            }
        });
    @endif
    @if (session('error'))
        $.notify({
            // options
            message: '{{ session('error') }}'
        }, {
            // settings
            type: 'danger',
            offset: {
                x: 15,
                y: 68
            }
        });
    @endif

    @if (session('warning'))
        $.notify({
            // options
            message: '{{ session('warning') }}'
        }, {
            // settings
            type: 'warning',
            offset: {
                x: 15,
                y: 68
            }
        });
    @endif
</script>
<style>
    .dismiss-hidden [data-notify="dismiss"] {
        display: none !important;
    }

    .alert button {
        display: none !important;
    }
</style>
