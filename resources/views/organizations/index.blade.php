@extends('layouts.structure')


@section('content')
<script src="{{asset('/js/trash_organization.js')}}"></script>
<style>
  .card_region:hover{
  background: grey;
  }
</style>
<div class="row">

<div class="col">
  
          <div class="card">
              <div class="card-header">
                  <h5 class="card-title d-flex justify-content-center" id="card-title">Adicionar Organização</h5>
              </div>
              <div class="card-body">
                  
              
              <div></div>
              <div class="form-group">
                <label for="region_description">Descrição da Organização</label>
                
                <label class="switch" style="float: right;">
                    
                    <input type="checkbox" class="status">
                    <span class="slider"></span>
                </label>
                <span style="float: right; padding-right: 3vh; padding-top: 1vh;">Inativo/Ativo</span>
                <input type="text" id="trash_organization_id" value="" hidden>
                <input type="text" class="form-control" id="organization_description" aria-describedby="emailHelp" placeholder="Digite o nome da organização..." value="">
                <small id="emailHelp" class="form-text text-muted">Descreva com o nome da organização</small>
              </div>

              <button type="" class="btn btn-primary" id="btn_form" onclick="organization()">Cadastrar</button>
                       
             </div>
          </div>
        </div>

</div>





<br>
<hr>
<h3 class="d-flex justify-content-center">Organizações</h3>
<div class="d-flex justify-content-center">

<br>
<table class="table table-striped table-bordered" style="width: 50%;">
  <thead class="thead-dark">
    <tr>
     <!-- <th scope="col">ID</th> -->
      <th scope="col">Status</th>
      <th scope="col"><span style="float: center;">Descrição</span></th>
      <th scope="col"><span style="float: right;">Editar</span></th>

    </tr>
  </thead>
  <tbody>
  @foreach($organization as $organizations)
    <tr>
    @if($organizations['status']==0)
     <th scope="row">Inativo</th>
    @endif
    @if($organizations['status']==1)
     <th scope="row">Ativo</th>
    @endif
      <td>{{$organizations['trash_organization_description']}}</td>
      <td><a href="#" id="trash_organization_{{$organizations['id']}}" onclick="edit_trash_organization(this.id)"style="float: right;"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png" alt="Editar" style="width:20px; height: 20px;"></a></td>
    </tr>
   @endforeach
  
  </tbody>
</table>
</div>

@endsection


