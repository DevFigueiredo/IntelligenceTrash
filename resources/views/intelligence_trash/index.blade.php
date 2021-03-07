@extends('layouts.structure')


@section('content')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.11.6/xlsx.core.min.js"></script>
  <script src="https://cdn.jsdelivr.net/alasql/0.3/alasql.min.js"></script>
 <script src="{{asset('/js/trash_list_filters.js')}}"></script>
 <script src="{{asset('/js/intelligence.js')}}"></script>

<div class="d-flex justify-content-center">
    <h2>Intelligence Trash</h2>
</div>
<hr>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <label for="region"><b>Região</b></label>
      <select class="form-select" name="region" id="region" onclick="FindTrashes()">
      <option value="null" selected>Selecione uma região...</option>
      @foreach($regions as $region)
          <option value="{{$region['id']}}">{{$region['trash_regions_description']}}</option>
      @endforeach
          <option value="all">Todas as regiões</option>
      </select>
    </div>
    <div class="col-md-4">
      <label for="trash"><b>Lixeiras</b></label>
      <select class="form-select" name="trash" id="trash" disabled>

      </select>
    </div>
  </div>
  <hr>
  <div class="row">
   <div class="col-md-2">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck1">
          <label class="custom-control-label" for="customCheck1"><b>ID</b></label>
      </div>
   </div>
   <div class="col-md-2">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck2">
          <label class="custom-control-label" for="customCheck2"><b>Nome da Lixeira</b></label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck3">
          <label class="custom-control-label" for="customCheck3"><b>Longitude e Latitude</b></label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck4">
          <label class="custom-control-label" for="customCheck4"><b>Endereço</b></label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck5">
          <label class="custom-control-label" for="customCheck5"><b>Status</b></label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck6">
          <label class="custom-control-label" for="customCheck6"><b>Capacidade Máxima</b></label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck7">
          <label class="custom-control-label" for="customCheck7"><b>Região</b></label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck8">
          <label class="custom-control-label" for="customCheck8"><b>Capacidade Atual</b></label>
      </div>
    </div>
  
  
  
  
  </div>


</div>

@endsection


