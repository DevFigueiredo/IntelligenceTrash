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
<select class="form-select" id="time" >

</select>
</div>

<div class="col-1">
<button type="button" class="btn btn-secondary" ><i class="fa fa-search" aria-hidden="true"></i></button>
</div>
</div>
</div>


</div>


<div class="row">
<div class="col-4" style="margin-top: 60px">
Selecione a Região
<select class="form-select" id="region" disabled>
  <option>Selecione a Região</option>
  <option value="1">Zona TAl</option>
  <option value="2">Zona TAl</option>
  <option value="3">Zona TAl</option>
  <option value="5">Zona TAl</option>
  <option value="6">Zona TAl</option>

</select>

</div>
<div class="col-4" style="margin-top: 60px">
Selecione a Lixeira
<select class="form-select" id="trash" disabled>
  <option>Selecione a Lixeira</option>
  <option value="1">Zona TAl</option>
  <option value="2">Zona TAl</option>
  <option value="3">Zona TAl</option>
  <option value="5">Zona TAl</option>
  <option value="6">Zona TAl</option>

</select>

</div>
<div class="col-4" style="margin-top: 83px">
<button type="button" class="btn btn-secondary">Adicionar Responsabilidade</button>
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


  <script>
  $(function() {
    $('#time').selectize({
      create: function(input,callback){
        callback({value: '1', text: 'TESTE'});

   }
    });
  });
  var $select = $('#select-tools').selectize({
					maxItems: null,
					valueField: 'id',
					labelField: 'title',
					searchField: 'title',
					options: [
						{id: 1, title: 'Spectrometer', url: 'http://en.wikipedia.org/wiki/Spectrometers'},
						{id: 2, title: 'Star Chart', url: 'http://en.wikipedia.org/wiki/Star_chart'},
						{id: 3, title: 'Electrical Tape', url: 'http://en.wikipedia.org/wiki/Electrical_tape'}
					],
					create: false
				});

  
 
  
  </script>
@endsection

