# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala a extensão PDO MySQL que o PHP precisa para conectar ao banco de dados
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Ativa o módulo rewrite do Apache (caso precise de rotas amigáveis no futuro)
RUN a2enmod rewrite

# Copia os arquivos do seu projeto para dentro do container do Apache
COPY . /var/www/html/

# Define as permissões corretas para a pasta do Apache
RUN chown -R www-data:www-data /var/www/html