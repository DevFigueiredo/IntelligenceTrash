
import('./index.js')

function FindTeams(){
    const select = document.getElementById('select-links');
    axios.get('/team')
    .then(function (response) {
      const teams = response.data;
      teams.map(team=>{
        var opt = document.createElement('option');
        opt.value = team.id;
        opt.innerHTML = team.trash_team_description;
        select.appendChild(opt);
    })
        
  
    })
    
    
}