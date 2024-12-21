<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CountriesController extends AdminController
{
    public function index()
    {
        $breadcrumbData = [
            'current_title' => 'Country',
            'other_items' => [
//                [
//                    'title' => 'Dashboard',
//                    'url' => url('/'),
//                    'active' => false,
//                ],
                [
                    'title' => 'All Countries',
                    'url' => route('country.all'),
                    'active' => false,
                ]
            ]
        ];
        return view('admin.Country.index', [
            'breadcrumbData' => $breadcrumbData,
            'currentPage' => 'Country',
            'Countries' => Countries::all(),
        ]);
    }

    public function create()
    {
        $breadcrumbData = [
            'current_title' => 'Country',
            'other_items' => [

                [
                    'title' => 'All Countries',
                    'url' => route('country.all'),
                    'active' => false,
                ],
                [
                    'title' => 'Add new',
                    'url' => url('/'),
                    'active' => false,
                ],
            ]
        ];
        return view('admin.Country.form', [
            'breadcrumbData' => $breadcrumbData,
            'currentPage' => 'Country'
        ]);
    }

    public function edit($id)
    {
        if ($country = Countries::find($id)) {
            $breadcrumbData = [
                'current_title' => 'Country',
                'other_items' => [

                    [
                        'title' => 'All Countries',
                        'url' => route('country.all'),
                        'active' => false,
                    ],
                    [
                        'title' => 'Edit',
                        'url' => url('/'),
                        'active' => false,
                    ],
                ]
            ];
            return view('admin.Country.form', [
                'breadcrumbData' => $breadcrumbData,
                'currentPage' => 'Country',
                'row' => $country
            ]);
        } else {
            return redirect()->back()->with(['msg_type' => 'warning', 'msg' => 'No row found']);
        }

    }

    public function save(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        $validator->setAttributeNames([
            'name' => 'Country Name'
        ]);

        if ($validator->fails()) {
            return Redirect::back();
        }


        if ($country = Countries::find($id)) {
            $country->name = $request->name;
            $country->save();
        } else {
            $country = new Countries();
            $country->name = $request->name;
            $country->save();
        }

        return redirect('country/all')->with(['msg_type' => 'success', 'msg' => 'Country Saved']);
    }

    public function delete($id)
    {
        if ($country = Countries::find($id)) {
            $country->delete();
            return redirect()->back()->with(['msg_type' => 'success', 'msg' => 'Country deleted successfully']);

        } else {
            return redirect()->back()->with(['msg_type' => 'warning', 'msg' => 'No row found']);
        }

    }
}
