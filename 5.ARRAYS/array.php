<?php
#################### ARRAY INDEXADO #######################

//Creamos un array con 3 elementos.
//No es necesario poner el indice.
//Si no se pone el entiende que es la ultima.
$semana[] = "Lunes";        // = $semana[0] = "Lunes";
$semana[] = "Martes";       // = $semana[1] = "Martes";
$semana[] = "Miercoles";    // = $semana[3] = "Miercoles";

//Para añadir un elemento mas al array
$semana[] = "Jueves";

//Muestra el valor 1 del array
echo "El elemento 1 del array es: ".$semana[1]."<br>";

//Recorremos el array
for($i = 0; $i < count($semana); $i++){
        echo $semana[$i]."<br>";
}

###################### OTRA FORMA #########################
#
$nombres = array("Jon", "Laura", "Thor");

//Muestra el valor 1 del array
echo "<br>El elemento 1 del array es: ".$nombres[1]."<br>"; //Laura

//Para añadir un elemento mas al array
$nombres[] = "Miniyo";

//Recorremos el array
for($i = 0; $i < count($nombres); $i++){
        echo $nombres[$i]."<br>";
}

################### ARRAY ASOCIATIVO ######################

$datos = array(
    "Nombre" => "Jon Ander",
    "Apellido" => "Ochoa",
    "Direccion" => "Mugarra",
    "Telefono" => "676728438"
);

//Muestra el valor Apellido del array
echo "<br>El elemento Apellido del array es: ".$datos["Apellido"]."<br>";

//Añadir un elemento mas al array
$datos["País"] = "España";

//Funcion para saber si es un array o no
if( is_array($datos) ){
    echo '$datos es un array<br>';

    //Recoger el array con un foreach
    foreach ($datos as $clave=>$valor){
        echo "A $clave le corresponde $valor<br>";
    }    

}else{
    echo '$datos no es un array';
}
echo "<br>";

########################## ORDENANDO ALFABETICAMENTE #####################

//Creamos el array
$marcas = array("ASUS", "TOSHIBA", "HP", "IBM", "DELL", "ACER", "LENOVO");

//Lo ordenamos
sort($marcas);

//Mostramos el resultado
foreach ($marcas as $clave){
    echo $clave."<br>";
}

echo "<br>";

########################## ARRAY MULTIDIMENSIONAL #####################

$alimentos = array(
    "fruta" => array(   "tropical"  => "kiwi",
                        "citricos"  => "mandarina",
                        "otros"     => "manzana"),
    "leche" => array(   "animal"    => "vaca",
                        "vegetal"   => "coco"), 
    "carne" => array(   "vacuno"    => "lomo",
                        "porcino"   => "pata")
    );

//Para mostrar uno
echo "La fruta tropical es: ".$alimentos["fruta"]["tropical"]."<br><br>";

//Recorremos la 1º d
foreach($alimentos as $clave_alim => $alim){
    //Muestra la clave de la 1º d
    echo "$clave_alim:<br>";
    //alim es el valor de la 1º d (el array de la 2º d)
    //Por cada valor de la 1º d, mientras halla elementos en la lista, 
    //desdobla en su clave y valor (la 2º d del array)
    while (list($clave, $valor)=each($alim)){
        //Muestra la clave valor de la 2º d
        echo "$clave = $valor<br>";
    }
    echo "<br>";  
}

//var_dump($alim);