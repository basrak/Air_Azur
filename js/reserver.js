$(document).ready(function(){
  
  $('.reserver').click(function(){
      console.log("test before réserver");
        loadReserver();
      console.log("test after réserver");
  });
  
});

function loadReserver(){
    var modalReserver = $('#modalReserver');
    var hiddenIdVol = $(this).data('id');
    //console.log("loadReserver %s", sID);
    $(".modalReserver #hiddenIdVol").val(hiddenIdVol);
    alert(hiddenIdVol);
    modalReserver.modal('show'); 
    
    
    
    /*
    $.get('http://localhost/Eval_PHP_FPS/controller/agence.php?action=vol&id='+sID,
    function(data){
       console.log("loadReserver %s returns", sID); 
       modalReserver.modal('show');    
           
    });
    /**/
    // $.ajax( { url : "http://localhost/Eval_PHP_FPS/controller/agence.php?actions=volz&id="+sID} );
    
}


