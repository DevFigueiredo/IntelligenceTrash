
import('./index.js')

GetTeams();



async function GetTeams(){
  await axios.get('/team')
.then(function (response) {
  const teams = response.data;
  
  teams.map(team=>{
  console.log(team.trash_team_description);

    $('#teams').append($('<option>', {
      value: team.id,
      text : team.trash_team_description
  }))});

	$select_city = $('#teams').selectize({
  });

})
    
} 


async function GetResponsabilities(){
 await GetRegionsOfTrashes();
  
 $('#trash').selectize({
});
}


async function GetRegionsOfTrashes(){
  await axios.get('/trash')
  .then(function (response) {
    const trashes = response.data;
    
    trashes.map(trash=>{
    console.log(trash);
  
      $('#region').append($('<option>', {
        value: trash.id_trash_region,
        text : trash.trash_regions_description
    }))});
  
    $('#region').prop('disabled', false);  
    $('#region').selectize({
  });
  
  })
}


  async function GetTrashesOfRegions(){
    console.log('mano')
    $('#trash').prop('disabled', false);  
    await axios.get('/trash')
    .then(function (response) {
      const trashes = response.data;
      
      trashes.map(trash=>{
    
        $('#trash').append($('<option>', {
          value: trash.id,
          text : trash.trash_name
      }))});
    
   
      $('#trash').selectize({
    });
    
    })
  }
  

