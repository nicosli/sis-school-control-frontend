#Sis Control Escolar
![](https://img.shields.io/badge/Sis%20Control%20Escolar%20--%20Alpha-v1.0.0-blue.svg)

Sistema especializado para el control escolar, funcional para cualquier institución que requiera tener el dominio total de toda la información generada.


# Instalación
Clonar proyecto con git

`git clone git@bitbucket.org:nicosli85/sis-control-escolar.git`

Instalar dependencias de Laravel

`composer install`

Copiar el siguiente archivo de configuración en `config/api.php`

```php
<?php

return [
	'base_uri'      => 'http://local.controlescolarapi:8080/',
	'username'      => 'eduApi_clientId',
	'password'      => '3du4p100',
	'grant_type'    => 'password'
];
```


Instalar dependencias JS

`npm install & npm run dev`

Para poder usar **broserync** se deberá configurar en webpack.mix.js, agregar el mismo host en local (no versionar)

```javascript
mix.browserSync({
    open: 'external',
    host: 'local.siscontrolescolar',
    proxy: 'local.siscontrolescolar',
    port: 8585
});
```
#### Requerimientos del servidor
- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extensio
