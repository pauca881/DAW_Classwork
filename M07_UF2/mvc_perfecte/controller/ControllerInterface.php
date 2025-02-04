<?php
/**
 * Interface containing all the mandatory methods needed in a Controller object.
 * @author Luis Enrique, Christian Sastre, Julian Ortega, Pau López 
 */

interface ControllerInterface
{
    public function processRequest();
    public function add();
    public function modify();
    public function delete();
    public function listAll();
}