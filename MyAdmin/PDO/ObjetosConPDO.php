<?php
class Alumno
{
    public $codalumno;
    public $Nombre;
    public $Direccion;
    public $Localidad;
    public $DNI;

    public function __construct($codalumno, $Nombre, $Direccion, $Localidad, $DNI)
    {
        $this->codalumno = $codalumno;
        $this->Nombre = $Nombre;
        $this->Direccion = $Direccion;
        $this->Localidad = $Localidad;
        $this->DNI = $DNI;
    }
    // ....Código de la clase....
}

// Crear una nueva instancia de Alumno
//$alumno = new Alumno("12", "Cristina Aguilera", "C/Parque Europa, 45", "Madrid", "12121212L");
//$alumno = new Alumno("13", "Manolo Fernández", "C/Marmitaco, 45", "Euskadi", "13131313M");
$alumno = new Alumno("14", "Fernando Navarro", "C/Desengaño, 21", "Madrid", "14141414N");

// Conectar a la base de datos
try {
    $mbd = new PDO('mysql:host=localhost;dbname=prueba1', 'prueba1', 'prueba1');
    $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para manejar errores

    // Preparar la consulta SQL
    $stmt = $mbd->prepare("INSERT INTO alumno (codalumno, Nombre, Direccion, Localidad, DNI) 
                           VALUES (:codalumno, :Nombre, :Direccion, :Localidad, :DNI)");

    // Ejecutar la consulta con los parámetros del objeto
    if ($stmt->execute((array)$alumno)) {
        echo "Se ha creado un nuevo registro!";
    }
} catch (PDOException $e) {
    // Manejo de errores
    echo "¡Error!: " . $e->getMessage();
    die();
}
