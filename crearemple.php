<?php

include_once 'Database.php';
include_once 'Empleados.php';


$database = new Database();
$db = $database->getConnection();

$item = new Empleados($db);
	 	

if (isset($_POST['nombres']) && 
    isset($_POST['apellidos']) &&
    isset($_POST['direccion']) &&
    isset($_POST['telefono']) &&
    isset($_POST['fechanac']))
{

		$nombres = $_POST['nombres'];
	    $apellidos = $_POST['apellidos'];
	     $direccion = $_POST['direccion'];
	    $telefono = $_POST['telefono'];
	    $fechanac = $_POST['fechanac'];




        $item->nombres = $nombres;
        $item->apellidos= $apellidos;
        $item->direccion = $telefono;
        $item->telefono = $telefono;
        $item->fechanac= $fechanac;




	if($item->createEmpleado())
	{
		echo "Se Ingreso correctamente";
		echo "<br>";
		echo "<a href='formularioemple.php'>REGRESAR ATRAS</a>";
	}else
 	{
 		echo "El empleado no se ingreso.";
 	}
   }else{
	echo "<br>";
	echo "ERROR, the ejecution is stop";
}
?>