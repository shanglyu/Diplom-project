FROM php:8.1-apache-bullseye

# Cài extension cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip git unzip curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Kích hoạt mod_rewrite và cho phép .htaccess trong /var/www/
RUN a2enmod rewrite && \
    sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf && \
    echo "AddType application/x-httpd-php .php .pHp .phtml .php3 .php4 .php5" >> /etc/apache2/apache2.conf

# Sao chép toàn bộ mã nguồn vào container
COPY . /var/www

# Tạo symlink để Apache dùng thư mục public làm web root
RUN rm -rf /var/www/html && \
    ln -s /var/www/app/public /var/www/html && \
    chown -R www-data:www-data /var/www && \
    ln -s /var/www/uploads /var/www/app/public/uploads

# Thiết lập thư mục làm việc
WORKDIR /var/www

EXPOSE 80
CMD ["apache2ctl", "-D", "FOREGROUND"]


# # Sử dụng PHP 8.1 với Apache trên Debian Bullseye


# FROM php:8.1-apache-bullseye

# # Sửa mirror nếu deb.debian.org gặp vấn đề
# RUN find /etc/apt/sources.list.d/ -type f -exec sed -i 's|http://deb.debian.org|http://ftp.debian.org|g' {} +

# # Cài đặt các thư viện cần thiết
# RUN apt-get update && apt-get install -y --no-install-recommends \
#     libpng-dev libjpeg-dev libfreetype6-dev \
#     zip git unzip \
#     && docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install gd \
#     && docker-php-ext-install pdo pdo_mysql \
#     && apt-get clean && rm -rf /var/lib/apt/lists/*

# # Kích hoạt mod_rewrite và cấu hình Apache
# RUN a2enmod rewrite \
#     && sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
#     && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# # Cài đặt Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Thiết lập thư mục làm việc và sao chép project
# WORKDIR /var/www
# COPY . .

# # Chuyển thư mục public thành web root
# RUN rm -rf /var/www/html && mv /var/www/app/public /var/www/html

# # Cài đặt các dependency từ composer.json nếu tồn tại
# RUN if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader; fi

# # Đặt quyền cho Apache user
# RUN chown -R www-data:www-data /var/www/html

# # Mở cổng 80 và chạy Apache ở foreground
# EXPOSE 80
# CMD ["apache2ctl", "-D", "FOREGROUND"]
