# App marketplace 

Esta aplicación permite a un usuario comprar un producto logrando realizar el pago a traves de la 
pasarela de pagos PlaceToPay.

La implementación de esta aplicación utiliza docker por lo tanto es la única dependencia que se debe tener instalada para poner en funcionamiento la aplicación.

### Configuración

Para la configuración se debe tener en cuenta variables de entorno que son necesarias para la conexión con la pasarela de pagos, estas variables son las siguientes:

* PLACETOPAY_LOGIN
* PLACETOPAY_SECRET_KEY
* PLACETOPAY_URL

En la raíz del proyecto existe un archivo llamado **.env.example**, este archivo se debe copiar y el archivo copia se le debe nombrar como **.env**

Una vez que se a realizado la configuración se debe ejecutar el proyecto mediante el siguiente comando
``docker-compose up -d``

Luego acceder por un navegador web e ingresar a http://localhost/

La siguiente imagen muestra el flujo de funcionamiento de la aplicación

![alt text](https://github.com/yeisonLucio/marketplace-app/blob/master/marketplace.jpg?raw=true)