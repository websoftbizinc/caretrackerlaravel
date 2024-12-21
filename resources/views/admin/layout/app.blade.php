<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.head')
    @stack('style')
</head>
<body>
<div class="wrapper">
    @include('admin.partials.sidebar')

    <div class="main-panel">
        @include('admin.partials.main-header')

        <div class="container">
            <div class="page-inner">
                @include('admin.partials.breacrumb')
                @yield('content')
            </div>
        </div>

        @include('admin.partials.footer')
    </div>

    <!-- Custom template | don't include it in your project! -->
{{--    <div class="custom-template">--}}
{{--        <div class="title">Settings</div>--}}
{{--        <div class="custom-content">--}}
{{--            <div class="switcher">--}}
{{--                <div class="switch-block">--}}
{{--                    <h4>Logo Header</h4>--}}
{{--                    <div class="btnSwitch">--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="selected changeLogoHeaderColor"--}}
{{--                            data-color="dark"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="blue"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="purple"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="light-blue"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="green"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="orange"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="red"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="white"--}}
{{--                        ></button>--}}
{{--                        <br/>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="dark2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="blue2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="purple2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="light-blue2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="green2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="orange2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeLogoHeaderColor"--}}
{{--                            data-color="red2"--}}
{{--                        ></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="switch-block">--}}
{{--                    <h4>Navbar Header</h4>--}}
{{--                    <div class="btnSwitch">--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="dark"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="blue"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="purple"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="light-blue"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="green"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="orange"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="red"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="selected changeTopBarColor"--}}
{{--                            data-color="white"--}}
{{--                        ></button>--}}
{{--                        <br/>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="dark2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="blue2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="purple2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="light-blue2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="green2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="orange2"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeTopBarColor"--}}
{{--                            data-color="red2"--}}
{{--                        ></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="switch-block">--}}
{{--                    <h4>Sidebar</h4>--}}
{{--                    <div class="btnSwitch">--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeSideBarColor"--}}
{{--                            data-color="white"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="selected changeSideBarColor"--}}
{{--                            data-color="dark"--}}
{{--                        ></button>--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="changeSideBarColor"--}}
{{--                            data-color="dark2"--}}
{{--                        ></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="custom-toggle">--}}
{{--            <i class="icon-settings"></i>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- End Custom template -->
</div>

<?=
 Assets::js();

?>
@stack('script')
<!--   Core JS Files   -->
{{----}}
<script>
    $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
    });

    $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
    });

    $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
    });
</script>
@if(session()->has('msg') || session()->has('msg_type'))
    <script>
        var content = {};

        content.message = '{{session()->get('msg')}}'
        content.title = "";
        // if (style == "withicon") {
        content.icon = "fa fa-bell";
        // } else {
        //     content.icon = "none";
        // }
        content.url = "#";
        content.target = "";

        $.notify(content, {
            type: '{{session()->get('msg_type')}}',
            placement: {
                from: 'top',
                align: 'right',
            },
            time: 1000,
            delay: 0,
        });
    </script>
@endif
</body>
</html>
