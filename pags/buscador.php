<?php
error_reporting(0);
$palabra=$_POST['q'];// Podemos mostrar / trabajar con todas las líneas:
$directorio = opendir("."); //ruta actual
$array;
$i=1;
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (!is_dir($archivo))//verificamos si es o no un directorio
    {
    	$lineas = file($archivo);
    	foreach($lineas as $linea){
    		if (strstr(strtolower($linea),strtolower($palabra))){
    			$nombre=str_replace(".html", "", $archivo);
    			$array[$i]="<a href='".$archivo . "' style='text-decoration:none' ><span class='uk-text-success'>".$nombre . "</span></a><br />";
    			//echo "<a href='pags/".$archivo . "'>".$nombre . "</a> <br />";
    			$i++;
    		}

    	}
    }
}

$lista_simple = array_values(array_unique($array));
foreach($lista_simple as $valor) {
echo $valor." ";
}
?>



