@extends('layouts.layout')

@section('title', 'Saerch blade')

@section('content')


    <!-- Search Section -->
<div class="container">
        <div class="search-section text-center">
            <h2>Find a Blood Donor</h2>
            <p class="text-muted">Search by Blood Group or Location</p>
            <form action="{{ route('donar-search') }}" method="GET" class="justify-content-center m-3">
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <select class="form-select" name="blood_group">
                            <option value="">Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="kshetra" placeholder="Enter kshetra name">
                    </div>

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="prant" placeholder="Enter prant name">
                    </div>
                </div>
                <div class="row justify-content-center">

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="maha-nagar"
                            placeholder="Enter maha-nagar name">
                    </div>

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="bhag" placeholder="Enter bhag name">
                    </div>

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="shakha" placeholder="Enter shakha name">
                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="city" placeholder="Enter city name">
                    </div>

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="state" placeholder="Enter state name">
                    </div>

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="country" placeholder="Enter country name">
                    </div>

                </div>

                <div class="row justify-content-end">
                    <div class="col-md-2 mb-3">
                        <button type="submit" class="btn btn-custom w-100">Search</button>
                    </div>
                    <div class="col-md-2 mb-3">
                        <a href="{{ route('blood-search') }}" class="btn btn-custom w-100">reset</a>
                    </div>
                </div>

            </form>
        </div>
</div>


@if (Auth::check())
    {{-- <strong>{{ Auth::user()->name }} </strong> --}}
      {{-- LogedIn  All User List --}}
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    @if ($usersDonar->isEmpty())
                        <p class="text-center text-danger fw-bold">Sorry not available blood donar in this area right
                            now !!</p>
                    @else
                        <table class="table table-bordered table-striped w-100">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Gender</th>
                                    <th>age</th>
                                    <th>Blood Group</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Kshetra</th>
                                    <th>Prant</th>
                                    <th>Vibhag</th>
                                    <th>Maha-Nagar</th>
                                    <th>Bhag</th>
                                    <th>Nagar</th>
                                    <th>Shakha</th>
                                    <th>User Post Name</th>
                                    <th>Full Address</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($usersDonar as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td>{{ $user->blood_group }}</td>
                                        <!-- Check if address exists before accessing properties -->
                                        <td>{{ optional($user->address)->city ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->state ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->country ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->kshetra ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->prant ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->vibhag ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->maha_nagar ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->bhag ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->nagar ?? ' Not Found' }}</td>
                                        <td>{{ optional($user->address)->shakha ?? ' Not Found' }}</td>
                                        <td>{{ $user->user_post_name }}</td>
                                        <td>{{ optional($user->address)->address ?? ' Not Found' }}</td>




                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    @endif


                </div>

            </div>
        </div>
    </div>
 @else
    {{-- <strong>Guest</strong> --}}

    {{--  All User List --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                @if ($usersDonar->isEmpty())
                    <p class="text-center text-danger fw-bold">Sorry not available blood donar in this area right now !!</p>
                @else
                    <table class="table table-bordered table-striped w-100">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Gender</th>
                                <th>age</th>
                                <th>Blood Group</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                {{-- <th>Kshetra</th> --}}
                                {{-- <th>Prant</th> --}}
                                {{-- <th>Vibhag</th> --}}
                                {{-- <th>Maha-Nagar</th> --}}
                                {{-- <th>Bhag</th> --}}
                                {{-- <th>Nagar</th> --}}
                                {{-- <th>Shakha</th> --}}
                                {{-- <th>User Post Name</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($usersDonar as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>hide data</td>
                                    <td>hide data</td>

                                    {{-- <td><strong class="class_td">available</strong></td> --}}
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->blood_group }}</td>
                                    <!-- Check if address exists before accessing properties -->
                                    <td>{{ optional($user->address)->city ?? '-' }}</td>
                                    <td>{{ optional($user->address)->state ?? '-' }}</td>
                                    <td>{{ optional($user->address)->country ?? '-' }}</td>
                                    {{-- <td>{{ optional($user->address)->kshetra ?? '-' }}</td> --}}
                                    {{-- <td>{{ optional($user->address)->prant ?? '-' }}</td> --}}
                                    {{-- <td>{{ optional($user->address)->vibhag ?? '-' }}</td> --}}
                                    {{-- <td>{{ optional($user->address)->maha_nagar ?? '-' }}</td> --}}
                                    {{-- <td>{{ optional($user->address)->bhag ?? '-' }}</td> --}}
                                    {{-- <td>{{ optional($user->address)->nagar ?? '-' }}</td> --}}
                                    {{-- <td>hide</td> --}}

                                    {{-- <td>{{ optional($user->address)->shakha ?? '-' }}</td> --}}
                                    {{-- <td>hide</td> --}}

                                    {{-- <td>{{ $user->user_post_name }}</td> --}}


                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                @endif

                @if (session('success'))
                {{--  clas name = class_msg --}}
                    <div class="alert alert-success ">  
                        {!! session('success') !!}
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>
@endif


@endsection


