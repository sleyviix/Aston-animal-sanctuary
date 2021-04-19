@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16 ">
                <div class="card">
                    <div class="card-header">Display all Animals</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>date_of_birth</th>
                                    <th>Description</th>
                                    <th>availability</th>
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
                                        <td>{{ $animal['adoptionid'] }}</td>
                                        <td><a href="{{ route('animals.show', ['animal' => $animal['id']]) }}"
                                                class="btn btnprimary">Details</a></td>
                                        <td><a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}"
                                                class="btn btnwarning">Edit</a></td>
                                        <td>
                                            <form
                                                action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'], ['animal' => $animal['id']]) }}"
                                                method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit"> Delete</button>
                                            </form>
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
