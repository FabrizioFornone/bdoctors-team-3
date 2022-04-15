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
                    <div class="d-flex my-2">
                        {{-- Profile IMG --}}
                        <div>
                            <img class="w-25" src="{{asset('storage/' . $info->photo) }}" alt="">
                        </div>
                        @foreach ( $users as $user )
                        <div>
                            <h3>
                                {{$user->name}} {{$user->surname}}
                            </h3>
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
                        @endforeach
                    </div>


                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection