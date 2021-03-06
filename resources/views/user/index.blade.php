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
.w3-display-topright{position:absolute;right:0;top:0}
.w3-button{border:none;display:inline-block;padding:8px 16px;vertical-align:middle;overflow:hidden;text-decoration:none;color:inherit;background-color:inherit;text-align:center;cursor:pointer;white-space:nowrap}
</style>
<div id="form">

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
        <input type="hidden" name="user_id" id="user_id">

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
    <button type="submit" class="btn btn-primary" id="btn_form" onclick="CreateUser()">Registrar Informação</button>
</div>
</div>
</div>

<div id="showUsers"></div>





<br>





</div>

@endsection


