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

    public static function toHtml(Empleado $emp): string {
        
        //Obtengo datos
        $nombreCompleto = $emp->getNombreCompleto();
        $sueldo = $emp->getSueldo();
        $telefonos = $emp->getTelefonos();

        // creo una variable con al info del HTML
        $html = "<p><strong>Empleado:</strong> $nombreCompleto <strong>Sueldo:</strong> $sueldo</p>";

        if (count($telefonos) > 0) {
            $html .= "<p><strong>Teléfonos:</strong></p><ol>";

            foreach ($telefonos as $telefono) {
                $html .= "<li>$telefono</li>";
            }
            $html .= "</ol>";
        }

        return $html;
        
    }


}