@extends('layouts.structure')


@section('content')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="{{asset('/js/trash.js')}}"></script>

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
    <h5 class="card-title text-primary">Cadastro de Lixeira</h5>

    <input class="form-control" id="IdGrupoNovo" style="display:none;">

    <div class="row">
        <div class="col-12 bottomDiv">
            <p> Inativo / Ativo</p>
            <label class="switch" style="margin-top:-20px;">
                <input type="checkbox" id="trash_status">
                <span class="slider rounded"></span>
            </label>
        </div>
        <input type="hidden" name="trash_id" id="trash_id">

        <div class="col-10 bottomDiv" >
            <label>Nome da Lixeira</label>
           <input type="text" id="trash_name" class="form-control" placeholder="Nome da Lixeira">
            </div>

            <div class="col-2 bottomDiv" >
            <label>Capacidade Máxima (L)</label>
           <input type="text" id="trash_max_support" class="form-control" placeholder="Ex: 40">
            </div>

            <div class="col-6 bottomDiv">
            <label>Latitude</label>
            <input type="text" id="trash_latitude" class="form-control" placeholder="Latitude">

            </div>
            <div class="col-6 bottomDiv">
            <label>Longitude</label>
            <input type="text" id = "trash_longitude"class="form-control" placeholder="Longitude">

            </div>
            
            <div class="col-2 bottomDiv ">
            <label>CEP</label>
            <div class="input-group ">
  <input type="text" class="form-control" placeholder="CEP" id="cep">
  <button class="btn btn-outline-secondary" type="button" onclick="busca_cep()">
  <i class="fa fa-search"></i>
  </button>
</div>                                    
            </div>



            <div class="col-5 bottomDiv">
            <label>Endereço</label>
            <input type="text" id="address" class="form-control" placeholder="Endereço">
            </div>
            
            <div class="col-2 bottomDiv">
            <label>Número</label>
            <input type="text" id="address_number" class="form-control" placeholder="Número">
            </div>
            <div class="col-3 bottomDiv">
            <label>Bairro</label>
            <input type="text" id="address_neighborhood" class="form-control" placeholder="Bairro">
            </div>
            <div class="col-6 bottomDiv">
            <label>Cidade</label>
            <input type="text" id="city" class="form-control" placeholder="Pesquise o CEP" disabled>
            </div> <div class="col-6 bottomDiv">
            <label>Estado</label>
            <input type="text" id="state" class="form-control" placeholder="Pesquise o CEP" disabled>
            </div>

        <div class="col-6 bottomDiv">
            <label>Organização</label>
            <select class="form-control" id="id_trash_organization" aria-label="Default select example">
            <option selected>Informe a Organização</option>
 
         </select>
            </div>
        
            <div class="col-6 bottomDiv">
            <label>Região</label>
            <select class="form-control" id="id_trash_region" aria-label="Default select example">
            <option selected>Informe o nome da região</option>
      
         </select>
            </div>
        
           
        
    </div>
    <button type="submit" class="btn btn-primary" id="btn_form" onclick="create_trash()">Registrar Informação</button>
</div>
</div>





<br>
<hr>
<h3 class="d-flex justify-content-center">Lixeiras</h3>
<div class="d-flex justify-content-center">

<br>




<div id="showTrashes"></div>



</div>

@endsection


