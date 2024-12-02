<?php
class Empleado {
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos = [];

    // Los getters y setters anteriores se mantienen...

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