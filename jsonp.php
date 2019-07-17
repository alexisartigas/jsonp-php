<?php
// https://parzibyte.me/blog
if (!isset($_GET["callback"]) || !isset($_GET["peticion"])) {
    exit("No hay parámetros");
}

// Obtener datos que el cliente necesita

$callback = $_GET["callback"];
$peticion = $_GET["peticion"];

// Los datos que vamos a regresar
$datos = array();
// Nota: los datos podrían ser objetos, arreglos, cadenas, etcétera
// Y podrían venir de una base de datos o de cualquier otro lugar
if ($peticion == "ventas") {
    $datos = array("Una venta", "Otra venta");
} else if ($peticion == "clientes") {
    $datos = array(
        array(
            "nombre" => "Luis",
            "fecha_registro" => "2019-07-17",
        ),
        array(
            "nombre" => "María José",
            "fecha_registro" => "2019-07-18",
        ),
    );
} else {
    exit("Petición incorrecta");
}
// Se supone que vamos a regresar un script de JS ;)
header("Content-type: application/javascript");
// Ahora codificamos los datos
$datosCodificados = json_encode($datos);

// Y escribimos literalmente código de JavaScript con PHP
$respuesta = "$callback($datosCodificados)";
// Salida: algo como
// procesarClientes([{"nombre":"Luis","fecha_registro":"2019-07-17"},{"nombre":"Mar\u00eda Jos\u00e9","fecha_registro":"2019-07-18"}])

// La escribimos
echo $respuesta;
// Listo, no hay que imprimir nada más
