<?php 

abstract class Persona {

    protected  $nombre;
    protected  $apellidos;
    protected  $edad;

    public function __construct(string $nombre, string $apellidos, int $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }
    
}

abstract class Trabajador extends Persona{

    private array $telefonos = [];

    abstract public function calcularSueldo(): bool{}

    public function debePagarImpuestos():bool{}

    
}

class Empleado extends Trabajador {

    private int $horasTrabajadas;
    private int $precioPorHora; 

    public function calcularSueldo(): bool{


    }



}

class Gerente extends Trabajador{

    private int $salarios;

}

?>