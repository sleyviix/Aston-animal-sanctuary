<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\animals;
use App\Models\AdoptionRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $animals = animals::all();
        $animals = $animals->where('adoptionid', null);


        $adoptionRequests = AdoptionRequest::all();

        if ((Gate::denies('displayall'))) {

            $animals = animals::all();
            $animals = $animals->where('Available', 'yes');
            return view('adoptions/index', compact('animals'));

        }
        return view('animals/index', array('adoptionRequests' => $adoptionRequests));
    }
}
