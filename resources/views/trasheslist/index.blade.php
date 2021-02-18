@extends('layouts.structure')


@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.11.6/xlsx.core.min.js"></script>
  <script src="https://cdn.jsdelivr.net/alasql/0.3/alasql.min.js"></script>
 <script src="{{asset('/js/trash_list_filters.js')}}"></script>
<style>
#mapid { 
  height: 350px; 
}

.show {
  display: block;
}

.filterDiv {
  display: none;

}

</style>
<div class="container-fluid">
<div class="row">
<div class="col">

<div id="mapid"></div>

</div>
</div>

<hr>
<div class="container-fluid">
<div class="row">
  <div class="col-md-3">
  <select class="custom-select" name="zona" id="zona">
    <option selected>Selecione...</option>
    @foreach($region as $regions)
      <option onclick="filterSelection()" value="{{$regions['trash_regions_description']}}">{{$regions['trash_regions_description']}}</option>
    @endforeach
    <option onclick="filterSelection('all_zones')" value="all">Todas as regiões</option>
  </select>
  </div>
  <div class="col-md-3">
    <select class="custom-select" name="capacidade" id="capacidade">
      <option onclick="filterSelection('all_capct')" selected value="all">Selecione...</option>
      <option onclick="filterSelection()" value="red">Cheia</option>
      <option onclick="filterSelection()" value="green">Vazia</option>
    </select>
  </div>
  <div class="col-md-3">
  </div>
  <div class="col-md-3">
    <i class="fa fa-file-excel-o" aria-hidden="true" style="color: green; float: right; cursor: pointer;" onclick="GetExcelList()"></i>
    <i class="fa fa-print" style="color: red; float: right; cursor: pointer; margin-right: 2px;" onclick="window.print()" aria-hidden="true"></i>


  </div>
<div>
  



</div>
   
    <div id="lixeira-demo">
    <div class="container">
      <div class="row align-self-stretch" id="cards-lixeira">

      </div>
    </div>
    </div>


    
</div>



<script src="{{asset('/js/trashes_list.js')}}"></script>

<script>
ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
   find_all_trashes_in_map()
});
</script>
@endsection


