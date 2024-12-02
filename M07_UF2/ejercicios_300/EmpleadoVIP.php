<?php

include_once "Empleado.php";

class EmpleadoVIP extends Empleado {

    private array $telefonos = [];

    public function __construct(string $nombre, string $apellido, int $sueldo, array $telefonos) {

        parent::__construct($nombre, $apellido, $sueldo);
        $this->telefonos = $telefonos;

    }

    // Métodos
    public function anyadirTelefono(int $telefono): void {

        $this->telefonos[] = $telefono;

    }

    public function listarTelefonos(): string {

        return implode(", ", $this->telefonos);

    }



    
}

 ?>