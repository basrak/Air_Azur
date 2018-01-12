$(document).ready(function(){
  
  $('.reserver').click(function(){
      alert('test');
        loadReserver();
        alert('test');
  });
});

function loadReserver(){
$.get('http://localhost/Eval_PHP_FPS/controller/agence.php?action=vol&id=', { id: $(this).data('id') },
    function(data){
       alert('test');    
           
    });
}


