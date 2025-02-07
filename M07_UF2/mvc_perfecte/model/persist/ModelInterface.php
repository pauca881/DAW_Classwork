<?php

/**
 * Interfaz que contiene todos los métodos obligatorios necesarios en un objeto Modelo.
 */
interface ModelInterface
{
    public function add($object);
    public function modify($object);
    public function delete($id);
    public function searchById($id);
    public function listAll();
}