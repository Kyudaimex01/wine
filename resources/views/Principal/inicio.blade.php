<!DOCTYPE html>
<html lang="en">

<head>

       
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
       <!-- <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/main.css">-->





  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WINESOFT</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <link href="css/overwrite.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/set1.css" />
  <link href="css/style.css" rel="stylesheet">




  <style type="text/css">
    .outspace{
       margin-bottom: 5px;
       padding-bottom: 5px;
    }
    .boton{
   
    padding: 10px;
    margin-top:30px;
    font-weight: 900;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
   
    border: 2px solid #0016b0;
  }
  .boton:hover{
    color: #1883ba;
    background-color: #ffffff;
  }
  </style>
</head>



<body>   
  <nav class="navbar navbar-default navbar-fixed-top " role="navigation">       
               
   <div class="container">
    
            
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="logo pull-left">
                   <img  src="/images/svg/img/pinguino2.jpg" class="img svg-responsive" style= "width: 50px; height: 50px;"></a>
                <a class="navbar-brand"><span>Niño Mensajero</span></a>
  
             
      </div>

      <div class="navbar-collapse collapse" id="menu" >
       
          <ul class="nav nav-tabs mr-auto" role="tablist">
           
            <li role="presentation"><a href="{{ url('/') }}">Inicio</a></li>
             <li role="presentation"><a href="{{ url('/publications') }}">Boletines</a></li>
                          <li role="presentation"><a href="{{ url('/message') }}">Escriba su Carta</a></li>
               
             @if (Auth::guest())          
              <li role="presentation"><a href="{{ url('/login') }}" ><i class="fa fa-user fa-1x"></i> Log in</a></li>
              <li role="presentation"><a href="{{ url('/register') }}">Registrarse</a></li>
              @else
                <li role="presentation"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                <li role="presentation">
                      <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Cerrar Sesion
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    
                </li>
              @endif
          </ul>

       
      </div>

      
  </div>      
</nav>

      <div class="container">
            
                    <div class="row">
                        <div class="col-lg-8 top-post-left">
                          <div class="slider">
                            <div class="img-responsive ">
                              
                                <img src="images/svg/img/sms2.jpg" style="width: 750px; height: 500px;" alt="">
                            </div>
                                  <h4>En la actualidad, el concepto de mensaje esta fuertemente ligado a los programas de mensajeria instantanea y los servicio de correo electronico y dado que ambas opciones estan disponible, este tipo de comunicacion tiene lugar multiples veces al dia en la vida de una persona normal.</h4>

                          </div>
                           
                        </div>
                        <div class="col-lg-4 top-post-right">
                          <div class="slider">
                            <div class="single-top-post">
                                <div class="img-responsive">
                                   
                                    <img class="img-fluid" src="images/svg/img/nino5.jpg" alt="">
                                </div>
                               
                                <div class="top-post-details">
                                    <h4></h4>
                                </div>
                                <center>
                                 <a class="boton" href="{{ url('/message') }}" >Escriba una carta</a>
                               </center>
                            </div>
                          </div>
                          <div class="slider">
                            <div class="single-top-post">
                                <div class="img-responsive">
                                    
                                    <img class="img-fluid" src="images/svg/img/005.gif" alt="">
                                </div>
                                
                            </div>
                        
                        </div>
                        
                      </div>
                    
                </div>
              </div>



  <!--<div class="content-fluid">
    <div class="row">

   
<div class="clearfix visible-xs"></div>
      <div class="col-xs-6 .col-sm-4">
        
      <div class="slider">
        <div class="img-responsive">
          <ul>
            @forelse($bulletins as $bulletin)
            <li><a href="{{ route('release', $bulletin->id ) }}"><img style="width: 90%; height: 400px" src="{{ asset('storage/'.$bulletin->path_cover) }}" alt="" /></a></li>
            @empty
            @endforelse
            <li><img style="width: 90%; height: 400px" src="images/svg/img/03.jpg" alt="" /></li>
          </ul>
        </div>
    
    </div>
  </div>

   <div class=".col-xs-6 .col-md-4">
        <div class="slider">
        <div class="img-responsive">
          <ul>
            <li><img style="width: 90%; height: 400px; " src="images/svg/img/03.jpg" alt="" /></li>
          </ul>
          <button type="submit" class="tm-submit-btn">Enviar</button>
        </div>

    
    </div>
    </div>
<div class=".col-xs-6 .col-md-4">
        <div class="slider">
        <div class="img-responsive">
          <ul>
            <li><img style="width: 90%; height: 400px; " src="images/svg/img/03.jpg" alt="" /></li>
          </ul>
          <button type="submit" class="tm-submit-btn">Enviar</button>
        </div>

    
    </div>
    </div>
 </div>
</div>-->




            
              
 <!-- <div class="container">
    <div class="row">
         <div class="box">
      <div class="slider">
        <div class="img-responsive">
          <ul class="bxslider">
            <li><img src="images/svg/img/03.jpg" alt="" /></li>
           
            <li><img src="images/svg/img/imagen.jpg" alt="" /></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
 </div> -->

<center>
  <div class="row">
    <div class="content">
    <div class="grid">
      <h4 class="text-center"><b>Ultimos Boletines<b></h4>
    @forelse($bulletins as $bulletin)
      <figure class="effect-zoe" style="height: 250px; width: 100%">
      <b style="color: white">Fecha: {{ $bulletin->created_at }}</b>
      <img src="{{ asset('storage/'.$bulletin->path_cover) }}" alt="Card image" style="height: 400px; width: 500px"/>
        <figcaption>
          <h2><span>{{ $bulletin->bulletin_title }}</span></h2>

          <p class="icon-links">
            <a href="{{ route('bulletins.view', $bulletin->id ) }}"><span class="icon-eye">Ver</span></a>
            <a href="{{ route('bulletins.download', $bulletin->id ) }}"><span class="icon-paper-clip">Descargar</span></a>

          </p>
        </figcaption>
      </figure>
    @empty
      <h2 style="color: black">No hay boletines publicados</h2>  
    @endforelse
    </div>
  </div>
</div>
  <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
          <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="text-center">
            <h4><b>Mision</b></h4>
            <p>Satisfacer totalmente las necesidades de mensajería y gestiones de nuestros Clientes, a través de la excelencia en el servicio y el sentido de compromiso con nuestra familia y nuestra Bolivia.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-md-offset-2">
          <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.0s">
            <div class="text-center">
            <h4><b>Vision</b></h4>
            <p>Desarrollar Servicios diferenciales, exclusivos y personalizados para llevar a cabo una labor 100% eficiente en el menor lapso de tiempo y costo. Formar equipos de trabajo que conozcan y se comprometan con nuestros clientes para llevar a cabo el propósito de nuestra empresa.</p>
            </div>
          </div>
        </div>
    </div>

  </div>
 </center> 

  <footer>
  <!--  <div class="inner-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 f-contact col-md-offset-2">
            <h3 class="widgetheading">Contactos</h3>
            <a href="#">
              <p><i class="fa fa-envelope"></i> winesoft@gmail.com</p>
            </a>
            <p><i class="fa fa-phone"></i> 76548256</p>
            <p><i class="fa fa-home"></i> Empresa de desarrollo de mensajeria, Bolivia <br> AV. Oquendo</p>
          </div>
        </div>
      </div>
    </div>-->


    <div class="last-div">
      <div class="container">
        <div class="row">
          <div class="copyright">
            &copy; @WINESOFT
            &copy; @WINESOFT

            <div class="credits">
         &copy; winesoft@gmail.co

            </div>
            <div class="credits">
         &copy; 76548256

            </div>
            <div class="credits">
         &copy; Empresa de desarrollo de mensajeria, Bolivia AV. Oquendo

            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <ul class="social-network">
            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
            <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
            <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
            <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
          </ul>
        </div>
      </div>

      <a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>


    </div>
</footer>
  </footer>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script type="text/javascript" src="js/fliplightbox.min.js"></script>
  <script src="js/functions.js"></script>
  <script type="text/javascript">
    $('.portfolio').flipLightBox()
  </script>

</body>

</html>
