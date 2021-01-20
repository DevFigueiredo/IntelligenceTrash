@extends('layouts.structure')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
<hr>
<div class="row justify-content-center d-flex">
  <div class="card" style="width: 18rem; margin-bottom: 10px">
                  <div class="card-body">
                  @if($full_trashes>($total_trashes/2))
                    <h5 class="card-title">Lixeiras <a href="#"><i class="fa fa-circle" style="margin-left: 1vh;float: right;color: red;cursor:pointer;"></i></a></h5>
                  @else
                  <h5 class="card-title">Lixeiras <a href="#"><i class="fa fa-circle" style="margin-left: 1vh;float: right;color: green;cursor:pointer;"></i></a></h5>
                  @endif
                  <p class="card-text">{{$full_trashes}}/{{$total_trashes}} - Lixeiras cheias !</p>
                    <a href="/trash" class="btn btn-primary">Monitorar</a>
  </div>
  </div>
  <div class="card" style="width: 18rem; margin-bottom: 10px; margin-left: 5vh;">
                  <div class="card-body">
                  @if($full_regions>($total_regions/2))
                    <h5 class="card-title">Regiões <a href="#"><i class="fa fa-circle" style="margin-left: 1vh;float: right;color: red;cursor:pointer;"></i></a></h5>
                  @else
                  <h5 class="card-title">Regiões <a href="#"><i class="fa fa-circle" style="margin-left: 1vh;float: right;color: green;cursor:pointer;"></i></a></h5>
                  @endif
                  <p class="card-text">{{$full_regions}}/{{$total_regions}} - Regiões com superlotamento !</p>
                    <a href="/region" class="btn btn-primary">Monitorar</a>
  </div>
  </div>
</div>
  
@stop
