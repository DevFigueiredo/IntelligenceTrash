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
<div class="col-7">
<select class="form-select" id="teams" >
  <option>Selecione o Time</option>

</select>



</div>

<div class="col-1">
<button type="button" class="btn btn-secondary" onclick="ShowResponsabilitiesTime()"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>
<div class="col-2 offset-1">
<button type="submit" class="btn btn-primary" id="btn_form" onclick="RegisterResponsability()">Registrar</button>
</div>
</div>
</div>


</div>


<div class="row">
<div class="col-4" style="margin-top: 60px" >
Selecione a Região
<select class="form-select" id="region" onChange="GetTrashesOfRegions()" disabled>
  <option>Selecione a Região</option>

</select>

</div>
<div class="col-4" style="margin-top: 60px">
Selecione a Lixeira
<select class="form-select" id="trashes" disabled>
  <option>Selecione a Região</option>

</select>


</div>
<div class="col-4" style="margin-top: 83px">
<button type="button" class="btn btn-secondary" id="addResponsability" onclick="AddResponsability()" disabled >Adicionar Responsabilidade</button>
</div>


</div>
<br/>
<div class="row">
<div id="showresponsabilities">

</div>

</div>


@endsection

