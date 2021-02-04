@extends('layouts.structure')

@section('content')
<style>#mapid { height: 450px; }</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<script src="{{asset('/js/dashboard.js')}}"></script>
<script src="{{asset('/js/temporary.js')}}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{asset('/js/dashboard_GrapichsGoogle.js')}}"></script>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div>
     <h2 class="d-flex justify-content-center">Lixeiras e Regiões</h2>
     <div class="d-flex justify-content-center">
      <button type="button" onclick="BtnLixeira()" class="btn btn-danger" id="collapse-lixeira">Lixeiras</button>
      <button type="button" class="btn btn-success ml-4"  id="collapse-regiao"  onclick="BtnRegiao()">Regiões</button>
    </div>
  </div>
  
<div id="chart_div"></div>

<div>
  <div class="container" style="float: right;width: 50%;">
    <div class="row">
    <div class="col">


    </div>
    </div>
  </div>
  <hr>
  <div class="container">
   
    <div id="lixeira-demo">
    <div class="container">
      <div class="row align-self-stretch" id="cards-lixeira">
        
      </div>
      <button class="btn btn-primary" style="float: right;">Ver mais Lixeiras...</button>
    </div>
    </div>


    <hr>
    <div id="regiao-demo" class="mt-4">
    <div class="container">
      <div class="row" id="cards-regiao">
        
      </div>
      <button class="btn btn-primary" style="float: right; margin-top: 3vh; margin-bottom: 3vh;">Ver mais Regiões...</button>
    </div>
    </div>
  </div>
</div>


</div>



  
@stop