@extends('layouts.adminfront')


@section('title', 'Login')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-group">
                <div class="card p-4 mt-5 elevation-3"><br> 
                    <div class="card-body">
                        <h1>Iniciar Sesión</h1><p class="text-muted"><br>
                            
                        </p><p class="text-muted">Ingresa tu cuenta</p>
                         <form id="main-form" class="">
                          <input type="hidden" id="_url" value="{{ url('login') }}">
                          <input type="hidden" id="_redirect" value="{{ url('/') }}">
                          <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="fas-user"></i></span>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Usuario" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                 <span class="missing_alert text-danger" id="username_alert"></span>
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="fas-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       >
                                <span class="missing_alert text-danger" id="password_alert"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn blue darken-4 form-control" id="boton">
                                        <i class="fas fa-sign-in-alt text-white" id="ajax-icon"></i> <span class="text-white ml-3">{{ __('Iniciar Sesión') }}</span>
                                    </button>                           
                                </div>   
                            </div>
                        </form>
                    </div>
                </div><br>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/auth/login.js') }}"></script>
@endpush