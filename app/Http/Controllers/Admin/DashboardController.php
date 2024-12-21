<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
    public function index()
    {
        $breadcrumbData = [
            'current_title' => 'Dashboard',
            'other_items' => [
                [
                    'title' => 'Dashboard',
                    'url' => '#',
                    'active' => false,
                ]
            ]
        ];
        return view('admin.Dashboard.index', [
            'breadcrumbData' => $breadcrumbData
        ]);
    }
}
