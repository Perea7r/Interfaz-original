<?php

namespace DAW\CONFIG;

class ini implements configuracion{
    private string $file;
    private array $parse;

    public function __construct($file){
        $this->file = $file;
        $this->parse = self::parseArrayToIni($file);
    }

    private static function parseArrayToIni($files){
        $ini = [];
        if (is_array($files)){
            
            foreach ($files as $file => $value){
                if (!is_numeric($file)){
                    $ini[] = "[". $file ."]". PHP_EOL;
                    if(is_array($value)){
                        $ini[] = self::parseArrayToIni($value);
                    }
                    $ini[]= $value . PHP_EOL;
                }
                $ini[]= $value . PHP_EOL;
            }
            return $ini;
        }
        if (is_string($files)){
            $ini[]= $files . PHP_EOL;
            return $ini;
        }

    }

    private static function parseStringToIni($files){
        $ini = "";
        if (is_array($files)){
            
            foreach ($files as $file => $value){
                if (!is_numeric($file)){
                    $ini .= "[". $file ."]". PHP_EOL;
                    if(is_array($value)){
                        $ini .= $this -> parseArrayToIni($value);
                    }
                    $ini .= $value . PHP_EOL;
                }
                $ini .= $value . PHP_EOL;
            }
            return $ini;
        }
        if (is_string($files)){
            $ini .= $files . PHP_EOL;
            return $ini;
        }

    }

    public function readArchive(){
        return print($this->parse);
    }

    public static function createArchive($file){
        return new ini($file);
    }

    public function deleteArchive(){
        unset($this->file);
        unset($this->parse);
    }

    public function addVar(string $atributte, string $value){
        $this->parse .= ";". $atributte . "=" . $value . PHP_EOL;
    }
    public function activeVar(string $atributte){
        $this->parse = str_replace(";". $atributte . "=", "", $this->parse);
    }
    public function deleteVar($atributte){
        foreach ($this->parse as $key => $value){
            if (str_contains($value, $atributte)){
                unset($this->parse[$key]);
            }
        }
    }
    public function modVar(string $name, string $value){
        $this->deleteVar($name);
        $this->addVar($name, $value);
    }
    public function readValue(string $name){
        foreach ($this->parse as $key => $value){
            if (str_contains($value, $name)){
                return $value;
            }
        }     
    }
}

?>