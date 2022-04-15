@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Personal Informations</h4>
                </div>
                @foreach ( $infos as $info)

                <div class="card-body">
                    <div class="row my-2">
                        {{-- Profile IMG --}}
                        <div class="col-6">
                            <img class="w-50" src="{{asset('storage/' . $info->photo) }}" alt="">
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
                               Performances: {{$info->performances}}
                            </h5>
                            {{-- Boolean button --}}
                            @if ($boolean)
                            <button type="button" class="btn btn-primary">
                                <a class="ms-auto text-white text-decoration-none"
                                    href="{{ route('admin.infos.create') }}">
                                    <i class="fa-solid fa-plus"></i>
                                    Create
                                </a>
                            </button>

                            @else
                            <button type="button" class="btn btn-primary">
                                <a class="ms-auto text-white text-decoration-none"
                                    href="{{ route('admin.infos.edit', $info->id) }}">
                                    <i class="fa-solid fa-plus"></i>
                                    Edit
                                </a>
                            </button>
                            @endif

                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection