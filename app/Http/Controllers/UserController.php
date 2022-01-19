<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
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
            'lecturer'  => 'required',
            'exam_date' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('subjects/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $subject = new Subject;
            $subject->name       = $request->get('name');
            $subject->lecturer   = $request->get('lecturer');
            $subject->exam_date  = $request->get('exam_date');
            $subject->save();

            // redirect
            Session::flash('message', 'Successfully created subject!');
            return Redirect::to('subjects');
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
        $user = User::find($id);
        return View::make('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return View::make('users.edit')->with('user', $user);
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
            'name'      => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withRequest($request->except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->name      = $request->get('name');
            $user->lecturer  = $request->get('lecturer');
            $user->exam_date = $request->get('exam_date');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated subject!');
            return Redirect::to('users');
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
        $subject = Subject::find($id);
        $subject->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the subject!');
        return Redirect::to('subjects');
    }
}
