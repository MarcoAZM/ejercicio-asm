@extends('base')

@section('content')
    <div class="background-login bg-info p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 bg-white rounded p-5">
                    <form>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="emailInput">
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="passwordInput">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection