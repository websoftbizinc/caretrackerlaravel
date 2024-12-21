<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StatesController extends AdminController
{
    public function index()
    {
        $breadcrumbData = [
            'current_title' => 'States',
            'other_items' => [
//                [
//                    'title' => 'Dashboard',
//                    'url' => url('/'),
//                    'active' => false,
//                ],
                [
                    'title' => 'All States',
                    'url' => route('state.all'),
                    'active' => false,
                ]
            ]
        ];
        return view('admin.State.index', [
            'breadcrumbData' => $breadcrumbData,
            'currentPage' => 'State',
            'States' => States::all(),
        ]);
    }

    public function create()
    {
        $breadcrumbData = [
            'current_title' => 'State',
            'other_items' => [

                [
                    'title' => 'All States',
                    'url' => route('state.all'),
                    'active' => false,
                ],
                [
                    'title' => 'Add new',
                    'url' => url('/'),
                    'active' => false,
                ],
            ]
        ];
        return view('admin.State.form', [
            'breadcrumbData' => $breadcrumbData,
            'currentPage' => 'State',
            'Countries' => Countries::all(),

        ]);
    }

    public function edit($id)
    {
        if ($state = States::find($id)) {
            $breadcrumbData = [
                'current_title' => 'Country',
                'other_items' => [

                    [
                        'title' => 'All States',
                        'url' => route('state.all'),
                        'active' => false,
                    ],
                    [
                        'title' => 'Edit',
                        'url' => url('/'),
                        'active' => false,
                    ],
                ]
            ];
            return view('admin.State.form', [
                'breadcrumbData' => $breadcrumbData,
                'currentPage' => 'Country',
                'Countries' => Countries::all(),
                'row' => $state
            ]);
        } else {
            return redirect()->back()->with(['msg_type' => 'warning', 'msg' => 'No row found']);
        }

    }

    public function save(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
            'name' => 'required'
        ]);

        $validator->setAttributeNames([
            'country_id' => 'Country',
            'name' => 'State Name'
        ]);

        if ($validator->fails()) {
            return Redirect::back();
        }


        if ($state = States::find($id)) {
            $state->country_id = $request->country_id;
            $state->name = $request->name;
            $state->save();
        } else {
            $state = new States();
            $state->country_id = $request->country_id;

            $state->name = $request->name;
            $state->save();
        }

        return redirect('state/all')->with(['msg_type' => 'success', 'msg' => 'State Saved']);
    }

    public function delete($id)
    {
        if ($state = States::find($id)) {
            $state->delete();
            return redirect()->back()->with(['msg_type' => 'success', 'msg' => 'State deleted successfully']);

        } else {
            return redirect()->back()->with(['msg_type' => 'warning', 'msg' => 'No row found']);
        }

    }
}
