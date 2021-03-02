@extends('layouts.structure')


@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  display: block;

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
  <label for="zona"> Regiões: </label>
  <select class="custom-select" name="zona" id="zona" onchange="filterSelection()">
    <option selected value="all">Selecione...</option>
    @foreach($region as $regions)
      <option value="{{$regions['id']}}">{{$regions['trash_regions_description']}}</option>
    @endforeach
    <option value="all_regions">Todas as regiões</option>
  </select>
  </div>
  <div class="col-md-3">
  <label for="capacidade"> Status: </label>
    <select class="custom-select" name="capacidade" id="capacidade" onchange="filterSelection()">
      <option  selected value="all">Selecione...</option>
      <option  value="1">Cheia</option>
      <option  value="0">Vazia</option>
    </select>
  </div>
  <div class="col-md-3">
    <label for="Lixeira">Pesquisar Lixeira</label>
    <input type="text" placeholder="Lixeira ..." name="Lixeira" id="PesquisaLixeira" onkeyup="FilterByName(this.value)" onkeydown="FilterByName(this.value)">
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


