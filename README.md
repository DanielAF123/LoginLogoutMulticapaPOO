# LoginLogoutMulticapaPOO

## Comenzando 🚀
Guia de instalación de entorne de desarrollo

### Pre-requisitos 📋
Maquina ubuntu-server 
conexión a internet en la maquina

### Instalación 🔧

### Apache 

Instalamos Apache

```
sudo apt install apache
```

Comprobamos si esta funcionando

```
sudo servicie apache2 status
```
### Configuración Apache
### Control de servicio
Iniciar Apache 
```
sudo service apache2 start 
```
Detener Apache 
```
sudo service apache2 stop
```
Reiniciar Apache 
```
sudo service apache2 restart 
```
Estatus Apache 
```
sudo service apache2 status
```
### Instalación Mysql
Comando de instalación
```
sudo apt install mysql-server
```
### Configuración Mysql
Entramos en Mysql
```
sudo mysql -u root -p
```
Cremos un usuario para poder manejar la aplicación sin el root
```
CREATE USER 'nombre_usuario'@'localhost' IDENTIFIED BY 'tu_contrasena';
```
Le damos permisos
```
GRANT ALL PRIVILEGES ON * . * TO 'nombre_usuario'@'localhost';
```
Actualizamos los privilegios
```
flush privileges;
```
### Instalación modulo php 
Comando de instalación
```
sudo apt-get install php
```
Para comprobar que tenemos instalado nustro modulo de php debemos de realizar una prueba sobre nuestro servidor como la de intentar ejecutar el phpinfo() en un fichero php.
### Instalación phpMyadmin
Comando instalación
```
sudo apt-get install phpmyadmin php-mbstring php-gettext
```
A mayores tendremos que crear un enlace simbólico del fichero de configuración de phpmuadmin con el servidor apache.
```
cd /etc/apache2/conf-enabled
sudo ln -s  /etc/phpmyadmin/apache.conf   phpmyadmin.conf
sudo service apache2 restart
```
