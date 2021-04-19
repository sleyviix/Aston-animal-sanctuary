@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">All current Adoption Requests</div>
                    @if (\Session::has('Success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('Success') }}</p>
                        </div><br />
                    @endif
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>UserID</th>
                                    <th>Animal Name</th>
                                    <th>Animal ID</th>
                                    <th colspan="4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adoptionRequests as $adoptionRequest)
                                    @if ($adoptionRequest['status'] === 'pending')
                                        <tr>
                                            <td>{{ App\Models\User::select('name')->where('id', $adoptionRequest['userid'])->first()['name'] }}
                                            </td>
                                            <td>{{ $adoptionRequest['userid'] }}</td>
                                            <td>{{ App\Models\animals::select('name')->where('id', $adoptionRequest['animalid'])->first()['name'] }}
                                            </td>
                                            <td>{{ $adoptionRequest['animalid'] }}</td>
                                            <td>{{ $adoptionRequest['status'] }}</td>
                                            <td>{{ App\Models\animals::select('adoptionid')->where('id', $adoptionRequest['animalid'])->first()['name'] }}
                                            </td>

                                            @if ($adoptionRequest->status === 'pending')

                                                <td>
                                                    <form
                                                        action="{{ action([App\Http\Controllers\AdoptionController::class, 'approve'], ['adoptionRequest' => $adoptionRequest['status'], 0]) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('PUT')
                                                        {{-- <input name="status" type="hidden" value="approved"> --}}
                                                        <input name="userid" type="hidden"
                                                            value="{{ $adoptionRequest['userid'] }}">
                                                        <input name="animalid" type="hidden"
                                                            value="{{ $adoptionRequest['animalid'] }}">
                                                        <button class="btn btn-success" type="submit">Accept</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ action([App\Http\Controllers\AdoptionController::class, 'deny'], ['adoptionRequest' => $adoptionRequest['status'], 0]) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('PUT')
                                                        {{-- <input name="status" type="hidden" value="denied"> --}}
                                                        <input name="userid" type="hidden"
                                                            value="{{ $adoptionRequest['userid'] }}">
                                                        <input name="animalid" type="hidden"
                                                            value="{{ $adoptionRequest['animalid'] }}">
                                                        <button class="btn btn-danger" type="submit">Deny</button>
                                                    </form>
                                                </td>

                                            @endif
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
@endsection
