# App marketplace 

Esta aplicacion funciona con docker por lo tanto es la unica dependencia que se debe tener para su funcionamiento

### Configuración

Para la configuracion se debe tener en cuenta variables de entorno que son necesarias para la conexion con la pasarela de pagos, estas variables son las siguientes:

* PLACETOPAY_LOGIN
* PLACETOPAY_SECRET_KEY
* PLACETOPAY_URL

En la raíz del proyecto existe un archivo llamado **.env.example**, este archivo se debe copiar y el archivo copia se le debe cambiar el nombre por **.env**

Una vez que se a realizado la configuración se debe ejecutar el proyecto mediante el siguiente comando
``docker-compose up -d``