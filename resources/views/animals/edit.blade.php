@extends('layouts.app')
@section('content')
    @if (!Gate::denies('displayall'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">Edit and update the animal</div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif

                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div><br />
                        @endif

                        <div class="card-body">
                            <form class="form-horizontal" method="POST"
                                action="{{ route('animals.update', ['animal' => $animal['id']]) }}"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="col-md-8">
                                    <label>Name:</label>
                                    <input type="text" name="name" value="{{ $animal->name }}" />
                                </div>

                                <div class="col-md-8">
                                    <label>Date Of Birth:</label>
                                    <input type="date" name="date_of_birth" value="{{ $animal->date_of_birth }}" />
                                </div>

                                <div class="col-md-8">
                                    <label>Description</label>
                                    <input type="text" name="description" value="{{ $animal->description }}" />
                                </div>

                                <div class="col-md-8">
                                    <label>AdoptionID</label>
                                    <input type="text" name="adoptionid" value="{{ $animal->adoptionid }}" />
                                </div>

                                <label>Available</label>
                                <select name="Available">
                                    <option name="Available" value="yes">Yes</option>
                                    <option name="Available" value="no">No</option>
                                </select>

                                <div class="col-md-8">
                                    <label>Type</label>
                                    <select name="type">
                                        <option name="type" value="cat">Cat</option>
                                        <option name="type" value="dog">Dog</option>
                                        <option name="type" value="fish">Fish</option>
                                        <option name="type" value="rabbit">Rabbit</option>
                                        <option name="type" value="bird">Bird</option>
                                        <option name="type" value="other">Other</option>
                                    </select>

                                    <br>
                                </div>

                                <div class="col-md-8">
                                    <label>Image1</label>
                                    <input type="file" name="image1" placeholder="Image file" />
                                </div>
                                <div class="col-md-8">
                                    <label>Image2</label>
                                    <input type="file" name="image2" placeholder="Image file" />
                                </div>
                                <div class="col-md-8">
                                    <label>Image3</label>
                                    <input type="file" name="image3" placeholder="Image file" />
                                </div>
                                <div class="col-md-8">
                                    <label>Image4</label>
                                    <input type="file" name="image4" placeholder="Image file" />
                                </div>

                                <div class="col-md-6 col-md-offset-4">
                                    <input type="submit" class="btn btn-primary" />
                                    <input type="reset" class="btn btn-primary" />
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1 style="text-align: center;">Access Denied </h1>
    @endif
@endsection
