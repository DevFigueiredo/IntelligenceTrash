

function ModalView(title, message=false, close=false){

   const modal = document.getElementById('modal')
if(!modal){   
document.body.innerHTML+=`
<div class="modal" id="modal" tabindex="-1" style="display: block">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">${title}</h5>
        <span onclick="document.getElementById('modal').style.display='none'" class="modal-button modal-display-topright" >&times;</span>
      </div>
      
      ${message===false ? '': '<div class="modal-body"><p>'+message+'</p></div>'}
      
      ${close===true ? `<div class="modal-footer"><button type="button" onclick="document.getElementById('modal').style.display='none'" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button> </div>`: ''}
     
    </div>
  </div>
</div>
    `;
}else{
modal.style.display="block";
}

    
    
    }