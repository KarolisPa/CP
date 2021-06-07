<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizerResource;
use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrganizerResource::collection(Organizer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organizer = $request->validate([
            'name' => 'required'
        ]);
        Organizer::create($organizer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Organizer::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $organizer = Organizer::find($id);
        if($organizer) {
            $organizerInput = $request->validate([
                'name' => 'required'
            ]);

            $organizer->update([
                'name' => $organizerInput['name']
            ]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organizer $organizer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organizer = Organizer::find($id);
        if($organizer) {
            $organizer->delete();
        }
    }
}
