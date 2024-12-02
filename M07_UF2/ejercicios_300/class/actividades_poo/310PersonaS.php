<?php
class Persona {

    protected string $nombre;
    protected string $apellidos;
    protected int $edad;

    public function __construct(string $nombre, string $apellidos, int $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
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

    public function getEdad(): int {
        return $this->edad;
    }

    public function setEdad(int $edad): void {
        $this->edad = $edad;
    }

    public function __toString(): string {
        return "Persona: {$this->getNombreCompleto()}, Edad: {$this->getEdad()}";
    }
}

class Empleado extends Persona {

    private static float $sueldoTope = 3333;
    private float $sueldo;
    private array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, int $edad, float $sueldo = 1000) {
        parent::__construct($nombre, $apellidos, $edad);
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

    public function debePagarImpuestos(): bool {
        return $this->getEdad() > 21 && $this->getSueldo() > self::$sueldoTope;
    }

    //metodo string pendiente de hacer
    public function __toString(): string {

        return "Nombre: " . $this->nombre . PHP_EOL . "Edad: " . $this->edad . PHP_EOL;

        

    }
}
