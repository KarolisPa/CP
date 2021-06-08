<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
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
//        return Event::all()->with('organizers');
//          $events = EventResource::collection(Event::orderBy('id', 'desc')->get());
        //$events = Event::orderBy('id', 'desc')->with('organizers')->get();

          //return $events;

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
    public function edit(Request $request)
    {
        $id = $request->route('id');
        $event = Event::find($id);


        if($event) {
            $eventInput = $request->validate([
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'place' => 'required',
                'organizers' => 'nullable'
            ]);


            $event->update([
                'name' => $eventInput['name'],
                'start_date' => $eventInput['start_date'],
                'end_date' => $eventInput['end_date'],
                'place' => $eventInput['place']

            ]);
//

            if( $request->input("organizer_id") != null ) {
                $organizerID = $request->input('organizer_id');

                $organizer = Organizer::find($organizerID);
                if ($organizer->event_id != null) {
                    Organizer::create([
                        "name" => $organizer->name,
                        "event_id" => $id
                    ]);
                    $organizer->event_id = $id;
                } else {
                    $organizer->event_id = $id;
                    $organizer->save();

                }
            }

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
