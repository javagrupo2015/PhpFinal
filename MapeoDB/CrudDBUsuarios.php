<?php 
    
    include('..\config.php') ;
    include('..\dto\DtoUsuario.php') ;

    class CRUDusuario 
     { 
        function  agregarUsuario($dtoUsuarioGuardar){
            $conec =conectar();  
            $sql = "CALL InsertUsuario('$dtoUsuarioGuardar->NombreCompleto','$dtoUsuarioGuardar->Apellido',
                    '$dtoUsuarioGuardar->Usuario','$dtoUsuarioGuardar->Contrasena'
                    ,$dtoUsuarioGuardar->IdTipoCargo )" ; 
            $ejecutar =mysqli_query($conec ,$sql); 
            
            if($ejecutar){
                    echo"bien Guardado"; 
                    return $dtoUsuarioGuardar;
            }
            else {
                echo "No guardo nada"  ; 
                return null ;  
            }

           
        }
        
        function updateUsuario($dtoUsuarioGuardar){
            $conec =conectar();     
            $sql = "CALL UpdateUsuario('$dtoUsuarioGuardar->NombreCompleto','$dtoUsuarioGuardar->Apellido',
                    '$dtoUsuarioGuardar->Apellido','$dtoUsuarioGuardar->usuario'
                    ,$dtoUsuarioGuardar->IdTipoCargo, $dtoUsuarioGuardar->IdUsuario )" ; 
            $ejecutar =mysqli_query($conec ,$sql); 
            
            if($ejecutar){
                    echo"bien Guardado"; 
                     }
            else {
                echo "No guardo nada"  ; 
            }     
         }

         function deleteUsuario($Id){
            $conec =conectar();     
            $sql = "CALL DeleteUsuario($Id)" ; 
            $ejecutar =mysqli_query($conec ,$sql); 
            
            if($ejecutar){
                    echo"bien Guardado"; 
                     }
            else {
                echo "No guardo nada"  ; 
            }     
         }

         function getByID($Id){
            $conec =conectar();     
            $sql = "CALL GetById($Id)" ; 
            $ejecutar =mysqli_query($conec ,$sql); 
            $dtoUsuarios = new dtoUsuario;
            $i= 0; 
            if($ejecutar){
                while ($fila = mysqli_fetch_array($ejecutar)){
                   $dtoUsuarios->IdUsuario = $fila["IdUsuario"];
                   $dtoUsuarios->NombreCompleto = $fila["NombreCompleto"];
                   $dtoUsuarios->Apellido = $fila["Apellido"];
                   $dtoUsuarios->usuario = $fila["usuario"];
                   $dtoUsuarios->Contrasena = $fila["contrasena"];
                   $dtoUsuarios->IdTipoCargo = $fila["IdTipoCargo"];                   
                   $i= $i+1; 
                }
            } 
            else {
                echo "No guardo nada"  ; 
            } 
           return $dtoUsuarios ;   
        }
        function getByUserAndPassword($password, $name){
          
            if ($name != null && $password != null){
                $conec =conectar(); 
                echo $name ;
                echo $password;
               
             $ejecutar =  mysqli_query($conec,"Select IdUsuario,user,contrasena from usuario where user=  '$name' AND contrasena =   '$password'") or die(mysqli_error($conec));
                if($ejecutar){
                    while ($fila = mysqli_fetch_array($ejecutar)){
                       $id = $fila["IdUsuario"];
                       $UsuarioLogin = $fila["user"];
                        $PasswordLogin = $fila["contrasena"];
                       
                    }
                }   
                if($id != null && $id != 0){
                            header('Location: ../FrontApp/bienvenido.html');
                }
                else {
                          header('Location: ../index.html');
                          echo "Contraseña Incorrecta"; 
                }
            }
        } 
    }
   
?> 