<?php
class Empleado {
    private array $telefonos = [];

    // Constructor con promoción de propiedades ( PHP 8.1 )
    public function __construct(
        private readonly string $nombre,
        private readonly string $apellidos,
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

    // Métodos adicionales
    public function getNombreCompleto(): string {
        return $this->nombre . " " . $this->apellidos;
    }

    public function debePagarImpuestos(): bool {
        return $this->sueldo > 3333;
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