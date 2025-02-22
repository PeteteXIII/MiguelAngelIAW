<?php
// ejecutar la funcion mysqli() -> conectarme a una Base de Datos con unos permisos determinados
// hay que decirlo 4 cosas:
// 1. Servidor al que me conecto(localhost) 2. Usuario de la BD (root) 3. pass () 4. Nombre de la BD (instituto)

/* define("username", "root");
define("password", "");
define("database", "instituto");
define("server", "localhost"); */


const username = "root";
const password = "";
const database = "instituto";
const host = "localhost";

// ejecutar la funcion mysqli(server, username, password, database); -> conectarme a una Base de Datos con unos permisos determinados
$connection = new mysqli(host, username, password, database);
if ($connection->connect_error) {
    echo "Conexión erronea";
    die("error en la conexion " . $connection->connect_error);
} else {
    echo "Conexión realizada con exito";
}

?>