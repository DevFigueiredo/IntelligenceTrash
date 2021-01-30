@extends('layouts.structure')


@section('content')

<script src="{{asset('/js/user.js')}}"></script>

<style>
  .card_region:hover{
  background: grey;
  }
.bottomDiv{
  margin-bottom: 10px;
}
</style>
<div class="row">
<div class="card-body">
    <h5 class="card-title text-primary">Cadastro de Usuário</h5>

    <input class="form-control" id="IdGrupoNovo" style="display:none;">

    <div class="row">
        <div class="col-12 bottomDiv">
            <p> Inativo / Ativo</p>
            <label class="switch" style="margin-top:-20px;">
                <input type="checkbox" id="status">
                <span class="slider rounded"></span>
            </label>
        </div>
        <input type="hidden" name="trash_id" id="user_id">

        <div class="col-12 bottomDiv" >
            <label>Nome</label>
           <input type="text" id="name" class="form-control" placeholder="Nome">
            </div>

            <div class="col-6 bottomDiv">
            <label>Usuário</label>
            <input type="text" id="user" class="form-control" placeholder="Usuário">

            </div>
            <div class="col-6 bottomDiv">
            <label>Senha</label>
            <input type="password" id = "password"class="form-control" placeholder="Senha">   
            </div>
        
            <div class="col-12 bottomDiv">
            <label>Time</label>
            <select class="form-control" id="id_trash_team" aria-label="Default select example">
            <option selected>Informe o nome da região</option>
      
         </select>
            </div>
        
           
        
    </div>
    <button type="submit" class="btn btn-primary" id="btn_form" onclick="create_trash()">Registrar Informação</button>
</div>
</div>





<br>




<div id="showTrashes"></div>



</div>

@endsection


