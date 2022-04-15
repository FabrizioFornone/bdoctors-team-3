@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    Test
                    
                    @if ($boolean)
                        <a class="ms-auto" href="{{ route('admin.infos.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            Create
                        </a>
                        @else
                        @foreach ( $infos as $info)
                        <a class="ms-auto" href="{{ route('admin.infos.edit', $info->id) }}">
                            <i class="fa-solid fa-plus"></i>
                            Edit
                        </a>
                        @endforeach
                    @endif
                </div>

                <div class="card-body">
                    ciao
                    @foreach ( $infos as $info )
                    <div>
                       Sto prendendo dalla tabella "infos": {{$info->phone}}
                    </div>

                    @endforeach

                    @foreach ( $users as $user )
                    <div>
                      sto prendendo dalla tabella "users": {{$user->name}}
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection