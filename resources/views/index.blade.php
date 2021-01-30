
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Daniel e Junior">
    <meta name="generator" content="Jekyll v4.1.1">
  <title>DJ Soluções - {{$title}}</title>
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

    <!-- Custom styles for this template -->
  </head>
  <body>

     



    <div class="container">
    <div class="row align-items-start">
    <div class="col-6 offset-3" style="margin-top:15%">
    <div class="card">
<article class="card-body">
<h4 class="card-title mb-4 mt-1">DJ Soluções</h4>
	 <form method="get" action="/dashboard">
    <div class="form-group">
    	<label>Login</label>
        <input name="" class="form-control" placeholder="Login" type="email">
    </div> <!-- form-group// -->
    <div class="form-group">
    	<label>Senha</label>
        <input class="form-control" placeholder="******" type="password">
    </div> <!-- form-group// --> 
    <div class="form-group"> 
    <div class="checkbox">
      <label> <input type="checkbox"> Salvar Senha </label>
    </div> <!-- checkbox .// -->
    </div> <!-- form-group// -->  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Login  </button>
    </div> <!-- form-group// -->                                                           
</form>
</article>
</div> <!-- card.// -->



    </div>
  </div>
</div>

      
        

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="{{asset('js/index.js')}}"></script></body>
      
    </body>
</html>
