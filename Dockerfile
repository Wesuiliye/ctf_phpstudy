# 基于Debian的PHP 7.4官方镜像
FROM php:7.4.33-apache-buster

# 安装必要的依赖
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip mysqli pdo pdo_mysql \
    && a2enmod rewrite      

# 将当前目录内容复制到容器的文档根目录
COPY www/ /var/www/html/

# 暴露端口
EXPOSE 80

# 启动Apache服务
CMD ["apache2-foreground"]