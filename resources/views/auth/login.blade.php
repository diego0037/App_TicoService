@extends('layouts.app')

@section('title', 'Login')

@section('content')

{{ Form::open(array('url' => 'login', 'method' => 'POST'), array('role' => 'form')) }}
<div class="row">
<div class="form-group  col-md-offset-4 col-md-4 col-md-offset-4">
  {{ Form::label('email', 'Correo Electrónico') }}
  {{ Form::email('email', null, array('placeholder' => 'ejemplo@ejemplo.com', 'class' => 'form-control')) }}
</div>
</div>

<div class="row">
<div class="form-group col-md-offset-4 col-md-4 col-md-offset-4">
  {{ Form::label('password', 'Contraseña') }}
  {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
</div>
</div>
<div class="row">
<div class="form-group col-md-offset-4 col-md-4 col-md-offset-4">

      @include('flash::message')

{{ Form::button('Iniciar Sesión', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
</div>
</div>
{{ Form::close() }}

@endsection
