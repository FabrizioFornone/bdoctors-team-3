@extends('layouts.app')

@section('content')

<div class="container ms_infos">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">My Profile</h4>
                        {{-- Boolean button --}}
                        <div>
                            @if ($boolean)
                            <a href="{{ route('admin.infos.create') }}"
                                class="btn btn-primary ms-auto text-white">Create</a>
                            @else
                            @foreach ( $infos as $info)
                            <a href="{{ route('admin.infos.edit', $info->id) }}"
                                class="btn btn-primary ms-auto text-white">Edit</a>
                            @endforeach

                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row my-2">
                        @foreach ( $infos as $info)

                        {{-- Profile IMG --}}
                        <div class="col-6">
                            @if($info->photo)
                            <div class="photo-box">
                                <img src={{asset('storage/' . $info->photo) }} alt="">
                            </div>
                            @else
                            <div class="photo-box">
                                <img src="https://keytokids.com.au/wp-content/uploads/2017/09/placeholder-face-big.png"
                                    alt="">
                            </div>
                            @endif
                        </div>

                        @foreach ( $users as $user )

                        <div class="col-6">
                            {{-- User Name --}}
                            <h4 class="py-2">
                                <i class="fa-solid fa-user-doctor icon-size"></i>
                                {{$user->name}} {{$user->surname}}
                            </h4>

                            @endforeach

                            <h5 class="py-2">
                                <i class="fa-solid fa-location-dot icon-size"></i>
                                {{$info->address}}
                            </h5>
                            <h5 class="py-2">
                                <i class="fa-solid fa-city icon-size"></i>
                                {{$info->city}}
                            </h5>
                            <h5 class="py-2">
                                <i class="fa-solid fa-phone icon-size"></i>
                                {{$info->phone}}
                            </h5>
                            <h5 class="py-2">
                                <i class="fa-solid fa-stethoscope icon-size"></i>
                                {{$info->performances}}
                            </h5>

                            @if ($info->specializations->count()!=0)
                            <h5> <i class="fa-solid fa-briefcase-medical icon-size"></i>
                                Specializations:
                                <ul>
                                    @foreach ($info->specializations as $specialization)
                                    <li class="mb-0 py-1">- {{ $specialization->specialization_name }}</li>
                                    @endforeach
                                </ul>
                            </h5>
                            @endif

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection