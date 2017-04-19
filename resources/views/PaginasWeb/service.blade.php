@extends('layouts.app')

@section('title', 'Servicio')
<link rel="stylesheet" href="{!! asset('css/paginaPrin.css') !!}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')
<div class="container">


<div class="col-md-2"></div>
<div class="col-md-8">
  <table class="table table-striped">

   <tbody>
     <?php
           echo "<tr><td>SERVICIO</td><td>$service->name</td></tr>
                  <tr><td>DESCRIPCIÓN</td><td>$service->description</td>
                  <td><a href='collaboratorService/$service->id' role='button'
                                    class='btn btn-success'>Agregar</a></td></tr>";
      ?>
   </tbody>
 </table>

</div>

</div>
@endsection
