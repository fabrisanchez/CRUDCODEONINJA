<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Update a Record - PHP CRUD Tutorial</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1>Update Product</h1>
        </div>
 
        <!-- PHP read record by ID will be here -->
        <?php
            // get passed parameter value, in this case, the record ID
            // isset() is a PHP function used to verify if a value is there or not
            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
             
            //include database connection
            include 'Database.php';
            include 'Empleados.php';

            $database = new Database();
            $db = $database->getConnection();

            $item = new Empleados($db);
            
             
            // read current record's data
            try {
                $stmt =$item->getEmpleados1($id); 

                // store retrieved row to a variable
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
             
                // values to fill up our form
                $nombres = $row['nombres'];
                $apellidos = $row['apellidos'];
                $direccion = $row['direccion'];
                $telefono = $row['telefono'];
                $fechanac = $row['fechanac'];
            }

             
            // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
            ?>
 
        <?php

         include_once 'Database.php';
         include_once 'Empleados.php';

            $database = new Database();
            $db = $database->getConnection();

            $item = new Empleados($db);

    if($_POST){
     
    try{
        $stmt = $item->update();
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Registro Modificado correctamente.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }
 
    }
 
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Nombres</td>
            <td><input type='text' name='nombres' value="<?php echo htmlspecialchars($nombres, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Apellidos</td>
            <td><input type='text' name='apellidos' value="<?php echo htmlspecialchars($apellidos, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Direccion</td>
            <td><textarea name='direccion' class='form-control'><?php echo htmlspecialchars($direccion, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td><input type='text' name='telefono' value="<?php echo htmlspecialchars($telefono, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Fecha Nacimiento</td>
            <td><input type='text' name='fechanac' value="<?php echo htmlspecialchars($fechanac, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Guardar Cambios' class='btn btn-primary' />
                <a href='ListaEmpleados.php' class='btn btn-danger'>Regresar a la LIsta de Empleados</a>
            </td>
        </tr>
    </table>
</form>
        
 
    </div> <!-- end .container -->

 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>