<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
    @if (!Gate::denies('displayall'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 ">
                    <div class="card">
                        <div class="card-header">Add a new Animal to the list</div>
                        <!-- display the errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <!-- display the success status -->
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div><br />
                        @endif
                        <!-- define the form -->
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ url('animals') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-8">
                                    <label>Name:</label>
                                    <input type="text" name="name" placeholder="Enter Name" />
                                </div>

                                <div class="col-md-8">
                                    <label>Date Of Birth:</label>
                                    <input type="date" name="date_of_birth" />
                                </div>

                                <div class="col-md-8">
                                    <label>Description</label>
                                    <textarea rows="4" cols="50" name="description"
                                        placeholder="Add an Animal description"></textarea>
                                </div>

                                <div class="col-md-8">
                                    <label>Available</label>
                                    <select name="Available">
                                        <option name="Available" value="yes">Yes</option>
                                        <option name="Available" value="no">No</option>
                                    </select>

                                    <br>
                                </div>

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
                                    <br>
                                    <input type="submit" class="btn btn-primary" />
                                    <input type="reset" class="btn btn-primary" />
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
