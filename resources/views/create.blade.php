@extends('base')

@section('content')
    <div class="background-login bg-white p-5">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="fw-light text-center">Nuevo registro</h1>
                    <form action="{{route('people.store')}}" class="mt-5" method="post">
                    @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="DNI" name="dni"/>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre" name="name"/>
                        </div>
                        <div class="form-group mb-3">
                            <input type="date" class="form-control" placeholder="Fecha de Nacimiento" name="birthdate"/>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Dirección" name="address"/>
                        </div>
                        <div class="form-group mb-5">
                            <input type="text" class="form-control" placeholder="Teléfono" name="phone"/>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <a class="form-control btn btn-danger" href="{{route('people.index')}}">Cancelar</a>
                            </div>
                            <div class="col-2 offset-7">
                                <button class="form-control btn btn-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection