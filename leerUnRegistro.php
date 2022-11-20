<!DOCTYPE HTML>
<html>
<head>
    <title>LEER UN REGISTRO</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1>Leer Empleado</h1>
        </div>
 
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
                        $id = $row['id'];
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
 
        <!--we have our html table here where the record will be displayed-->
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>ID</td>
                <td><?php echo htmlspecialchars($id, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><?php echo htmlspecialchars($nombres, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><?php echo htmlspecialchars($apellidos, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><?php echo htmlspecialchars($direccion, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><?php echo htmlspecialchars($telefono, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Fecha de Nacimiento</td>
                <td><?php echo htmlspecialchars($fechanac, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href='ListaEmpleados.php' class='btn btn-danger'>Regresar a la Lista de Empleados</a>
                </td>
            </tr>
        </table>
 
    </div> <!-- end .container -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>