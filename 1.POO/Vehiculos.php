<?php

class Coche{

    //Propiedades o variables
    var $ruedas;
    var $color;
    var $motor;
    
    //Metodo Constructor. Inicializa los valores
    function Coche(){
        $this->color = "";
        $this->ruedas = 4;
        $this->motor = 1600;
    }
    
    //Metodos
    function arrancar(){
        echo "Estoy arrancando<br>";
    }
    function girar(){
        echo "Estoy girando<br>";
    }
    function frenar(){
        echo "Estoy frenando<br>";
    }
    function establecerColor($nombre_coche, $color_coche){
        $this->color = $color_coche;
        echo "El color del ".$nombre_coche." es ".$this->color."<br>";
    }
}

//---------------------------------------------------------------------


class Camion{

    //Propiedades o variables
    var $ruedas;
    var $color;
    var $motor;
    
    //Metodo Constructor. Inicializa los valores
    function Camion(){
        $this->color = "";
        $this->ruedas = 8;
        $this->motor = 2600;
    }
    
    //Metodos
    function arrancar(){
        echo "Estoy arrancando<br>";
    }
    function girar(){
        echo "Estoy girando<br>";
    }
    function frenar(){
        echo "Estoy frenando<br>";
    }
}