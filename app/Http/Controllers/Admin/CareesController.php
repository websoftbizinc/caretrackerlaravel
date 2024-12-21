<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carees;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CareesController extends AdminController
{
    public function index()
    {
        $breadcrumbData = [
            'current_title' => 'Employers',
            'other_items' => [
                [
                    'title' => 'Dashboard',
                    'url' => url('/'),
                    'active' => false,
                ],
                [
                    'title' => 'User Management',
                    'url' => '#',
                    'active' => false,
                ],
                [
                    'title' => 'Employers',
                    'url' => route('allCarees'),
                    'active' => false,
                ]
            ]
        ];
        return view('admin.Carees.index', [
            'breadcrumbData' => $breadcrumbData,
            'currentPage' => 'employers'
        ]);
    }

    public function datatableList(Request $request)
    {
        return DataTables::eloquent(Carees::query()->orderBy('id', 'desc'))
//            ->addColumn('action', function ($query) {
//                $links = '<a href="' . route('Carees.detail', $query->id) . '" class="btn btn-warning btn-xs">Details</a>';
//                return $links;
//            })
            ->addColumn('guardian', function ($query) {
                return $query->Guardian ?  $query->Guardian->full_name  : 'N/A';
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function detail($id)
    {
        $employee = Carees::find($id);
//        dd($user->Contact);
        $breadcrumbData = [
            'current_title' => 'All Carees',
            'other_items' => [
                [
                    'title' => 'Dashboard',
                    'url' => url('/'),
                    'active' => false,
                ],
                [
                    'title' => 'User Management',
                    'url' => '#',
                    'active' => false,
                ],
                [
                    'title' => 'Carees',
                    'url' => route('allUsers'),
                    'active' => false,
                ],
                [
                    'title' => 'Detail',
                    'url' => route('Carees.detail', $employee->id),
                    'active' => false,
                ]
            ]
        ];
        return view('admin.Carees.detail', [
            'breadcrumbData' => $breadcrumbData,
            'employee' => $employee
        ]);
    }
}
