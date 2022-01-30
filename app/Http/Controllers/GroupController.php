<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index')->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'name'      => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('groups/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $group = new Group;
            $group->name       = $request->get('name');
            $group->save();

            // redirect
            Session::flash('message', 'Successfully created group!');
            return Redirect::to('groups');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);

        return View::make('groups.show')->with('group', $group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);

        return View::make('groups.edit')->with('group', $group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $rules = array(
            'name' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('groups/' . $id . '/edit')
                   ->withErrors($validator)
                   ->withRequest($request->except('password'));
        } else {
            // store
            $group = Group::find($id);
            $group->name = $request->get('name');
            $group->save();

            // redirect
            Session::flash('message', 'Successfully updated group!');
            return Redirect::to('groups');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the group!');
        return Redirect::to('groups');
    }
}
