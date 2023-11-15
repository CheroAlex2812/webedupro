<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- Style of the plugin -->
    <link rel="stylesheet" href="{{asset('plugin/components/Font Awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/whatsapp-chat-support.css')}}">
    <title>EduWebPro | Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{route('postLogin')}}" method="POST" class="sign-in-form">
            @csrf
            <h2 class="title">Iniciar Sesión</h2>

            @if ($errors->any())
                <div style="color: red">
                  @foreach ($errors->all() as $error)
                      {{ $error }}</li>
                  @endforeach
                </div>
            @endif

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="usuario" name="usuario" placeholder="Usuario" autocomplete="off" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Contraseña" required/>
            </div>
            <input type="submit" value="Iniciar" class="btn solid" />
            <p class="social-text">Síguenos en las siguientes redes sociales</p>
            <div class="social-media">
              <a href="#" class="social-icon social-icon_f">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon social-icon_w">
                <i class="fab fa-whatsapp"></i>
              </a>
              
            </div>
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Regístrate</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Síguenos en las siguientes redes sociales</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-whatsapp"></i>
              </a>
              
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>¡Bienvenido al sistema de gestión escolar!</h3>
            <p>
              Si eres un padre de familia y deseas obtener acceso para monitorear el progreso académico 
              y la información relevante de tu hijo, te invitamos a registrarte aquí.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Regístrate
            </button>
          </div>
          <img src="{{asset('images/log.svg')}}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Ya tienes una cuenta</h3>
            <p>
              Si ya eres parte de nuestra comunidad escolar, 
              ¡estás listo! Por favor, inicia sesión con tus credenciales existentes.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Iniciar Sesión
            </button>
          </div>
          <img src="{{asset('images/register.svg')}}" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>

    <!-- Button Whatsapp Structure -->
    <div class="whatsapp_chat_support wcs_fixed_right" id="button-w">
        <div class="wcs_button_label">
                Contáctanos
            </div>  
        <div class="wcs_button wcs_button_circle">
            <span class="fa fa-whatsapp"></span>
        </div>  
    
        <div class="wcs_popup">
            <div class="wcs_popup_close">
                <span class="fa fa-close"></span>
            </div>
            <div class="wcs_popup_header">
                <span class="fa fa-whatsapp"></span>
                <strong>Servicio al cliente</strong>
                
                <div class="wcs_popup_header_description">¿Necesidad de ayuda? Chatea con nosotros en Whatsapp</div>

            </div>  
            <div class="wcs_popup_input" 
                data-number="+51929969635"
                data-availability='{ "monday":"07:00-22:30", "tuesday":"07:00-22:30", "wednesday":"07:7030-22:30", "thursday":"07:00-22:30", "friday":"07:00-22:30", "saturday":"09:00-18:30", "sunday":"09:00-22:30" }'>
                <input type="text" placeholder="Escribir pregunta!" />
                <i class="fa fa-play"></i>
            </div>
            <div class="wcs_popup_avatar">
                <img src="{{asset('images/logo_180.png')}}" alt="">
            </div>
        </div>
    </div>


        <!-- jQuery 1.8+ -->
    <script src="{{asset('plugin/components/jQuery/jquery-1.11.3.min.js')}}"></script>
        <!-- Plugin JS file -->
    <script src="{{asset('plugin/components/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugin/components/moment/moment-timezone-with-data.min.js')}}"></script> <!-- spanish language (es) -->
    <script src="{{asset('plugin/whatsapp-chat-support.js')}}"></script>
    <script>
      $('#button-w').whatsappChatSupport({
        defaultMsg : '',
      });

    </script>

  </body>
</html>
