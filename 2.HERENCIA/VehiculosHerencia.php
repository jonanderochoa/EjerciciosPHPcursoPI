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

//Camion hereda de Coche consiguiendo todas las propiedades y metodos
//de la clase Coche
class Camion extends Coche{
    
    //Metodo Constructor. Inicializa los valores
    function Camion(){
        $this->color = "";
        $this->ruedas = 8;
        $this->motor = 2600;
    }
    //Sobreescribimos el metodo de la clase Coche
    function establecerColor($nombre_camion, $color_camion){
        $this->color = $color_camion;
        echo "El color del ".$nombre_camion." es ".$this->color."<br>";
    }
    
    //Vamos a añadir algo a el metodo arrancar de la clase Coche
    function arrancar(){
        //Con esta sentencia hacemos que se ejecute el metodo de
        //arrancar de la clase padre
        parent::arrancar();
        //Al acabar de ejecutarse el metodo de la clase padre
        //le añadimos otro echo
        echo "El camion ha arrancado<br>";
    }
}