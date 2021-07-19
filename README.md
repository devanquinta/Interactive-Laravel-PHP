<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
<br>
<hr>
<h1>Documentação em construção</h1>
<hr>
<h5>LARAVEL stable v8.50.0</h5>
<p>https://packagist.org/packages/laravel/framework</p>
<br>
<h2>Interactive</h2>
<br>
<h5>Recursos:<h5>
<p>Instalação do Laravel 8</p>
<p>Instalação do php 8 e as depêndencias para se trabalhar com Laravel<p>
<p>Instalar Composer</p>
<p>Mysql 8 ou 5,7 e configurar compiando do arquivo env_projeto  para o arquivo .env, este arquivo tem que ser criado para configurar o banco de dados comforme a senha e o usuário</p>
<p>se quiser trabalhar com apache configurar no sistema o apache2</p>
</p>comando principal: php artsan migrate:refresh --seed</p>
.......................
.......................
<p>****DOCUMENTAÇÃO AINDA EM CONSTRUÇÃO***</P>
<BR>
<h2>Linux:</h2>
<h5>Instalando MYSQL 8.</h5>
<p>sudo apt update</p>
<p>sudo apt install mysql-server</p>
<p>configuração da senha->sudo mysql_secure_installation</p>
....................
....................
<p>CREATE USER 'novo_usuario'@'localhost' IDENTIFIED BY 'senha_forte';,/p>
<p>GRANT ALL PRIVILEGES ON * . * TO 'novo_usuario'@'localhost';</p>
<p>FLUSH PRIVILEGES;
    exit;</p>
 # ALTERAR SENHA 
 <p>ALTER USER 'usuario'@'localhost' IDENTIFIED BY 'nova-senha';</p>
  <BR>
<h5>Instalando PHP 8.</h5>
<p>sudo apt-get install software-properties-common</p>
<p>sudo add-apt-repository ppa:ondrej/php>/p>
<p>sudo apt update && sudo apt install php8.0 php8.0-intl php8.0-mysql php8.0-sqlite3 php8.0-gd</p>
................................................................................................
<br>
 OBS: pode-se instalar o PHP 7.4 e configurar no arquivo composer.json<br>
................................................................................................
<br>
<h5>Instalando o Composer.</h5>
php -r "copy ('https://getcomposer.org/installer', 'composer-setup.php');"
 php -r "if (hash_file ('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07eee0f76' echo-unlixer 'verificado' instalação do echo-unlixer 'verificado' composink3 (echo-unlixer) {181c); php ');} echo PHP_EOL; "
 php composer-setup.php
 php -r "unlink ('composer-setup.php');" 
