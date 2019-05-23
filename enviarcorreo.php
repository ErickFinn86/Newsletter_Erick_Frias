



<?php  

        $mail = filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL);


        if($mail){
             
           $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'bd_newsletter';
  
        $conn = mysqli_connect($server, $username, $password, $database);
    
             if (!$conn) {
             die("Error de Conexion: " . mysqli_connect_error());
              }
     
        $mail = $_POST['correo'];

             $sql = "INSERT INTO mails_newsletter (correo_usuario) VALUES ('$mail')";
             if (mysqli_query($conn, $sql)) {
                header("location:https://localhost/wordpress");
                }else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);
                
             
             
         }
            
            
        
        
    

          
       



?>
    