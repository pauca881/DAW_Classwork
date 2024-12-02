<?php
class Empleado {


    private static float $sueldo_tope = 3333;
    
    private array $telefonos = [];
    
    public function __construct(
        private string $nombre,
        private string $apellidos,
        private float $sueldo = 1000
    ) {}

    // Getters
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }
    
    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
    }

    public function getNombreCompleto(): string {
        return $this->nombre . " " . $this->apellidos;
    }

    // public function debePagarImpuestos(): bool {
    //     return $this->sueldo > self::SUELDO_TOPE;
    // }

     // Modificado para usar la propiedad estática
     public function debePagarImpuestos(): bool {
        return $this->sueldo > self::$sueldoTope;
    }

    // Getter para la propiedad estática sueldoTope
    public static function getSueldoTope(): float {
        return self::$sueldoTope;
    }

    // Setter para la propiedad estática sueldoTope
    public static function setSueldoTope(float $nuevoSueldoTope): void {
        self::$sueldoTope = $nuevoSueldoTope;
    }

    public function anyadirTelefono(int $telefono): void {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): string {
        return implode(", ", $this->telefonos);
    }

    public function vaciarTelefonos(): void {
        $this->telefonos = [];
    }
}