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
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
         </select>
            </div>
        
            <div class="col-6 bottomDiv">
            <label>Região</label>
            <select class="form-control" id="id_trash_region" aria-label="Default select example">
            <option selected>Informe o nome da região</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
         </select>
            </div>
        
           
        
    </div>
    <button type="submit" class="btn btn-primary" id="btn_form" onclick="create_trash()">Cadastrar</button>
</div>
</div>





<br>
<hr>
<h3 class="d-flex justify-content-center">Lixeiras</h3>
<div class="d-flex justify-content-center">

<br>
<table class="table table-striped table-bordered" style="width: 100%;">
  <thead class="thead-dark">
    <tr>
     <!-- <th scope="col">ID</th> -->
      <th scope="col">Status</th>
      <th scope="col"><span style="float: center;">Descrição</span></th>
      <th scope="col"><span style="float: right;">Editar</span></th>

    </tr>
  </thead>
  <tbody>
  @foreach($trashes as $trash)
    <tr>
    @if($trash['trash_status']==0)
     <th scope="row">Inativo</th>
    @endif
    @if($trash['trash_status']==1)
     <th scope="row">Ativo</th>
    @endif
      <td>{{$trash['trash_name']}}</td>
      <td><a href="#" id="trash_region_{{$trash['id']}}" onclick="edit_trash(this.id)"style="float: right;"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png" alt="Editar" style="width:20px; height: 20px;"></a></td>
    </tr>
   @endforeach
  
  </tbody>
</table>
</div>

@endsection


