@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adress" class="col-md-4 col-form-label text-md-right">Dirección</label>

                            <div class="col-md-6">
                                <input id="adress" type="text" class="form-control" name="adress" value="{{ old('adress') }}" required autocomplete="adress">

                                @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>La dirección debe tener hasta 190 letras o numeros.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- SELECT  -->
                        <div class="form-group row">
                            <form action="" method="post">
                                <!-- -------------- Selector de provincias -->
                                <label for="" class="col-md-4 col-form-label text-md-right">Provincia</label>
                                <div class="col-md-6">
                                    <select name="provincia" id="provincias" class="form-control">
                                        <option disabled selected>Selecciona Provincia</option>
                                        @foreach ($provincias as $provincia)
                                        <option value="{{$provincia->nombre}}">{{$provincia->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- ------------------ Selector de Localidades -->
                                <label for="" class="col-md-4 col-form-label text-md-right">Localidad</label>
                                <div class="col-md-6">
                                    <select name="localidad" id="localidades" class="form-control">
                                        
                                    </select>
                                </div>
                            
                            </form>
                        </div>
                        <!-- END SELECT  -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    window.onload = function(){
        
        $("#localidades").hide();
        $("#provincias").change(function(){
            $.ajax({        
                // le pido a la url '/utils/provincia' el liostado de loclaidades
                url: "/utils/" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#localidades').html(data.html+"<option value='Otro'>Otro</option>");    
                    $("#localidades").show();            
                }
            });
        });
    }
    </script>
@endsection
