<?php

Class Signature {
    private string $path;

    public function __construct( $path ) {
        $this->path = $path;
    }

    public function save($base64){

        $base64 = str_replace('data:image/png;base64,', '', $base64);
        $base64 = str_replace(' ', '+', $base64);

        $imageData = base64_decode($base64);
        file_put_contents($this->path, $imageData);

        return $this->path;
    }



}