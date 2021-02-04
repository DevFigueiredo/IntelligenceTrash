@extends('layouts.structure')


@section('content')

<script src="{{asset('/js/responsability.js')}}"></script>

<div class="row">
<div class="row">
</div>
<div class="col-6 offset-3">
<div class="row">
<div class="col-12">
Selecione o Time
</div>
</div>
<div class="row">
<div class="col-10">
<select class="form-select" id="teams" >
  <option>Selecione a Região</option>

</select>
</div>

<div class="col-1">
<button type="button" class="btn btn-secondary" onclick="GetResponsabilities()"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>
</div>
</div>


</div>


<div class="row">
<div class="col-4" style="margin-top: 60px">
Selecione a Região
<select class="form-select" id="region" onChange="GetTrashesOfRegions()" disabled>
  <option>Selecione a Região</option>

</select>

</div>
<div class="col-4" style="margin-top: 60px">
Selecione a Lixeira
<select class="form-select" id="trash" disabled>
  <option>Selecione a Lixeira</option>

</select>

</div>
<div class="col-4" style="margin-top: 83px">
<button type="button" class="btn btn-secondary" >Adicionar Responsabilidade</button>
</div>


</div>
<div class="row">
<table class="table" style="margin-top: 30px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Time</th>
      <th scope="col">Zona</th>
      <th scope="col">Lixeira</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">SUPERVISOR</th>
      <td>SUL 1</td>
      <td>Lixeira do Morro do Algodao</td>
    </tr>
    <tr>
      <th scope="row">SUPERVISOR</th>
      <td>SUL 2</td>
      <td>Lixeira do Pereque</td>
    </tr>
    <tr>
      <th scope="row">SUPERVISOR</th>
      <td>NORTE</td>
      <td>Lixeira do Bereguejonson</td>
    </tr>
  </tbody>
</table>

</div>


@endsection

