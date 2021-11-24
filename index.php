<?php 

include("conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP - SQL SERVER</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="col-md-8 col-md-offset-2">
        <h1>CRUD PHP SQL SERVER</h1>
        <form method="POST" action="index.php">
            <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre"><br>    
            </div>
            <div class="form-group">
                <label for="">Correo:</label>
                <input type="email" name="email" class="form-control" placeholder="Escriba su email"><br>    
            </div>
            <div class="form-group">
                <label for="">Contraseña:</label>
                <input type="password" name="passw" class="form-control" placeholder="Escriba su contraseña">    
            </div>
            <div class="form-group">
                <input type="submit" name="insert" class="btn btn-warning" value="Insertar Datos"><br>    
            </div>
        </form>
    </div>
    <?php 
    
    if(isset($_POST['insert'])){
        $usuario = $_POST['nombre'];
        $email = $_POST['email'];
        $pass = $_POST['passw'];

        $insertar = "INSERT INTO usuarios(usuario, correo, password) VALUES('$usuario','$email','$pass')";
        $ejecutar = odbc_exec($connection, $insertar);
        if($ejecutar){
            echo "<div class= alert alert-success>Registro Ingresado Correctamente</div>";
        }
    }
    
    ?>
    
    <div class="col-md-8 col-md-offset-2">
    <br><br>
        <table class="table table-bordered table-responsive">
            <tr align="center">
                <td>ID</td>
                <td>Nombre</td>
                <td>Correo</td>
                <td>Contraseña</td>
                <td>Acción</td>
                <td>Acción</td>
            </tr>
            <?php 
                $consulta = "SELECT * FROM usuarios";
                $ejecutar = odbc_exec($connection, $consulta);
                $i = 0;
                while($fila = odbc_fetch_array($ejecutar)){
                    $id = $fila['id'];
                    $usuario = $fila['usuario'];
                    $correo = $fila['correo'];
                    $password = $fila['password'];
                    $i++;
                
            ?>
            <tr align="center">
                <td><?php echo $id; ?></td>
                <td><?php echo $usuario; ?></td>
                <td><?php echo $correo; ?></td>
                <td><?php echo $password; ?></td>
                <td><a href="index.php?editar=<?php echo $id ?>" class="btn btn-success">Editar</a></td>
                <td><a href="index.php?borrar=<?php echo $id ?>" class="btn btn-danger">Borrar</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php 
        if(isset($_GET['editar'])){
            include("editar.php");
        }
    ?>

<?php 
        if(isset($_GET['borrar'])){
            $borrar_id = $_GET['borrar'];
            $borrar = "DELETE FROM usuarios WHERE id='$borrar_id'";

            $ejecutar = odbc_exec($connection, $borrar);
           
            if($ejecutar){
                echo "<script>alert('El usuario ha sido borrado')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }  
        }
    ?>
</body>
</html>