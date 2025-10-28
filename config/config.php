<?php
    $env = getenv('ENVIRONMENT') ?: 'PRODUCTION';
    $section = strtoupper($env);

    // Cargar el archivo INI con secciones
    $conf =  parse_ini_file('config.ini', true);

    if(isset($conf[$section]['base_url'])){
        define("BASE_URL", $conf[$section]['base_url']);
    } else {
        // Fallback o manejo de error si BASE_URL no está en la sección
        define("BASE_URL", "/"); 
    }
?>