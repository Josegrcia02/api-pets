<?php
$env = getenv('ENVIRONMENT') ?: 'PRODUCTION';
$section = strtoupper($env);

// Cargar archivo INI
$conf = parse_ini_file(__DIR__ . '/config.ini', true);

// PHP dentro de Docker siempre usa el contenedor backend
$base_url_php = "http://web:8080/";

// JS desde navegador
if ($env === 'DEVELOPMENT') {
    $base_url_php = "http://localhost:8080/";  // PHP server apuntando al backend local
    $js_api_url = "http://localhost:8080/";   // fetch desde navegador
} else {
    // En producción, usar la URL pública definida en INI
    $js_api_url = isset($conf[$section]['base_url']) ? $conf[$section]['base_url'] : "http://web:8080/";
}

// Definir constantes
define("BASE_URL", $base_url_php);  // PHP
define("JS_API_URL", $js_api_url);  // JS
?>
