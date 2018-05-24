<?php 
    
    include('..\config.php') ;
    include('..\dto\DtoUsuario.php') ;

    class CRUDusuario 
     { 
        function  agregarUsuario($dtoUsuarioGuardar){
            $conec =conectar();  
            $sql = "CALL InsertUsuario('$dtoUsuarioGuardar->NombreCompleto','$dtoUsuarioGuardar->Apellido',
                    '$dtoUsuarioGuardar->Apellido','$dtoUsuarioGuardar->Apellido'
                    ,$dtoUsuarioGuardar->IdTipoCargo )" ; 
            $ejecutar =mysqli_query($conec ,$sql); 
            
            if($ejecutar){
                    echo"bien Guardado"; 
                     }
            else {
                echo "No guardo nada"  ; 
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
                
                   echo   $dtoUsuarios->IdUsuario; 
                }
            } 
            else {
                echo "No guardo nada"  ; 
            } 
           return $dtoUsuarios ;   
        }
    }
    /*
    $dtoUsuarios = new dtoUsuario; 
    $dtoUsuarios->NombreCompleto = "Correcion DAvid "; 
    $dtoUsuarios->Apellido = "Cortes Muñoz "; 
    $dtoUsuarios->usuario = "NDJKANADNKDJ"; 
    $dtoUsuarios->Contrasena = "123"; 
    $dtoUsuarios->IdTipoCargo = 1 ;
    $dtoUsuarios ->IdUsuario =  33;
    

    echo  $dtoUsuarios->usuario; 
    
    $clase = new CRUDusuario; 
    $clase -> DeleteUsuario($dtoUsuarios->IdUsuario); 
*/
$clase = new CRUDusuario; 
$resultado = $clase -> getByID(1);

echo $resultado->NombreCompleto

?> 