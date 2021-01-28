function busca_cep(){
    const cep = document.getElementById("cep").value

    axios.get('https://brasilapi.com.br/api/cep/v1/'+cep)
    .then(function (response) {
      document.getElementById("address").value = response.data.street;
      document.getElementById("address_neighborhood").value = response.data.neighborhood;
      document.getElementById("city").value = response.data.city;
      document.getElementById("state").value = response.data.state;
      
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .then(function () {
      // always executed
    });
}


function create_trash(){
 
        const trash_name = document.getElementById("trash_name").value;
        const trash_latitude = document.getElementById("trash_latitude").value; 
        const trash_longitude = document.getElementById("trash_longitude").value;
        const trash_status = document.getElementById("trash_status").checked;
        const trash_max_support = document.getElementById("trash_max_support").value;
        const id_trash_region = document.getElementById("id_trash_region").value;
        const id_trash_organization = document.getElementById("id_trash_organization").value;
        const cep = document.getElementById("cep").value;
        const address = document.getElementById("address").value; 
        const address_number = document.getElementById("address_number").value; 
        const address_neighborhood = document.getElementById("address_neighborhood").value; 
        const trash_address = address+', '+address_number+' - '+address_neighborhood+', Caraguatatuba - SP'+', '+cep;
        

       axios.post('/trash/create', {
            trash_name,
            trash_latitude,
            trash_longitude,
            trash_address,
            trash_status,
            id_trash_region,
            id_trash_organization,
            trash_max_support,
            status: trash_status
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });

}