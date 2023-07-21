# Proyecto Smart Info

Este es el repositorio de la pruba Smart Info.

## Requisitos previos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes en tu sistema:

- PHP 7.2 o superior
- Composer
- Servidor web (por ejemplo, Apache o Nginx)
- Base de datos MySQL

## Instalación

1. Clona este repositorio en tu directorio de proyectos local.

```bash
git clone https://github.com/sergiovegam41/TestSmarInfo_
cd TestSmarInfo_
```

2. Configura la conexión con la base de datos.

Renombra el archivo `.env.example` en el directorio `lib` a `.env` y abrelo en tu editor de texto favorito. A continuación, configura los valores de conexión a la base de datos según tu entorno:

```env
DATABASE_HOST=localhost
DATABASE_PORT=3306
DATABASE_NAME=smart_info
DATABASE_USER=root
DATABASE_PASSWORD=
```

3. Importa la base de datos.

En el directorio principal del proyecto, encontrarás un archivo llamado `smart_info_database.sql`. Importa este archivo en tu base de datos MySQL para crear la estructura de la base de datos necesaria para la aplicación.

4. Instala las dependencias.

Ejecuta el siguiente comando para instalar las dependencias del proyecto utilizando Composer:

```bash
composer install
```

## Ejecución

Una vez que hayas completado los pasos de instalación, ya puedes ejecutar el proyecto en tu servidor local. Asegúrate de que el servidor web y el servidor de base de datos estén en funcionamiento.

Accede al proyecto en tu navegador web utilizando la URL local de tu servidor. Por ejemplo, si estás utilizando Apache, la URL podría ser `http://TestSmarInfo_.test`.

## Contribución

Si deseas contribuir a este proyecto, ¡estamos abiertos a recibir tus contribuciones! Por favor, sigue las pautas de contribución en el archivo CONTRIBUTING.md.


## Contacto

Si tienes alguna pregunta o consulta, no dudes en contactarnos a través del correo electrónico sergiovegam41@gmail.com
