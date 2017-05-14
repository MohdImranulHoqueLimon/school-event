<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{!! Html::script('assets/admin/global/plugins/respond.min.js') !!}
{!! Html::script('assets/admin/global/plugins/excanvas.min.js') !!}
{!! Html::script('assets/admin/global/plugins/ie8.fix.min.js') !!}
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{!! Html::script('assets/admin/global/plugins/jquery.min.js') !!}
{!! Html::script('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/admin/global/plugins/js.cookie.min.js') !!}
{!! Html::script('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/admin/global/plugins/jquery.blockui.min.js') !!}
{!! Html::script('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
{!! Html::script('assets/admin/global/scripts/app.min.js') !!}
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
{!! Html::script('assets/admin/layouts/layout/scripts/layout.min.js') !!}
{!! Html::script('assets/admin/layouts/layout/scripts/demo.min.js') !!}
{!! Html::script('assets/admin/layouts/global/scripts/quick-sidebar.min.js') !!}
{!! Html::script('assets/admin/layouts/global/scripts/quick-nav.min.js') !!}
<!-- END THEME LAYOUT SCRIPTS -->
{!! Html::script('js/printPreview.js') !!}
<script type="text/javascript">

    $(function(){
        $(".printPreview").printPreview({
            obj2print:'.page-content-wrapper',
            width:'810'
        });
    });
</script>
@yield('scripts')

    </body>

</html>