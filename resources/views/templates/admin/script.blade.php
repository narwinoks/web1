  <!-- Required Js -->
  <script src="{{ asset('assets/templates/js/vendor-all.min.js') }}"></script>
  <script src="{{ asset('assets/templates/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/templates/js/ripple.js') }}"></script>
  <script src="{{ asset('assets/templates/js/pcoded.min.js') }}"></script>
  <!-- prism Js -->
  <script src="{{ asset('assets/templates/js/plugins/prism.js') }}"></script>
  <script src="{{ asset('assets/templates/js/horizontal-menu.js') }}"></script>
  <script>
      (function() {
          if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
              return;
          }
          try {
              window.layoutHelpers._getSetting("Rtl")
              window.layoutHelpers.setCollapsed(
                  localStorage.getItem('layoutCollapsed') === 'true',
                  false
              );
          } catch (e) {}
      })();
      $(function() {
          $('#layout-sidenav').each(function() {
              new SideNav(this, {
                  orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
              });
          });
          $('body').on('click', '.layout-sidenav-toggle', function(e) {
              e.preventDefault();
              window.layoutHelpers.toggleCollapsed();
              if (!window.layoutHelpers.isSmallScreen()) {
                  try {
                      localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                  } catch (e) {}
              }
          });
      });
      $(document).ready(function() {
          $("#pcoded").pcodedmenu({
              themelayout: 'horizontal',
              MenuTrigger: 'hover',
              SubMenuTrigger: 'hover',
          });
      });
  </script>
  <script src="{{ asset('assets/templates/js/analytics.js') }}"></script>
  @stack('scripts')
