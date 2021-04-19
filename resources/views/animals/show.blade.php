@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">This is: {{ $animal->name }} </div>
                    <div class="card-body">
                        <table class="table table-striped" border="1">

                            @if (!Gate::denies('displayall'))

                            <tr>
                                <td> <b>Name: </th>
                                <td> {{ $animal['name'] }}</td>
                            </tr>

                            <tr>
                                <td> <b>DOB: </th>
                                <td> {{ $animal['date_of_birth'] }}</td>
                            </tr>
                            <tr>
                                <th>Status: </th>
                                @if ($animal->adoptionid === null)
                                    <td>Available for adoption</td>
                                @else
                                    <td>Already adopted</td>
                                @endif

                            </tr>
                            <tr>
                                <th>Notes </th>
                                <td style="max-width:150px;">{{ $animal->description }}</td>
                            </tr>

                            @endif

                            <tr>
                                <td colspan='2'><img style="width:100%;height:100%"
                                src="{{ asset('storage/images/' . $animal->image1) }}"></td>
                            </tr>
                            <tr>
                                <td colspan='2'><img style="width:100%;height:100%"
                                src="{{ asset('storage/images/' . $animal->image2) }}"></td>
                            </tr>
                            <tr>
                                <td colspan='2'><img style="width:100%;height:100%"
                                src="{{ asset('storage/images/' . $animal->image3) }}"></td>
                            </tr>
                            <tr>
                                <td colspan='2'><img style="width:100%;height:100%"
                                src="{{ asset('storage/images/' . $animal->image4) }}"></td>
                            </tr>

                        </table>
                        <table>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
