$(document).ready(function(){
  
  $('.modal-link').click(function(){
        var link = $(this).attr("href");
        alert(link);
  });

  $('#sVilleArrivee').on('change', function(){
        selectVols();
  });

});

function selectVol(){
$.get('agence.php', {action:'vol', sVilleDepart: $('#sVilleDepart').val() },
    function(data){
       alert(data);    
           
    });
}


