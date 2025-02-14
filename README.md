# 204DWESAplicacionFinal

## Asignatura: Desarrollo Web en Entorno Servidor

- **Autor**: Alex Asensio Sanchez
- **Fecha Inicio Proyecto**: 18/12/2024
- **Última Actualización**: 24/01/2025

---

## Descripción

Proyecto multicapa de login logoff

---

## Funcionalidades
        
    -Conectarse a una base de datos
    -Ejecutar sentencias sobre esta base de datos
    -Procesar objetos devueltos por dichas sentencias
    -Gestion de errores

---

## Requisitos

- **PHP 8.3**
- **MySQL 8.0**

---

## Subir a Docker
Pasos a seguir para subir esta aplicacion a Docker:

-Abrir docker desktop 
-Acceder a la terminal 
-Navegar hasta el directorio de nuestra aplicacion (en el que se encuentran los archivos Dockerfile y docker-compose.yaml
-Ejecutar el comando "docker compose up -d"
-Ejecutar la imagen del contenedor, se activarán la aplicacion y la base de datos
-Ejecutar el comando "docker exec -it db_aplicacion_final mysql -u root -p" para acceder a la base de datos
-Crear el usuario y tablas para la aplicacion (lo mismo que los archivos crea y carga del directorio scriptDB)
-Acceder a la aplicacion mediante localhost:8080 en el navegador

---

## Abrir aplicacion en Docker

-Abrir docker desktop 
-Ejecutar la imagen del contenedor, se activarán la aplicacion y la base de datos
-Acceder a la aplicacion mediante localhost:8080 en el navegador