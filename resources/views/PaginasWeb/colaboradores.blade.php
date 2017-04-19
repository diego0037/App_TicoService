@extends('layouts.app')

@section('title', 'Colaboradores')
<link rel="stylesheet" href="{!! asset('css/paginaPrin.css') !!}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')

<div class="site-wrapper">
  <div class="site-wrapper-inner">

    {{ Form::open(array('url' => '', 'method' => 'GET'), array('role' => 'form')) }}
    <div class="row">
      <div class="form-group  col-md-offset-3 col-md-4 ">

        {{ Form::text('search', null, array('placeholder' => 'Introduce tu Busqueda', 'class' => 'form-control')) }}
      </div>

      <div class="form-group  col-md-offset-1 col-md-1 col-md-offset-3">
        {{ Form::button('Busqueda', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
      </div>
    </div>
    {{ Form::close() }}


<div class="col-md-2"></div>
<div class="col-md-8">
  <table class="table table-striped">
   <thead>
     <tr>
       <th>COLABORADOR</th>
       <th>SERVICIO</th>
       <!-- <th>DISPONIBILIDAD</th> -->
       <!-- <th>DESCRIPCIÓN</th> -->
       <th>ACCIONES</th>
     </tr>
   </thead>
   <tbody>
     <?php
         foreach ($collaborators as $key) {
           echo "<tr><td>".$key->user."</td><td>".$key->service."</td>
           <td><a href='collaborator/$key->id_user' role='button' class='btn btn-info'>Información</a></td>
           </tr>";
         }
      ?>
   </tbody>
 </table>

</div>
</div>
</div>
