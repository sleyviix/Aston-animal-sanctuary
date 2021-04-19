<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\animals;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $animals = animals::all();

        return view('animals.list', compact('animals'));


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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // form validation
        $animals = $this->validate(request(), [
            'name' => 'required',
            'date_of_birth' => 'required',
            'image1' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image2' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image3' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image4' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            // 'availability' => 'required',
        ]);
        //Handles the uploading of the image
        $image1 = $request->hasFile('image1');
        $image2 = $request->hasFile('image2');
        $image3 = $request->hasFile('image3');
        $image4 = $request->hasFile('image4');

        if ($image1 && $image2 && $image3 && $image4 ) {
            //Gets the filename with the extension
            $fileNameWithExt1 = $request->file('image1')->getClientOriginalName();
            $fileNameWithExt2 = $request->file('image2')->getClientOriginalName();
            $fileNameWithExt3 = $request->file('image3')->getClientOriginalName();
            $fileNameWithExt4 = $request->file('image4')->getClientOriginalName();
            //just gets the filename
            $filename1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
            $filename3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);
            $filename4 = pathinfo($fileNameWithExt4, PATHINFO_FILENAME);
            //Just gets the extension
            $extension1 = $request->file('image1')->getClientOriginalExtension();
            $extension2 = $request->file('image2')->getClientOriginalExtension();
            $extension3 = $request->file('image3')->getClientOriginalExtension();
            $extension4 = $request->file('image4')->getClientOriginalExtension();
            //Gets the filename to store
            $fileNameToStore1 = $filename1 . '_' . time() . '.' . $extension1;
            $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
            $fileNameToStore3 = $filename3 . '_' . time() . '.' . $extension3;
            $fileNameToStore4 = $filename4 . '_' . time() . '.' . $extension4;
            //Uploads the image
            $path1 = $request->file('image1')->storeAs('public/images', $fileNameToStore1);
            $path2 = $request->file('image2')->storeAs('public/images', $fileNameToStore2);
            $path3 = $request->file('image3')->storeAs('public/images', $fileNameToStore3);
            $path4 = $request->file('image4')->storeAs('public/images', $fileNameToStore4);
        } else {
            $fileNameToStore1 = 'noimage.jpg';
            $fileNameToStore2 = 'noimage.jpg';
            $fileNameToStore3 = 'noimage.jpg';
            $fileNameToStore4 = 'noimage.jpg';

        }
        // create a Vehicle object and set its values from the input
        $animal = new animals;
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        $animal->image1 = $fileNameToStore1;
        $animal->image2 = $fileNameToStore2;
        $animal->image3 = $fileNameToStore3;
        $animal->image4 = $fileNameToStore4;
        $animal->adoptionid = $request->input('adoptionid');
        $animal->Available = $request->input('Available');
        $animal->type = $request->input('type');
        $animal->created_at = now();
        $animal->updated_at = now();

        // save the Animal object
        $animal->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Animal has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $animal = animals::find($id);
        return view('animals.show', compact('animal'));

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
    public function edit($id)
    {
        //
        $animal = animals::find($id);
        return view('animals.edit', compact('animal'));
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
        //
        $animal = animals::find($id);
        $animal = animals::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'date_of_birth' => 'required',
            'image1' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image2' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image3' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image4' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        // $animal->image = $fileNameToStore;
        $animal->adoptionid = $request->input('adoptionid');
        $animal->Available = $request->input('Available');
        $animal->type = $request->input('type');
        $animal->updated_at = now();
        //Handles the uploading of the image
               //Handles the uploading of the image
        $image1 = $request->hasFile('image1');
        $image2 = $request->hasFile('image2');
        $image3 = $request->hasFile('image3');
        $image4 = $request->hasFile('image4');

        if ($image1 && $image2 && $image3 && $image4 ) {
        //Gets the filename with the extension
        $fileNameWithExt1 = $request->file('image1')->getClientOriginalName();
        $fileNameWithExt2 = $request->file('image2')->getClientOriginalName();
        $fileNameWithExt3 = $request->file('image3')->getClientOriginalName();
        $fileNameWithExt4 = $request->file('image4')->getClientOriginalName();
        //just gets the filename
        $filename1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);
        $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
        $filename3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);
        $filename4 = pathinfo($fileNameWithExt4, PATHINFO_FILENAME);
        //Just gets the extension
        $extension1 = $request->file('image1')->getClientOriginalExtension();
        $extension2 = $request->file('image2')->getClientOriginalExtension();
        $extension3 = $request->file('image3')->getClientOriginalExtension();
        $extension4 = $request->file('image4')->getClientOriginalExtension();
        //Gets the filename to store
        $fileNameToStore1 = $filename1 . '_' . time() . '.' . $extension1;
        $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
        $fileNameToStore3 = $filename3 . '_' . time() . '.' . $extension3;
        $fileNameToStore4 = $filename4 . '_' . time() . '.' . $extension4;
        //Uploads the image
        $path1 = $request->file('image1')->storeAs('public/images', $fileNameToStore1);
        $path2 = $request->file('image2')->storeAs('public/images', $fileNameToStore2);
        $path3 = $request->file('image3')->storeAs('public/images', $fileNameToStore3);
        $path4 = $request->file('image4')->storeAs('public/images', $fileNameToStore4);
        } else {
        $fileNameToStore1 = 'noimage.jpg';
        $fileNameToStore2 = 'noimage.jpg';
        $fileNameToStore3 = 'noimage.jpg';
        $fileNameToStore4 = 'noimage.jpg';

        }
        $animal->image1 = $fileNameToStore1;
        $animal->image2 = $fileNameToStore2;
        $animal->image3 = $fileNameToStore3;
        $animal->image4 = $fileNameToStore4;
        $animal->save();
        return redirect('animals');
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
        $animal = animals::find($id);
        $animal->delete();
        return redirect('animals');
    }

    public function homeless()
    {

        $animals = animals::all();
        $animals = $animals->where('adoptionid', null);
        return view('animals.homeless', compact('animals'));


    }

    public function sort(Request $request){
        if($request->input('sort') == 'cat'){
            $animals = animals::all()->where('Available', 'yes')->Where('type', 'cat')->all();
            return view('adoptions.index', compact('animals'));
        }

        elseif($request->input('sort') == 'dog'){
            $animals = animals::all()->where('Available', 'yes')->Where('type', 'dog')->all();
            return view('adoptions.index', compact('animals'));
        }

        elseif($request->input('sort') == 'fish'){
            $animals = animals::all()->where('Available', 'yes')->Where('type', 'fish')->all();
            return view('adoptions.index', compact('animals'));
        }

        elseif($request->input('sort') == 'rabbit'){
            $animals = animals::all()->where('Available', 'yes')->Where('type', 'rabbit')->all();
            return view('adoptions.index', compact('animals'));
        }

        elseif($request->input('sort') == 'all'){
            $animals = animals::all()->where('Available', 'yes');
            return view('adoptions.index', compact('animals'));
        }

        elseif($request->input('sort') == 'other'){
            $animals = animals::all()->where('Available', 'yes')->Where('type', 'other')->all();
            return view('adoptions.index', compact('animals'));
        }
    }

    public function sortName(Request $request){
        if($request->input('sort') == 'asc'){
            $animals = animals::all()->where('Available', 'yes')->sortBy('name')->all();
            return view('adoptions.index', compact('animals'));
        }

        elseif($request->input('sort') == 'desc'){
            $animals = animals::all()->where('Available', 'yes')->sortByDesc('name')->all();
            return view('adoptions.index', compact('animals'));
        }
    }


    public function sortAdmin(Request $request){
    if($request->input('sort') == 'cat'){
    $animals = animals::Where('type', 'cat')->get();
    return view('animals.list', compact('animals'));
    }

    elseif($request->input('sort') == 'dog'){
    $animals = animals::Where('type', 'dog')->get();
    return view('animals.list', compact('animals'));
    }

    elseif($request->input('sort') == 'fish'){
    $animals = animals::Where('type', 'fish')->get();
    return view('animals.list', compact('animals'));
    }

    elseif($request->input('sort') == 'rabbit'){
    $animals = animals::Where('type', 'rabbit')->get();
    return view('animals.list', compact('animals'));
    }

    elseif($request->input('sort') == 'all'){
    $animals = animals::all();
    return view('animals.list', compact('animals'));
    }

    elseif($request->input('sort') == 'other'){
    $animals = animals::Where('type', 'other')->get();
    return view('animals.list', compact('animals'));
    }
    }

    public function sortNameAdmin(Request $request){
    if($request->input('sort') == 'asc'){
    $animals = animals::orderBy('name')->get()->all();
    return view('animals.list', compact('animals'));
    }

    elseif($request->input('sort') == 'desc'){
    $animals = animals::orderByDesc('name')->get();
    return view('animals.list', compact('animals'));
    }
    }



}
