@extends('layouts.structure')

@section('content')
<style>#mapid { height: 450px; }</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<script src="{{asset('/js/dashboard.js')}}"></script>
<script src="{{asset('/js/dashboard_gerador.js')}}"></script>
<script src="{{asset('/js/temporary.js')}}"></script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <div class="row justify-content-center d-flex">
      <div class="h-25 w-25 mw-50 mh-50"> 
      <canvas id="horario" width="1" height="1" ></canvas>
    </div>

    <div class="h-25 w-25 mw-50 mh-50"> 
      <canvas id="regioes" width="1" height="1" ></canvas>
    </div>

    <div class="h-25 w-25 mw-50 mh-50"> 
      <canvas id="lixeiras" width="1" height="1" ></canvas>
    </div>
</div>

<div>
  <div class="container" style="float: right;width: 50%;">
    <div class="row">
    <div class="col">

    <div id="mapid" style="height: 800px;"></div>

    </div>
    </div>
  </div>
  <hr>
  <div class="container" style="float:left;width: 50%;">
    <h2 style="d-flex justify-content-center">Lixeiras e Regiões</h2>
    <button type="button" class="btn btn-danger" data-toggle="collapse" id="collapse-lixeira" data-target="#lixeira-demo" onclick="document.querySelector('#collapse-regiao').click();">Lixeiras</button>
    <button type="button" class="btn btn-success" data-toggle="collapse" id="collapse-regiao" data-target="#regiao-demo">Regiões</button>
    <div id="lixeira-demo" class="collapse">
    <div class="container">
      <div class="row" id="cards-lixeira">
        
      </div>
      <button class="btn btn-primary" style="float: right; margin-top: 3vh;">Ver mais Lixeiras...</button>
    </div>
    </div>
    <div id="regiao-demo" class="collapse">
    <div class="container">
      <div class="row" id="cards-regiao">
        
      </div>
      <button class="btn btn-primary" style="float: right; margin-top: 3vh;">Ver mais Regiões...</button>
    </div>
    </div>
  </div>
</div>


<hr>



</div>





<script src="{{asset('/js/trashes_list.js')}}"></script>

  
@stop
