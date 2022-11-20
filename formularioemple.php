<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
     <h2>INGRESO DE EMPLEADOS</h2>
     <h2>Complete los siguientes campos:</h2>

    <form action="crearemple.php" method="POST">

            <div class= "mb-3 mt-3">
            <label>Nombres:</label>
            <input type="text" name="nombres" class="form-control " placeholder="Ingrese nombres:">
            </div>
        
            <div class= "mb-3 mt-3">
            <label>Apellidos:</label>
            <input type="text" name="apellidos" class="form-control " placeholder="Ingrese apellidos:">
            </div>

        
            <div class= "mb-3 mt-3">
            <label>Direccion:</label>
            <input type="text" name="direccion" class="form-control " placeholder="Ingrese la direccion:">
            </div>

            <div class= "mb-3 mt-3">
            <label>Telefono:</label>
            <input type="text" name="telefono" class="form-control " placeholder="Ingrese numero telefonico:">
            </div>

            <div class= "mb-3 mt-3">
            <label>Fecha Nacimiento:</label>
            <input type="date" name="fechanac">
            </div>
            </br>
 

            </div>
         <input type="submit" name="Enviar"class="btn btn-primary">

     </form>

    </div>
 </body>
</html>