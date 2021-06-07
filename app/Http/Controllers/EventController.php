<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventResource::collection(Event::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $event = $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'place' => 'required'
        ]);
        Event::create($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Event::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $event = Event::find($id);
        if($event) {
            $eventInput = $request->validate([
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'place' => 'required'
            ]);


            $event->update([
                'name' => $eventInput['name'],
                'start_date' => $eventInput['start_date'],
                'end_date' => $eventInput['end_date'],
                'place' => $eventInput['place']
            ]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renginys = Event::find($id);
        if($renginys) {
            $renginys->delete();
        }
    }
}
