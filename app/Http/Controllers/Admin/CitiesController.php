<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CitiesController extends AdminController
{
    public function index()
    {
        $breadcrumbData = [
            'current_title' => 'All City',
            'other_items' => [
//                [
//                    'title' => 'Dashboard',
//                    'url' => url('/'),
//                    'active' => false,
//                ],
                [
                    'title' => 'All City',
                    'url' => route('city.all'),
                    'active' => false,
                ]
            ]
        ];
        return view('admin.City.index', [
            'breadcrumbData' => $breadcrumbData,
            'currentPage' => 'City',
            'Cities' => Cities::all(),
        ]);
    }

    public function create()
    {
        $breadcrumbData = [
            'current_title' => 'All City',
            'other_items' => [

                [
                    'title' => 'All City',
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
        return view('admin.City.form', [
            'breadcrumbData' => $breadcrumbData,
            'currentPage' => 'City',
            'Countries' => Countries::all(),

        ]);
    }

    public function ajaxGetStates($country_id = null)
    {
        $response = [];
        if ($country_id) {
            $get_states = States::query()->where('country_id', $country_id)->get();
            $html = '<option value="">Select State</option>';
            if ($get_states) {
                foreach ($get_states as $state) {
                    $html .= '<option value="' . $state->id . '">' . $state->name . '</option>';
                }
            }

            $response = [
                'status' => 1,
                'message' => $get_states->count() . ' Rows found',
                'html' => $html
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'Data not found',
                'html' => ''
            ];
        }

        return response($response);
    }

    public function edit($id)
    {
        if ($city = Cities::find($id)) {
            $breadcrumbData = [
                'current_title' => 'City',
                'other_items' => [

                    [
                        'title' => 'All City',
                        'url' => route('city.all'),
                        'active' => false,
                    ],
                    [
                        'title' => 'Edit',
                        'url' => url('/'),
                        'active' => false,
                    ],
                ]
            ];
            return view('admin.City.form', [
                'breadcrumbData' => $breadcrumbData,
                'currentPage' => 'City',
                'Countries' => Countries::query()->where('id', $city->country_id)->get(),
                'States' => States::query()->where('country_id', $city->country_id)->get(),
                'row' => $city
            ]);
        } else {
            return redirect()->back()->with(['msg_type' => 'warning', 'msg' => 'No row found']);
        }

    }

    public function save(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
            'state_id' => 'required',
            'name' => 'required'
        ]);

        $validator->setAttributeNames([
            'country_id' => 'Country',
            'state_id' => 'State',
            'name' => 'City Name'
        ]);

        if ($validator->fails()) {
            return Redirect::back();
        }


        if ($city = Cities::find($id)) {
            $city->country_id = $request->country_id;
            $city->state_id = $request->state_id;
            $city->name = $request->name;
            $city->save();
        } else {
            $city = new Cities();
            $city->country_id = $request->country_id;
            $city->state_id = $request->state_id;
            $city->name = $request->name;
            $city->save();
        }

        return redirect('city/all')->with(['msg_type' => 'success', 'msg' => 'City Saved']);
    }

    public function delete($id)
    {
        if ($city = Cities::find($id)) {
            $city->delete();
            return redirect()->back()->with(['msg_type' => 'success', 'msg' => 'City deleted successfully']);

        } else {
            return redirect()->back()->with(['msg_type' => 'warning', 'msg' => 'No row found']);
        }

    }
}
