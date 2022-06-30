@extends('layout.form')
@section('titulopag','Iniciar sesión')

@section('content')

  <main class="main-content main-content-bg mt-0">
    <div class="page-header min-vh-100"  style="background-image: url('https://www.aquitoymensajeria.com/wp-content/uploads/2019/08/bannerweb-01-2.jpg');" >
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-7">
            <div class="card border-0 mb-0">
              <div class="card-header bg-transparent">
                <h5 class="text-dark text-center mt-2 mb-3">Iniciar sesión</h5>

              </div>
              <div class="card-body px-lg-5 pt-0">

                <div class="text-center text-muted mb-4">
                  <small>Dígite número de documento y contraseña:</small>
                </div>
                <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                  <div class="mb-3">
                    <input id="cod_cuenta" type="number" class="form-control" placeholder="Documento" aria-label="cod_cuenta" value="{{old('cod_cuenta')}}">
                  </div>
                  <div class="mb-3">
                    <input id="contrasena" type="password" class="form-control" placeholder="Contraseña" aria-label="contrasena">
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Recuérdame</label>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-secondary w-100 my-4 mb-2">Ingresar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @endsection

