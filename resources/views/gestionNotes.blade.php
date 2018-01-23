<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Gestion des notes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../public/css/theme.css">

  <script src="../../public/js/jquery-3.2.1.min.js"> </script>

</head>

<body>



  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    
    <div class="container">

      <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-graduation-cap"></i><b>&nbsp;UNIVERSITA DI CORSICA</b></a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> 
      </button>

      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        
        <ul class="navbar-nav"> &nbsp; &nbsp; &nbsp;
          <li class="nav-item bg-secondary" style="min-width: 130px; border-radius: 0.25rem ">
            <a class="nav-link" href="#"> GESTION DES NOTES</a>
          </li>
        </ul> &nbsp; &nbsp; &nbsp;
        
        <div class="btn-group bg-primary border " style="min-width: 130px; border-radius: 0.25rem ">
          <div class="dropcompte dropdown">
            <button class="btn btn-primary dropdown-toggle text-white" data-toggle="dropdown"> MON COMPTE &nbsp;<i class="fa d-inline fa-lg fa-user-circle-o"></i></button>
            <div class="dropdown-content ">
              <a href="#">Acceuil</a>
              <div class="dropdown-divider"></div>
              <a href="#">Déconnection</a>

            </div>
          </div>
        </div>

      </div>
    
    </div>

  </nav>
  
  <br>
  <br>

 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>