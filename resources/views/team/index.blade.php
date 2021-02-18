@extends('layouts.structure')


@section('content')
<script src="{{asset('/js/team.js')}}"></script>


<style>
  .card_region:hover{
  background: grey;
  }
 
</style>
<div class="row">

<div class="col">
  
          <div class="card">
              <div class="card-header">
                  <h5 class="card-title d-flex justify-content-center" id="card-title">Adicionar Time</h5>
              </div>
              <div class="card-body">
                  
              
              <div></div>
              <div class="form-group">
                <label for="region_description">Descrição do Time</label>
                
                <label class="switch" style="float: right;">
                    
                    <input type="checkbox" id="status">
                    <span class="slider"></span>
                </label>
                <span style="float: right; padding-right: 3vh; padding-top: 1vh;">Inativo/Ativo</span>
                <input type="hidden" id="team_id" >
                <input type="text" class="form-control" id="team_description" aria-describedby="emailHelp" placeholder="Digite o nome do time..." value="">
                <small id="emailHelp" class="form-text text-muted">Descreva o nome do time</small>
              </div>
              

              <button type="" class="btn btn-primary" id="btn_form" onclick="CreateTeam()">Registrar Informação</button>
                       
             </div>
          </div>
        </div>

</div>





<br>
<hr>


<h3 class="d-flex justify-content-center">Times</h3>
<div class="d-flex justify-content-center">
<div id="show_teams"></div>
<br>



</div>

@endsection


