<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- stylesheets -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> -->
    <!-- Custom css -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/AdminLTE.min.css')}}"  rel="stylesheet" type="text/css">
    <link href="{{asset('css/_all-skins.min.css')}}"  rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" type="text/css">

      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId            : '385539691933412',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v2.10'
          });
          FB.AppEvents.logPageView();
        };

        (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
  
    <title>Vacancity</title>

</head>
<body>
    
    <div id="app">
        <app></app>
    </div>
        
    </div>
    <script src="{{asset('js/app.js')}}"></script>
   
    <script src="https://use.fontawesome.com/894e4991e0.js"></script>
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{asset('js/popper.min.js')}}" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{asset('js/materialize.min.js')}}"></script>
    <script>
            $(document).ready(function(){
              $('.sidenav').sidenav();
            });

    </script>
</body>
</html>