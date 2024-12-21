<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Assets;
class AdminController extends Controller
{
    public function __construct()
    {
        Assets::config([
            'css_dir' => asset('assets/'),
            'js_dir' => asset('assets/'),
        ]);
        Assets::addCSS(
            [
                'css/bootstrap.min.css',
                'css/plugins.min.css',
                'css/kaiadmin.min.css',
                'css/demo.css',
            ]
        );
        Assets::addJS(
            [
                'js/core/jquery-3.7.1.min.js',
                'js/core/popper.min.js',
                'js/core/bootstrap.min.js',
                'js/plugin/jquery-scrollbar/jquery.scrollbar.min.js',
                'js/plugin/chart.js/chart.min.js',
                'js/plugin/jquery.sparkline/jquery.sparkline.min.js',
                'js/plugin/chart-circle/circles.min.js',
                'js/plugin/datatables/datatables.min.js',
                'js/plugin/bootstrap-notify/bootstrap-notify.min.js',
                'js/plugin/jsvectormap/jsvectormap.min.js',
                'js/plugin/jsvectormap/world.js',
                'js/plugin/sweetalert/sweetalert.min.js',
                'js/kaiadmin.min.js',
                'js/setting-demo.js',
//                'js/demo.js',
            ]
        );

    }


}
