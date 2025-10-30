<?php

class configDB {

     private static PDO $instance;
     private static $host;
     private static $user;
     private static $pass;


     public function __construct(){
        //Compruebo si esta inicilizado
        if(!isset(self::$instance)){
            //recuperar los valores del .ini
            $this->getValues();

            //Crear la conexion
            $this->connect();
        }
     }

     private function connect(){
        self::$instance = new PDO(self::$host,self::$user,self::$pass);
     }

     private function getValues(){
        // 1. Obtener la variable de entorno. Por defecto, 'PRODUCTION'.
        $env = getenv('ENVIRONMENT') ?: 'PRODUCTION';
        $section = strtoupper($env); // 'DEVELOPMENT' o 'PRODUCTION'

        // 2. Cargar el archivo INI con las secciones
        $conf =  parse_ini_file('config.ini', true); // El 'true' es clave para leer secciones

        // 3. Cargar los valores de la sección
        if (isset($conf[$section])) {
            self::$host = $conf[$section]['host'];
            self::$user = $conf[$section]['user'];
            self::$pass = $conf[$section]['pass'];
        } else {
             throw new Exception("Configuración para el entorno $section no encontrada.");
        }
     }
}

     /**
      * Get the value of instance
      */ 
     public function getInstance()
     {
          return self::$instance;
     }
}

?>