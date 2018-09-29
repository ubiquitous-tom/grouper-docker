<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\HttpCache\Store;

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

        return view('groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $group = new Group();
            $group->name = $request->input('name');
            $group->location = $request->input('location');
            $group->start_time = $request->input('start_time');
            $group->end_time = $request->input('end_time');
            $group->save();

            Session(['redirect.groups.updated.' . $group->id => $request->fullUrl()]);

            return Redirect::to('/groups')->with('message', 'Update Successful!');
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
        $group = Group::findOrFail($id);
        dd($group);
        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);

        return view('groups.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        $validated = $request->validated();
        if ($validated) {
            $group = Group::find($id);
            $group->name = $request->input('name');
            $group->location = $request->input('location');
            $group->start_time = $request->input('start_time');
            $group->end_time = $request->input('end_time');
            $group->status = $request->input('status');
            $group->save();

            Session(['redirect.groups.updated.' . $id => $request->fullUrl()]);

            return Redirect::back()->with('message', 'Update Successful!');
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
        //
    }
}
