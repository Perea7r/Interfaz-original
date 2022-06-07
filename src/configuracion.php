<?php

namespace DAW\CONFIG;
interface configuracion {
    public function addVar(string $name, string $value);
    public function deleteVar(string $name);
    public function modVar(string $name, string $value);
    public function readValue(string $name);
}
?>