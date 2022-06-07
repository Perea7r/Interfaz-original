<?php

namespace DAW\CONFIG;
interface configuracion {
    public function __construct();
    public function modificarArchivo();
    public function leerArchivo();
    public function crearArchivo();
    public function eliminarArchivo();
    public function añadirVariable();
    public function eliminarVariable();
    public function modificarVariable();
    public function leerValor();
}

?>