@extends('layouts.app')
@section('content')
    @if (!Gate::denies('displayall'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">Display all accepted Adoptions</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Animal Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adoptionRequests as $adoptionRequest)
                                        @if ($adoptionRequest['status'] === 'approved')
                                            <tr>
                                                <td>{{ App\Models\User::select('name')->where('id', $adoptionRequest['userid'])->first()['name'] }}
                                                </td>
                                                <td>{{ App\Models\animals::select('name')->where('id', $adoptionRequest['animalid'])->first()['name'] }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1 style="text-align: center;">Access Denied </h1>
    @endif
@endsection
