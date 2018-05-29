<?php



include('..\MapeoDB\CrudDBUsuarios.php') ; 


if(isset($_POST['UsuarioLogi'])) {
   
    $mapeo = new CRUDusuario; 
    $usuario = $_POST["fuser"];
    $pass = $_POST["fpass"];
    $mapeo->getByUserAndPassword($pass,$usuario );
   // echo $usuario;
   // echo $pass; 
   
    $id= 0; 
}
else {
    if(isset($_POST['CrearUsuario'])) {
      
        $mapeo = new CRUDusuario; 

        $dtoUsuarios= new dtoUsuario(); 
        $dtoUsuarios->NombreCompleto = $_POST["name"];
        $dtoUsuarios->Apellido = $_POST["lastname"];
        $dtoUsuarios->Usuario = $_POST["user"];
        $dtoUsuarios->Contrasena = $_POST["password"];
        $dtoUsuarios->IdTipoCargo = $_POST["selCombo"];
        $userResult  = $mapeo->agregarUsuario($dtoUsuarios);
        echo "<script>if(alert('Usuario creado con exito?')){ 
                document.location='../FrontApp/bienvenido.html';} 
                </script>"; 
         header('Location: ../FrontApp/bienvenido.html');       

            
      

        //$registro = new CRUDusuario;
       // $resultado = $registro -> agregarUsuario($clase);
    }
}
?>