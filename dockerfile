FROM maven:3.9.9-eclipse-temurin-17

WORKDIR /app

# Copiamos el pom.xml y las dependencias primero
COPY pom.xml .
RUN mvn dependency:go-offline

# Copiamos el código fuente
COPY src /app/src

# (Opcional) Compila la app si quieres dejarla ya lista
RUN mvn package -DskipTests

# Expone el puerto de Spring Boot
EXPOSE 8080

# Puedes ejecutar directamente con Maven:
CMD ["mvn", "spring-boot:run"]
