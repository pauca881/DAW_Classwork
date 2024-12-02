<?php
//Transforma Persona a una clase abstracta donde su método estático 
//toHtml(Persona $p) tenga que ser redefinido en todos sus hijos.

abstract class Persona{

    public static abstract function toHtml(Persona $p);

} 

class Empleado extends Persona{

    private $nombre;
    private $edad;

    public function __construct(string $nombre, int $edad){
        $this->nombre=$nombre;
        $this->edad=$edad;
        }

        public static function toHtml(Persona $p) {
            if ($p instanceof Empleado) {

                return "<p>Empleado: " . $p->nombre . " - Edad: " . $p->edad . "</p>";

            }
            return "<p>no existeix persona</p>";
        }

}


$bruno = new Empleado("Bruno", 30);
echo Empleado::toHtml($bruno);



?>