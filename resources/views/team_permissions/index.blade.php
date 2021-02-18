@extends('layouts.structure')


@section('content')

<script src="{{asset('/js/team_permissions.js')}}"></script>

<div class="row">

<div class="col-5 offset-3" style="margin-bottom: 30px">
<select class="form-select" id="teams" >
  <option>Selecione o Time</option>

</select>
</div>
<div class="col-1">
<button type="submit" class="btn btn-primary" id="btn_form" onclick="RegisterResponsability()">Registrar</button>
</div>

<div class="row">


<div class="col-12">
<div id="permissions">

</div>


<!--
  <table class="table">
  <thead class="table-dark">
  <tr>
      <th scope="col">Tela de Permissão</th>
      <th scope="col" style="text-align: center;">Acesso</th>
    </tr>
  </thead>
  <tbody>
 <tr>
 <td>Dashboard</td>
 <td style="text-align: center;"><input type="checkbox" class="" name="Imprimir"></td>
 </tr>    
 
 <tr>
 <td>Mapa de Lixeiras</td>
 <td style="text-align: center;"><input type="checkbox" class="" name=""></td>
 </tr>                      
 <tr>
 <td>Usuários</td>
 <td style="text-align: center;"><input type="checkbox" class="" name=""></td>
 </tr>                      
 <tr>
 <td>Times</td>
 <td style="text-align: center;"><input type="checkbox" class="" name=""></td>
 </tr>                      
 <tr>
 <td>Lixeiras</td>
 <td style="text-align: center;"><input type="checkbox" class="" name=""></td>
 </tr>                      
 <tr>
 <td>Regiões</td>
 <td style="text-align: center;"><input type="checkbox" class="" name=""></td>
 </tr>   
 <tr>
 <td>Responsabilidade</td>
 <td style="text-align: center;"><input type="checkbox" class="" name=""></td>
 </tr>   
 <tr>
 <td>Permissões de Acesso</td>
 <td style="text-align: center;"><input type="checkbox" class="" name=""></td>
 </tr>                      
  </tbody>
</table>

--></div>

@endsection


