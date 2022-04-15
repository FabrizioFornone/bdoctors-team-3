@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center ">
                    <h4 class="mb-0">Personal Informations</h4>
                    {{-- Boolean button --}}
                    <div>
                        @if ($boolean)
                        <button type="button" class="btn btn-primary">
                            <a class="ms-auto text-white text-decoration-none" href="{{ route('admin.infos.create') }}">
                                Create
                            </a>
                        </button>

                        @else
                        @foreach ( $infos as $info)
                        <button type="button" class="btn btn-primary">
                            <a class="ms-auto text-white text-decoration-none"
                                href="{{ route('admin.infos.edit', $info->id) }}">
                                Edit
                            </a>
                        </button>
                        @endforeach

                        @endif
                    </div>
                </div>

                <div class="card-body">

                    <div class="row my-2">
                        @foreach ( $infos as $info)

                        {{-- Profile IMG --}}
                        <div class="col-6">
                            <img class="w-50" src={{asset('storage/' . $info->photo) }} alt="">
                        </div>

                        @foreach ( $users as $user )

                        <div class="col-6">
                            {{-- User Name --}}
                            <h3 class="py-2">
                                Name: {{$user->name}} {{$user->surname}}
                            </h3>

                            @endforeach

                            <h5 class="py-2">
                                Address: {{$info->address}}
                            </h5>
                            <h5 class="py-2">
                                Phone: {{$info->phone}}
                            </h5>
                            <h5 class="py-2">
                                Performances: {{$info->performances}} €
                            </h5>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection