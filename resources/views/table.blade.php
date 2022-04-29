@extends('base')

@section('content')
    <div class="background-login bg-white p-5">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1 class="fw-light">Hola {{$user->username}}, tu rol es "{{$user->usertype}}"</h1>
                </div>
                <div class="col-2 text-end">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <a href="{{route('logout')}}" 
                            style="text-decoration:none; color: #000;"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <strong>Cerrar sesión</strong>
                        </a>
                    </form>
                </div>
                <div class="col-12 mt-5">
                    <form action="{{route('people.index')}}" method="get">
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control" type="text" placeholder="Busqueda" name="search" value="{{$search}}">
                            </div>
                            <div class="col-1">
                                <button class="form-control btn btn-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="col-2 offset-5">
                                <a class="form-control btn btn-success" href="{{route('people.create')}}">Crear registro</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <div class="table-responsive bg-white">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="developers">
                                @if(count($people) <= 0)
                                    <tr>
                                        <td colspan="6">Sin resultados</td>
                                    </tr>
                                @else
                                    @foreach($people as $person)
                                        <tr>
                                            <td>{{$person->dni}}</td>
                                            <td>{{$person->name}}</td>
                                            <td>{{$person->birthdate}}</td>
                                            <td>{{$person->address}}</td>
                                            <td>{{$person->phone}}</td>
                                            <td>
                                                <div class="container">
                                                    @if($user->usertype == 'admin')
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <a class="btn btn-warning" href="{{route('people.edit', $person->dni)}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            <div class="col-4 offset-4">
                                                                <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$person->dni}}" class="btn btn-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @elseif($user->usertype == 'staff')
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                <a class="btn btn-warning" href="{{route('people.edit', $person->dni)}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @include('delete')
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="container">
                            <div class="row">
                                <div class="col-2 offset-5">
                                    {{$people->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection