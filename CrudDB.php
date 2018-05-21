<?php 
    
    include('config.php') ;
    include('dto/DtoUsuario.php') ;

    //echo "se realizo exitosamente la conexion a la base de datos"; 
    class CRUDusuario 
     { 
        function  AgregarUsuario($dtoUsuarioGuardar){
            $conec =conectar();  
            $sql = "INSERT INTO usuario (NombreCompleto,Apellido,usuario,contrasena,IdTipoCargo) 
                    VALUES ('$dtoUsuarioGuardar->NombreCompleto','$dtoUsuarioGuardar->Apellido',
                   '$dtoUsuarioGuardar->Usuario', '$dtoUsuarioGuardar->Contrasena',$dtoUsuarioGuardar->IdTipoCargo)"; 
                    $ejecutar =mysqli_query($conec ,$sql); 
            if($ejecutar){
                    echo"bien Guardado"; 
            }
            else {
                echo "No guardo nada"  ; 
            }
        }   
    }
    
    $dtoUsuarios = new dtoUsuario; 
    $dtoUsuarios->NombreCompleto = "nicolas DAvid "; 
    $dtoUsuarios->Apellido = "Cortes Muñoz "; 
    $dtoUsuarios->usuario = "christianc"; 
    $dtoUsuarios->Contrasena = "123"; 
    $dtoUsuarios->IdTipoCargo = 1 ;
    echo  $dtoUsuarios->usuario; 
    
    $clase = new CRUDusuario; 
    $clase -> AgregarUsuario($dtoUsuarios); 
?> 