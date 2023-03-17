@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Filtrar Usuario
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="container mb-4">
                            <form action="{{ route('user.search') }}" method="POST">
                                @csrf
                            <div class="row">


                                <div class="col-md-3" >
                                    <label for="id" class="col-sm-4 col-form-label">ID:</label>
                                    <input type="number" name="id" class="form-control" id="id" >
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>

                                <div class="col-md-3">
                                    <label for="email" class="col-sm-4 col-form-label">Email:</label>
                                    <input type="text" name="email" class="form-control" id="email" >
                                </div>

                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary" >Buscar por campos</button>
                                </div>


                            </div>

                            </form>
                            </div>


                        </div>

                    {{-- TABLE --}}
                <div class="container-fluid ">

                    <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contraseña</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->password}}</td>
                            </tr>
                            @endforeach
                            </tbody>
{{--                            {{ $users->links() }}--}}
                        </table>
                    {{--END TABLE FIN--}}
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
