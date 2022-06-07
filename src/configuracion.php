<?php

namespace DAW\CONFIG;
interface configuracion {
    public function __construct();
    public function modArchive(string $file, string $content):bool;
    public function readArchive(string $file):bool;
    public function createArchive(string $file):string;
    public function deleteArchive(string $file):bool;

    public function addVar($name, $value):bool;
    public function deleteVar($name):bool;
    public function modVar($name, $value):bool;
    public function readValue($name):string;
}

?>