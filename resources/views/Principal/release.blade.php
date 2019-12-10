<!DOCTYPE html>
<html lang="en">

<head>
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
  </style>
</head>

<body>
    
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">       
               
   <div class="container">

            
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><span>NiÑo Mensajero</span></a>
  
             
      </div>

      <div class="navbar-collapse collapse" id="menu" >
       
          <ul class="nav nav-tabs mr-auto" role="tablist">
           
            <li role="presentation"><a href="{{ url('/') }}">Inicio</a></li>
             <li role="presentation"><a href="{{ url('/publications') }}">Boletines</a></li>
                                       <li role="presentation"><a href="{{ url('/message') }}">contacto</a></li>

             @if (Auth::guest())          
              <li role="presentation"><a href="{{ url('/login') }}">Iniciar</a></li>
              <li role="presentation"><a href="{{ url('/register') }}">Registrarse</a></li>
              @else
                <li role="presentation"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                <li role="presentation">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
              @endif
          </ul>

       
      </div>
<!--<div class="nav-wrapper">
                               
         <form class="form-inline">
                     <form class=" form-inline ml-auto" role="search"  method="GET" action="
                {{route('admin.articles.index')}}">
               
                    <input class="form-control  mr-sm-2" type="text" name="nombre" placeholder="Buscar articulos" aria-label="Search">
               
                    <button class="btn btn-success my-2 my-sm-0 " type="submit">Buscar</button>
                     </form>    
          </form>
      </div>-->
      
  </div>      
</nav>
<center>
  <div class="container" style="margin-top: 0;padding-top: 0">
    <div class="row">
      <div class="card-body">
        <div class="row">
                                
          <div class="card-body">
            <h5 class="card-title text-center">
              <a class="btn-link text-danger">
                <b>{{ $bulletin->bulletin_title }}</b>
              </a>
            </h5>
            <div class="card col-lg-4">
              <img class="card-img-top thum" src="{{ asset('storage/'.$bulletin->path_cover) }}" alt="Portada"></img>
                <p style="margin-bottom: 0" class="text-success">Autor: </p><p>{{ $name }}</p>
            </div>
            <br>
            <div>
              <div class="embed-container native-embed-container">
                <embed src="{{ route('admin.bulletins.view', $bulletin->id ) }}" style="width: 100%; height: 650px" frameborder="1" />
              </div>
            </div>
          </div>
                                        
        </div>
      </div>
  </div>
 </div>
</center>
  <footer>
    <div class="inner-footer">
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
    </div>


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
