<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use Illuminate\Http\Request;
use Gate;
use App\Models\animals;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    //
    public function index()
    {
        $adoptionRequests = AdoptionRequest::all();
        return view('adoptions.index', compact('adoptionRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ((Gate::denies('displayall')) == false) {
            return view('animals.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $adoptionRequests = AdoptionRequest::all();
        return view('adoptions.my', compact('adoptionRequests'));

    }

    public function display()
    {
        $animalsQuery = animals::all();
        if (Gate::denies('displayall')) {
            $animalsQuery = $animalsQuery->where('userid', auth()->user()->id);
        }
        return view('/display', array('animals' => $animalsQuery));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {

    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    */
    public function edit(Request $request, $id)
    {

    }

     /**
     * Store the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */

    public function store(Request $request)
    {
        // create an Animal object and set its values from the input
        $existingAdoption = AdoptionRequest::where('id', $request->input('animalid'))->get()->first();
        $adoptionRequest = new AdoptionRequest();
        $adoptionRequest->userid = Auth::id();
        $adoptionRequest->animalid = $request->input('animal');


        // save the animal object
        $adoptionRequest->save();
        // generate a redirect HTTP response with a success message
        return back()->with('Success', 'Your adoption request has been submitted');
    }

    public function myRequests(Request $request, $id){
        $adoptionRequests = AdoptionRequest::all();
        return view('adoptions.my', compact('adoptionRequests'));
    }

    public function owners()
    {
        $adoptionRequests = AdoptionRequest::all();
        return view('adoptions.owner', compact('adoptionRequests'));
    }

    public function denied()
    {
        $adoptionRequests = AdoptionRequest::all();
        return view('adoptions.denied', compact('adoptionRequests'));
    }

    public function pastAdoptions()
    {
        $adoptionRequests = AdoptionRequest::all();
        return view('animals.past', compact('adoptionRequests'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */

    public function approve(Request $request)
    {
        $animal = animals::where('id', $request->input('animalid'))->get()->first();
        $animal->adoptionid = $request->input('userid');
        $animal->save();

        $animalA = animals::where('id', $request->input('animalid'))->get()->first();
        $animalA->Available = 'no';
        $animalA->save();

        $adoption = AdoptionRequest::where('animalid', $request->input('animalid'));
        $otherAdoptions = AdoptionRequest::where('animalid', $request->input('animalid'));
        $adoption = $adoption->where('userid', $request->input('userid'))->get()->first();
        $adoption->status = 'approved';
        foreach($otherAdoptions->get() as $adoptionRequest ){
            if($adoptionRequest ->userid != Auth::id()){
                $adoptionRequest -> status = 'denied';
                $adoptionRequest -> save();
            }
        }
        $adoption->save();
        return back()->with('Success', 'Adoption has been accepted');

    }

     /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function deny(Request $request)
    {
        $findAnimal = AdoptionRequest::where('animalid', $request->input('animalid'));
        $findUser = $findAnimal->where('userid', $request->input('userid'))->get()->first();
        $findUser->status = 'denied';
        $findUser->save();

        // generate a redirect HTTP response with a success message
        return back()->with('Success', 'Adoption has been denied');
    }
}
