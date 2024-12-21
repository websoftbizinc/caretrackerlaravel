<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends AdminController
{
    public function index()
    {
        $breadcrumbData = [
            'current_title' => 'Employee',
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
                    'title' => 'Employee',
                    'url' => route('allUsers'),
                    'active' => false,
                ]
            ]
        ];
        return view('admin.Users.index', [
            'breadcrumbData' => $breadcrumbData,
            'currentPage' => 'employee'
        ]);
    }

    public function datatableList(Request $request)
    {
        return DataTables::eloquent(User::query()->where('type', 'Caregiver')->orderBy('id', 'desc'))
//            ->addColumn('action', function ($query) {
//                $links = '<a href="' . route('user.detail', $query->id) . '" class="btn btn-warning btn-xs">Details</a>';
//                return $links;
//            })
            ->addColumn('status', function ($query) {
                return $query->deleted_at === null ? '<span class="badge badge-success">active</span>' : '<span class="badge badge-danger">deleted</span>';
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function detail($id)
    {
        $user = User::find($id);
//        dd($user->Contact);
        $breadcrumbData = [
            'current_title' => 'All Users',
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
                    'title' => 'All Users',
                    'url' => route('allUsers'),
                    'active' => false,
                ],
                [
                    'title' => 'Detail',
                    'url' => route('user.detail', $user->id),
                    'active' => false,
                ]
            ]
        ];
        return view('admin.Users.detail', [
            'breadcrumbData' => $breadcrumbData,
            'user' => $user,
            'currentPage' => 'employers'
        ]);
    }
}
