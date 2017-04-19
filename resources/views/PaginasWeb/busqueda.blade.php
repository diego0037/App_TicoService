@extends('layouts.app')

@section('title', 'Busqueda')
<link rel="stylesheet" href="{!! asset('css/paginaPrin.css') !!}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')

<div class="site-wrapper">
  <div class="site-wrapper-inner">
    {{ Form::open(array('url' => 'api/user/login', 'method' => 'POST'), array('role' => 'form')) }}
    <div class="row">
      <div class="form-group  col-md-offset-3 col-md-4 ">

        {{ Form::text('search', null, array('placeholder' => 'Introduce tu Busqueda', 'class' => 'form-control')) }}
      </div>

      <div class="form-group  col-md-offset-1 col-md-1 col-md-offset-3">
        {{ Form::button('Busqueda', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
      </div>
    </div>
    {{ Form::close() }}

    <div class="cover-container">

      <h1 class="cover-heading">TicoService</h1>
      <p class="lead">Tico Service es una aplicación que te permite buscar
        el servicio que desees, además, Tico Service te permite publicar tus
        servicios para que otras personas puedan contactarte, también ten en
        cuenta que vas a poder comentar a la persona que te brindó
        el servicio para que otras personas puedan obtener cierta referencia</p>
      <div class="inner cover">
      </div>

      <div class="accordian">
          <ul>
          <li>
            <div class="image_title">
              <a href="#">Ing del Software</a>
            </div>
            <a href="#">
              <img src="http://cde.gestion2.e3.pe/ima/0/0/0/8/1/81452.jpg"/>
            </a>
          </li>
          <li>
            <div class="image_title">
              <a href="#">Abogado</a>
            </div>
            <a href="#">
              <img src="http://www.prodisle.com/blog/wp-content/uploads/2016/04/seguros-de-responsabilidad-civil-para-abogados.jpg"/>
            </a>
          </li>
          <li>
            <div class="image_title">
              <a href="#">Telematica</a>
            </div>
            <a href="#">
              <img src="http://beslasalle.salleurl.edu/img/371x246/ingenieria2.jpg"/>
            </a>
          </li>
          <li>
            <div class="image_title">
              <a href="#">Contador</a>
            </div>
            <a href="#">
              <img src="http://www.uaem.mx/admision-y-oferta/nivel-superior/images/banner-contador-publico.png"/>
            </a>
          </li>
          <li>
            <div class="image_title">
              <a href="#">Mecánico</a>
            </div>
            <a href="#">
              <img src="http://leirauto.com/wp-content/uploads/2016/09/taller-mecanico.jpg"/>
            </a>
          </li>
        </ul>
      </div>


      <!-- <div class="mastfoot"> -->
        <!-- <div class="inner"> -->
          <div class="col-md-12">
          <span>Siguenos en</span>
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
        </div>

          <p>© 2017 TicoServiceApp </p>
        <!-- </div> -->
      <!-- </div> -->


    </div>
</div>
</div>
@endsection
