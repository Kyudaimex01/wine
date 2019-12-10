<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WINESOFT</title>

  <!-- Bootstrap -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">                                  
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/hero-slider-style.css">                              
    <!-- Hero slider style (https://codyhouse.co/gem/hero-slider/) -->
    <link rel="stylesheet" href="css/magnific-popup.css">                                 
    <!-- Magnific popup style (http://dimsemenov.com/plugins/magnific-popup/) -->
    <link rel="stylesheet" href="css/tooplate-style.css">     


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
<li>
    <div class="cd-full-width">
                        <div class="container js-tm-page-content " data-page-no="4">                            
                            <div class="tm-contact-page">
                                <div class="row tm-margin-b">
                                    <div class="col-xs-12">
                                        <div class="tm-bg-white tm-textbox-padding">
                                            <h2 class="tm-text-title tm-margin-b-0">Enviar Mensaje</h2>
                                        </div>
                                    </div>
                                    <center>
                                    <div class="img-responsive ">
                              
                                <img src="images/svg/img/003.gif" style="width: 80%; height: 80%;" alt="">
                            </div>
                        </center>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="tm-flex tm-contact-container tm-bg-dark-blue">     
                                            <div class="text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact">
                                                <p class="tm-text" style="color: #FDFEFE;">Para enviar su carta a diferentes areas de especialista debe registrarse primero GRACIAS </p>                                 
                                            </div>                            

                                            <div class="text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact">
                                                <!-- contact form -->
                                                <form action="{{ route('admin.letters.store') }}" method="post" class="tm-contact-form"enctype="multipart/form-data">
                                                  {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="text" id="contact_name" name="letter_greeting" class="form-control" placeholder="Saludo"  required/>
                                                    </div>                                     
                                                    <div class="form-group">
                                                        <textarea id="contact_message" name="letter_content" class="form-control" rows="5" placeholder="Escribir su carta" required></textarea>
                                                    </div>
                                                    @if (Auth::guest())
                                                    <a href="/login"  class="tm-submit-btn">Iniciar Sesion</a>
                                                    @else          
                                                    <button type="submit" class="tm-submit-btn">Enviar</button>
                                                    @endif                                                
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div> <!-- .cd-full-width -->
                </li>

<footer>
   <!-- <div class="inner-footer">
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