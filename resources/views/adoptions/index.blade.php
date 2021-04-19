@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16 ">
                <div class="card">
                    <div class="card-header">Display all Available Animals</div>
                    @if (\Session::has('Success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('Success') }}</p>
                        </div><br />
                    @endif
                    <div class="col-md-8 ">
                        <span>Sort By Type:</span>
                        <td>
                            <a href="{{ url('sort') }}?sort=all">All</a>
                            <a href="{{ url('sort') }}?sort=cat">Cat</a>
                            <a href="{{ url('sort') }}?sort=dog">Dog</a>
                            <a href="{{ url('sort') }}?sort=fish">Fish</a>
                            <a href="{{ url('sort') }}?sort=rabbit">Rabbit</a>
                            <a href="{{ url('sort') }}?sort=other">Other</a>
                        </td>

                        <span>Sort By Name:</span>
                        <td>
                            <a href="{{ url('sortName') }}?sort=asc">A-Z ||</a>
                            <a href="{{ url('sortName') }}?sort=desc">Z-A</a>
                        </td>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">date_of_birth</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">type</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animals as $animal)
                                    <tr>
                                        <td><img style="width:128px; height:128px"
                                                src="{{ asset('storage/images/' . $animal['image1']) }}"></td>
                                        <td>{{ $animal['name'] }}</td>
                                        <td>{{ $animal['date_of_birth'] }}</td>
                                        <td>{{ $animal['description'] }}</td>
                                        @if ($animal['adoptionid'] == null)
                                            <td> Available </td>
                                        @else
                                            <td>Unavailable</td>
                                        @endif

                                        <td>{{ $animal['type'] }}</td>


                                        @if (App\Models\AdoptionRequest::select('animalid')->where('animalid', $animal['id'])->where('userid', strval(\Illuminate\Support\Facades\Auth::id()))->get()->first() == null)

                                            <td>
                                                <form action="{{ url('adoptions') }}" method="post">
                                                    @csrf
                                                    <input name="animal" type="hidden" value="{{ $animal['id'] }}">
                                                    <button class="btn btn-danger" type="submit"> ADOPT</button>
                                                </form>
                                            </td>
                                            <td><a href="{{ route('animals.show', ['animal' => $animal['id']]) }}"
                                                    class="btn btnprimary">More Images</a></td>
                                        @else
                                            <td>Already requested</td>
                                            <td><a href="{{ route('animals.show', ['animal' => $animal['id']]) }}"
                                                    class="btn btnprimary">More Images</a></td>
                                        @endif
                                        <td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
