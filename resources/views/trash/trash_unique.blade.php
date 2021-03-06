@extends('layouts.structure')


@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.11.6/xlsx.core.min.js"></script>
<script src="https://cdn.jsdelivr.net/alasql/0.3/alasql.min.js"></script>
<script src="{{asset('/js/trash_unique.js')}}"></script>
<script src="{{asset('/js/temporary.js')}}"></script>
<div class="container">
    <div style="float:left;">
        <div class="card text-center">
        <input type="hidden" name="id" value="{{$trash['id']}}" id="trash_id">
        <div class="card-header">
            <b>{{$trash['trash_name']}}</b>
        </div>
        <div class="card-body justify-content-start">
            <h5 class="card-title">Informações</h5>
            <label><b>Endereço: </b></label>
            <span> {{$trash['trash_address']}}</span>
            </br>
            <label"><b>Capacidade: </b></label>
            <span"> {{$trash['trash_capacity_used']}}/{{$trash['trash_max_support']}}L</span>
            </br>
            <label"><b>Região: </b></label>
            <span"> {{$trash['regiao']}}</span>
            </br>
            <label"><b>Organização: </b></label>
            <span"> {{$trash['organizacao']}}</span>
            </br>
        </div>
        <div class="card-footer text-muted">
            <b>Criado em: </b>{{$trash['created_at']}}
        </div>
        </div>
    </div>
    <div>
        <div class="row">
        <div class="col">

        <div id="mapid" style="height: 60vh;"></div>

        </div>
        </div>
    </div>
</div>
<hr>
<div class="d-flex justify-content-center">
    <button class="btn btn-primary" onclick="ShowGraphics()"> Gráficos </button>
    <button class="btn btn-primary ml-4" onclick="ShowHistory()"> Histórico </button>
</div>


<div style="margin-top: 10px;" class="d-none" id="DivGraficos">
    
    <div class="btn-group d-flex justify-content-center" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" onclick="GraficoIntervalo(1,1)">1 Hora</button>
        <button type="button" class="btn btn-secondary" onclick="GraficoIntervalo(2,1)">1 Dia</button>
        <button type="button" class="btn btn-secondary" onclick="GraficoIntervalo(3,1)">1 Semana</button>
        <button type="button" class="btn btn-secondary" onclick="GraficoIntervalo(4,1)">Em tempo real</button>
    </div>
    <br>
    <div class="btn-group d-flex justify-content-center" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" onclick="GraficoIntervalo(1,2)">Exportar dados de 1 Hora</button>
        <button type="button" class="btn btn-secondary" onclick="GraficoIntervalo(2,2)">Exportar dados de 1 Dia</button>
        <button type="button" class="btn btn-secondary" onclick="GraficoIntervalo(3,2)">Exportar dados de 1 Semana</button>
    </div>
    <div id="chart_div" class="d-none" style="width: 900px; height: 500px;">Sem informações...</div>
    <div id="chart_div2" class="d-none" style="width: 900px; height: 500px;">Sem informações...</div>
</div>
<hr>
<div style="margin-top: 10px;" class="d-none" id="tabela">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Usuário</th>
      <th scope="col">Status</th>
      <th scope="col">Descrição</th>
    </tr>
  </thead>
  <tbody id="tabela_info">
    <tr>
    <td>
    </td>
    <td>
        Sem informações...
    </td>
    </tr>
  </tbody>
</table>


</div>




<script src="{{asset('/js/trashes_list.js')}}"></script>

<script>

</script>










@endsection