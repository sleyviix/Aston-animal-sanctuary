@extends('layouts.app')
@section('content')
    @if (!Gate::denies('displayall'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-16 ">
                    <div class="card">
                        <div class="card-header">All Homeless Animals</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th scope="col">@sortablelink('Name')</th>
                                        <th>date_of_birth</th>
                                        <th>Description</th>
                                        <th>Adoption Status</th>
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
                                                <td>Not Adopted </td>
                                            @else
                                                <td>Adopted</td>
                                            @endif
                                            {{-- <td>{{ $animal['adoptionid'] }}</td> --}}
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
    @else
        <h1 class="text-center">Access Denied</h1>
    @endif
@endsection
