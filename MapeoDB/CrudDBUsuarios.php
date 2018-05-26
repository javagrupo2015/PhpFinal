<?php 
    
    include('..\config.php') ;
    include('..\dto\DtoUsuario.php') ;

    class CRUDusuario 
     { 
        function  agregarUsuario($dtoUsuarioGuardar){
            $conec =conectar();  
            $sql = "CALL InsertUsuario('$dtoUsuarioGuardar->NombreCompleto','$dtoUsuarioGuardar->Apellido',
                    '$dtoUsuarioGuardar->usuario','$dtoUsuarioGuardar->Contrasena'
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
                }
            } 
            else {
                echo "No guardo nada"  ; 
            } 
           return $dtoUsuarios ;   
        }
    }
   
$clase = new CRUDusuario; 


$clase->IdUsuario = 1;
$clase->NombreCompleto = "Chritian david ";
$clase->Apellido = "Cortes Muñoz";
$clase->usuario = "christianc";
$clase->Contrasena = "123456";
$clase->IdTipoCargo = 1;

$resultado = $clase -> agregarUsuario($clase    );
echo $resultado->NombreCompleto

?> 