@extends('layouts.app')

@section('title', 'Colaborador')

@section('content')

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TicoService</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ url('') }}"><span class="glyphicon glyphicon-user"></span> Usuario logueado</a></li>
    </ul>
  </div>
</nav>

<img src="{{URL::asset('/image/stallman.jpg')}}" alt="profile Pic" height="200" width="200">

<div class="col-md-2"></div>
<div class="col-md-8">
  <table class="table table-striped">

   <tbody>
     <?php
           echo "<tr><td>SERVICIO</td><td>$collaborator->service</td></tr>
                  <tr><td>DISPONIBILIDAD</td><td>$collaborator->availability</td></tr>
                  <tr><td>DESCRIPCIÓN</td><td>$collaborator->description</td></tr></br></br>";
      ?>
   </tbody>
 </table>

</div>
