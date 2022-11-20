<?php


class Empleados{

    //Coneexion 

    private $conn;
    private $tablename = "empleados";


    public $nombres;
    public $apellidos;
    public $direccion;
    public $telefono;
    public $fechanac;


    // Construuctor de Clase
    
    public function __construct($db)
    {
        $this->conn = $db;
    }


      public function getEmpleados(){
            $sqlQuery = "SELECT id, nombres, apellidos, direccion, telefono, fechanac FROM " . $this->tablename . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        public function getEmpleados1($id){
            $query = "SELECT id, nombres, apellidos, direccion, telefono, fechanac FROM empleados ".$this->tablename." WHERE id = ? LIMIT 0,1";
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt;
        }

        public function delete(){
             
            // get record ID
            // isset() is a PHP function used to verify if a value is there or not
            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
         
            // delete query
            $query = "DELETE FROM ".$this->tablename." WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            return $stmt;
        }



        public function update(){
             $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
             $query = "UPDATE ".$this->tablename." 
                                                  SET nombres=:nombres,
                                                      apellidos=:apellidos,
                                                      direccion=:direccion, 
                                                      telefono=:telefono, 
                                                      fechanac=:fechanac WHERE id = :id";
 
        // prepare query for excecution
        $stmt = $this->conn->prepare($query);
 
        // posted values

        $nombres=htmlspecialchars(strip_tags($_POST['nombres']));
        $apellidos=htmlspecialchars(strip_tags($_POST['apellidos']));
        $direccion=htmlspecialchars(strip_tags($_POST['direccion']));
        $telefono=htmlspecialchars(strip_tags($_POST['telefono']));
        $fechanac=htmlspecialchars(strip_tags($_POST['fechanac']));
 
        // bind the parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fechanac', $fechanac);
     
 
        return $stmt;
        }



    

    // Crear empleado
        public function createEmpleado(){
            $sqlQuery = "INSERT INTO
                        ". $this->tablename ."
                    SET
                    nombres = :nombres, 
                    apellidos = :apellidos, 
                    direccion = :direccion,
                    telefono = :telefono,
                    fechanac = :fechanac"; 
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nombres=htmlspecialchars(strip_tags($this->nombres));
            $this->apellidos=htmlspecialchars(strip_tags($this->apellidos));
            $this->direccion=htmlspecialchars(strip_tags($this->direccion));
            $this->telefono=htmlspecialchars(strip_tags($this->telefono));
            $this->fechanac=htmlspecialchars(strip_tags($this->fechanac));

          
        
            // bind data
            $stmt->bindParam(":nombres", $this->nombres);
            $stmt->bindParam(":apellidos", $this->apellidos);
            $stmt->bindParam(":direccion", $this->direccion);
            $stmt->bindParam(":telefono", $this->telefono);
            $stmt->bindParam(":fechanac", $this->fechanac);

           
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
}

?> 