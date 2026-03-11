<?php

Class Signature {
    private string $path;

    public function __construct( $path ) {
        $this->path = $path;
    }

    public function save($base64){

        if (!file_exists($this->path)) {
            echo "Directory does not exist: " . $this->path;
            return false;
        }
        
        $base64 = str_replace('data:image/png;base64,', '', $base64);
        $base64 = str_replace(' ', '+', $base64);

        $imageData = base64_decode($base64);
        $file = fopen(__DIR__ . "/signature.png", 'wb');
        
        if ($file) {
            fwrite($file, $imageData);
            fclose($file);
        } else {
            echo "Failed to create file.";
            return false;
        }
        return $this->path;
    }





}