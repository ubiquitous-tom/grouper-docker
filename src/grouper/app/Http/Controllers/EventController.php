<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        dd($request->all());
        $validated = $request->validated();
        dd($validated);

        return view('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
//        dd($request->all(), $request->input('name'), $request->input('start_date'), $request->input('end_date'), $request->input('status'));
        $validated = $request->validated();
        if ($validated) {
            $event = Event::find($id);
            $event->name = $request->input('name');
            $event->start_date = $request->input('start_date');
            $event->end_date = $request->input('end_date');
            $event->status = $request->input('status');
            $event->save();

            Session(['redirect.events.updated.' . $id => $request->fullUrl()]);

            return Redirect::back()->with('message', 'Update Successful!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
