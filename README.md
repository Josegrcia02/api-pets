# 🛠️ Proyecto Dockerizado: API REST y Frontend
Este proyecto utiliza Docker Compose para orquestar una API REST de Spring Boot (backend), un Frontend de PHP/Apache y una Base de Datos PostgreSQL.

El proyecto se puede levantar en dos modos:

Modo Producción (Docker Completo): Todos los servicios se levantan en contenedores.

Modo Desarrollo (Local): Solo la base de datos se levanta en Docker, y el backend/frontend se inician directamente desde tu IDE/máquina local.

## 1. 🌐 Modo Producción (Docker Completo)
Este modo es ideal para entornos de staging, pruebas de integración o simulación de producción. Levanta los cuatro servicios definidos en docker-compose.yml.

🚀 Levantamiento
El comando usa el perfil prod para incluir los servicios web (API) y frontend, y carga las variables de entorno de producción.
```bash
docker compose --profile prod --env-file .env.prod up -d --build
```
2. 💻 Modo Desarrollo (Local)
Este modo es óptimo para desarrollar y debuggear el backend y el frontend directamente en tu máquina, mientras utilizas un contenedor de Docker para asegurar una base de datos PostgreSQL limpia y consistente.

🚀 Levantamiento de la DB (Solo PostgreSQL y pgAdmin)
Para este modo, solo necesitamos levantar los servicios que no tienen perfil (db y pgadmin). Es crucial usar el archivo .env.dev para asegurar que el puerto local de la DB (5433) sea el correcto, ya que tu API local se conectará a este puerto.

```bash
docker compose --env-file .env.dev up -d db pgadmin
```

**Nota: Al no especificar web ni frontend, Docker Compose solo levanta db y pgadmin.**

⚙️ Inicio de la Aplicación
API (Spring Boot): Inicia la API directamente desde tu IDE (como IntelliJ o VS Code). La aplicación buscará automáticamente el perfil dev y usará la configuración de conexión: jdbc:postgresql://localhost:5433/pets.

Frontend (PHP): Inicia tu servidor web o aplicación frontend local. El Frontend se conecta a la API de Spring Boot que está corriendo en tu máquina (http://localhost:8080).

Con cariño josegrrcia ewe
