# Biblioteca Orbys

Este proyecto es una aplicación de gestión de biblioteca que consta de un backend desarrollado con PHP, Symfony, MySQL y un frontend creado con React.

## Requisitos

- PHP 7.4 o superior
- Composer
- Symfony CLI
- Node.js y npm
- MySQL

## Configuración del Proyecto

### Configuración del Backend 

1. **Clonar el Repositorio**

   ```bash
   git clone https://github.com/kerrigan17/biblioteca_orbys.git
   cd biblioteca_orbys
2. **Instalar Dependencias de PHP**

Desde la raíz del proyecto, ejecuta:

    composer install


3. **Configurar el Entorno, Crear la Base de Datos y las Migraciones**

Tienes un archivo de volcado SQL llamado biblioteca.sql en la raíz del proyector, en el mismo archivo lo he configurado para que te cree toda la base de datos, incluyendo la misma base de datos, que se llama orbys_db, 
ejecuta el siguiente comando para importar la base de datos a tu ordenado:
**TIENES QUE CAMBIAR usuario POR TU NOMBRE DE USUARIO SQL Y LO MISMO CON LA CONTRASENYA**

    mysql -u usuario -p orbys_db < biblioteca.sql

Ahora para configurar Symfony en tu entorno, tienes que ir al archivo .env de la carpeta raiz y ajustar las variables de entorno segun tu dconfiguracion, especialmente las relacionadas con la base de datos.

    DATABASE_URL="mysql://usuario:contraseña@localhost:3306/orbys_db"

Tambien es SUPERIMPORTANTE que copies la url de tu base de datos ya configurada y la pongas en /config/packages/doctrine.yaml. Esta en la primera linea del archivo:
    dbal:
        url: 'mysql://usuario:contraseña@127.0.0.1:3306/orbys_db?serverVersion=8.0.32&charset=utf8mb4'

Antes de aplicar las migraciones, debes crear la base de datos:

    php bin/console doctrine:database:create

4. **Iniciar el Servidor de Symfony**

Para ello, puedes iniciar el servidor usando Symfony CLI, es la mejor manera:

    symfony server:start

Esto normalmente ejecutará el servidor en http://localhost:8000.

5. **Configuración del Frontend (React)**

La carpeta de frontend desde la raíz del proyecto:

    cd assets/react_app
    
6. **Instalar Dependencias de Node.js**

Ejecuta el siguiente comando para instalar las dependencias necesarias:

    npm install

7 **Ejecuta el servidor de desarrollo:**

    npm start

Esto normalmente abrirá el frontend en http://localhost:3000.

Una vez que ambos servidores están en funcionamiento, puedes navegar a http://localhost:3000  para ver la interfaz de usuario de la aplicación.
El frontend de React comunicará con el backend de Symfony para realizar operaciones CRUD sobre los libros, no he metido las imagenes.
