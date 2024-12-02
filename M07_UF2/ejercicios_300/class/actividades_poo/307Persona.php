<?php

class Persona {

    protected string $nombre;
    protected string $apellidos;

    public function __construct(string $nombre, string $apellidos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function getNombreCompleto(): string {
        return $this->nombre . " " . $this->apellidos;
    }
}

class Empleado extends Persona {

    private static float $sueldoTope = 3333;
    private float $sueldo;
    private array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, float $sueldo = 1000) {
        parent::__construct($nombre, $apellidos);  
        $this->sueldo = $sueldo;
    }

    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
    }

    public function getTelefonos(): array {
        return $this->telefonos;
    }

    public function anyadirTelefono(int $telefono): void {
        $this->telefonos[] = $telefono;
    }

    public function vaciarTelefonos(): void {
        $this->telefonos = [];
    }

    public static function getSueldoTope(): float {
        return self::$sueldoTope;
    }

    public static function setSueldoTope(float $nuevoSueldoTope): void {
        self::$sueldoTope = $nuevoSueldoTope;
    }

    public static function toHtml(Empleado $emp): string {

        $nombreCompleto = $emp->getNombreCompleto();
        $sueldo = $emp->getSueldo();
        $telefonos = $emp->getTelefonos();

        $html = "<p>Empleado: $nombreCompleto Sueldo: $sueldo</p>";

        //count(array) es para contar numero elementos de un array
        
        if (count($telefonos) > 0) {

            $html .= "<p>Teléfonos: ";
            foreach ($telefonos as $telefono) {
                $html .= "<p>$telefono</p>";
            }
            $html .= "</p>";
        }


        return $html;
    }
}
