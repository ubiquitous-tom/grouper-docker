<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Member;
use App\Transformers\MemberTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Fractal\Fractal;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $all = Member::all();
//        $members = \fractal()
//            ->collection($all)
//            ->transformWith(new MemberTransformer())
//            ->toArray();
        $members = Member::all();
//        dd($members);
        return view('members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $member = new Member();
            $member->first_name = $request->input('first_name');
            $member->middle_name = $request->input('middle_name', '');
            $member->last_name = $request->input('last_name');
            $member->email = $request->input('email');
            $member->phone_number = $request->input('phone_number');
            $member->company = $request->input('company');
            $member->save();

            Session(['redirect.members.created.' . $member->id => $request->fullUrl()]);

            return Redirect::to('/members')->with('message', 'Add New Member Successful!');
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
        $member = Member::findOrFail($id);

        return view('members.show', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
//        dd($member->full_name);
//        dd($member);
        return view('members.edit', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, $id)
    {
        $validated = $request->validated();
        if ($validated) {
            $member = Member::find($id);
            $member->first_name = $request->input('first_name');
            $member->middle_name = $request->input('middle_name');
            $member->last_name = $request->input('last_name');
            $member->email = $request->input('email');
            $member->phone_number = $request->input('phone_number');
            $member->company = $request->input('company');
            $member->status = $request->input('status');
            $member->save();

            Session(['redirect.members.updated.' . $id => $request->fullUrl()]);

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
