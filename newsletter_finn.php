<?php
/*
Plugin Name: Newsletter_Finn
Plugin URI: 
Description: crear un input para suscribirse a nuestra newsletter
Version: 
Author: Erick Frias
Author URI: 
License: 
License URI: 
*/
?>


<?php
function newsletter() {
?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="news.css"> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 
    

</head> 
<body>
<div id="div1">


   <form method="post" id="formulario" action="enviarcorreo.php">
   <label>Deja tu correo electrónico para suscribirte a nuestro Newsletter</label>
   <br>
   <input name="correo" type="email" id="correo"
   value="" placeholder="Correo Electronico" style="width:50%" />
   <button id="btn2" type="submit">Suscribir</button>
   </form>
   </div>
 
 <div id="mensaje" style="display: none">El correo fue guardado Correctamente</div>
 <div id="error" style="display: none">Hubo un problema, intente más tarde</div>

    
     
</body>
</html>


<?php
}
add_action('the_content','newsletter');

?>


<?php

function titulo($text){
    
    $text = 'Newsletter de Erick Frias';
    
    return $text;
}

add_filter('the_title', 'titulo');

?>

<script>

    var btnEnviar = document.getElementById('btn2'); //selecciona el boton con ID
  
  btnEnviar.addEventListener('click', enviarCorreo); //agregamos un evento click
  
  
  function enviarCorreo(e){
  e.preventDefault(); 
  let email = document.getElementById('correo').value; 
  let divForm = document.getElementById('div1');
  let mensaje = document.getElementById('mensaje');
  let error = document.getElementById('error');
  let su_correo = 'correo='+email;
  console.log(su_correo);
  console.log(email);
  
  if (window.XMLHttpRequest) {//*AJAX - Java Script
    xhr = new XMLHttpRequest();//*
  }else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");//*
  }
  xhr.onreadystatechange = function(){//*

  if (xhr.readyState  == 4 && xhr.status == 200) { // *
    var respuesta = xhr.responseText; //respuesta del server
      divForm.style.display= 'none'; //oculto el div que tiene el formulario
      mensaje.style.display = 'block'; //muestro el mensaje
    }else{
        error.style.display = 'block'; //caso contrario muestro mensaje de error
      
    }}

}

xhr.open("POST", "enviarcorreo.php"); //enviar por metodo post
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");//Cabecera POST
xhr.send(su_correo);//utilizamos xhr.send para enviar la variable que concatena el 'correo' con el valor 
}

</script>

