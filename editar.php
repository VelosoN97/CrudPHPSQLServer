<?php 
        if(isset($_GET['editar'])){
            $editar_id = $_GET['editar'];
            $consulta = "SELECT * FROM usuarios WHERE id='$editar_id'";
            $ejecutar = odbc_exec($connection, $consulta);
            $fila = odbc_fetch_array($ejecutar);
            $usuario = $fila['usuario'];
            $correo = $fila['correo'];
            $password = $fila['password'];
        }
    ?>

<br>

<div class="col-md-8 col-md-offset-2">
        <form method="POST" action="">
            <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $usuario ?>"><br>    
            </div>
            <div class="form-group">
                <label for="">Correo:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $correo ?>"><br>    
            </div>
            <div class="form-group">
                <label for="">Contraseña:</label>
                <input type="password" name="passw" class="form-control" value="<?php echo $password ?>">    
            </div>
            <div class="form-group">
                <input type="submit" name="actualizar" class="btn btn-warning" value="Actualizar Datos"><br>    
            </div>
        </form>
    </div>

    <?php
        if(isset($_POST['actualizar'])){
            $actualizar_nombre = $_POST['nombre'];
            $actualizar_correo = $_POST['email'];
            $actualizar_password = $_POST['passw'];

            $consulta = "UPDATE usuarios SET usuario='$actualizar_nombre', correo='$actualizar_correo', password='$actualizar_password' 
            WHERE id='$editar_id'";
            $ejecutar = odbc_exec($connection, $consulta);
            if($ejecutar){
                echo "<script>alert('Datos actualizados')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }  
        }
    ?>