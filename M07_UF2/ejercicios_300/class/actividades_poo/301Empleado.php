<?php
class Empleado{

    private string $nombre;
    private string $apellido;
    private int $sueldo;
    private array $telefonos;


    //constructor
    public function __construct(string $nombre, string $apellido, int $sueldo){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->sueldo=$sueldo;
    }

    

    //getter personalizados
    public function getNombreCompleto():string{
        return $this->nombre.' '.$this->apellido;
    }

    public function debePagarTributos():bool{
        return $this->sueldo>3333;
    }

    //getters y setters

    public function getNombre():string{
        return $this->nombre;
    }
    public function setNombre(string $nombre){
        $this->nombre=$nombre;
    }
    public function getApellido():string{
        return $this->apellido;
    }
    public function setApellido(string $apellido){
        $this->apellido=$apellido;
    }
    public function getSueldo():int{
        return $this->sueldo;
    }
    public function setSueldo(int $sueldo){
        $this->sueldo=$sueldo;
    }

}

?>