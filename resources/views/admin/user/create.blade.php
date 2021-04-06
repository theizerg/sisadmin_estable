@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')

  <section class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          <a href="{{ url('user') }}" class="btn btn-primary"><i class="fa fa-sort-alpha-desc"></i> Listado</a>
         
          
          <a href="{{ url('user/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
         
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12 card">
        <div class="card-header  outline-primary blue-gradient-dark text-white">
              <h3 class="card-title text-white">Crear usuarios</h3>
          </div>
          <form role="form" id="main-form">
            <input type="hidden" id="_url" value="{{ url('user') }}">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="card-body">
              <div class="form-group pading">
                <label for="name">Nombres</label>
                <input class="form-control" id="name" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombres">
                <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
              <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input class="form-control" id="last_name"  @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus   placeholder="Apellidos">
                <span class="missing_alert text-danger" id="last_name_alert"></span>
              </div>
              <div class="form-group">
                <label for="last_name">Usuario</label>
                <input class="form-control" id="username"  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus placeholder="Usuario">
                <span class="missing_alert text-danger" id="last_name_alert"></span>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo electrónico</label>
                <input type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="role">Tipo de usuario</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="role" value="Usuario" checked> Usuario&nbsp;&nbsp;
                    <input type="radio" name="role" value="Administrador"> Administrador
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                <span class="missing_alert text-danger" id="password_alert"></span>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Contraseña">
                <span class="missing_alert text-danger" id="password_confirmation_alert"></span>
              </div>
              <div class="form-group">
                <label for="status">Acceso al sistema</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status" value="1" checked> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0"> Deshabilitado
                  </label>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary ajax" id="submit">
                <i id="ajax-icon" class="fa fa-save"></i> Ingresar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection

@push('scripts')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  
    <script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#main-form').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      name: {
        required: true,
        minlength: 5
      },
      last_name: {
        required: true,
        minlength: 5
      },
       username: {
        required: true,
        minlength: 5
      },
    },
    messages: {
      email: {
        required: "Ingresa el correo",
        email: "Ingresa un correo válido"
      },
      password: {
        required: "Por favor ingrese la contraseña",
        minlength: "Debe contener al menos (6) caracteres"
      },
       name: {
        required: "Por favor ingrese el nombre",
        minlength: "Debe contener al menos (5) caracteres"
      },
      last_name: {
        required: "Por favor ingrese el apellido",
        minlength: "Debe contener al menos (5) caracteres"
      },
       username: {
        required: "Por favor ingrese el usuario",
        minlength: "Debe contener al menos (5) caracteres"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
  <script src="{{ asset('js/admin/user/create.js') }}"></script>
@endpush
