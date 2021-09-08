/*** Validaciones de Usuario ***/

function registroUsuario(){
  
    var nombre = $("#InputNombre").val();
  
    if(nombre != ""){
      
       var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
       
       if (!expresion.test(nombre)){
          $("#InputNombre").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No se permite numero ni caracteres especiales.</div>')
        
          return false;
        
       }
      
    }else{
        $("#InputNombre").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio.</div>')
        
        return false;
    }
    var usuario = $("#InputUsuario").val();
  
    if(usuario != ""){
      
       var expresion = /^[a-zA-Z0-9 ]*$/;
       
       if (!expresion.test(usuario)){
          $("#InputUsuario").parent().before('<div class="alert alert-warning"><strong>Error:</strong> No se permite caracteres especiales.</div>')
        
          return false;
        
       }
      
    }else{
        $("#InputUsuario").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio.</div>')
        
        return false;
    }
  
    return true;
  
}