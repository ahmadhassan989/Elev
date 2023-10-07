FROM  mongo
    # Enable necessary PHP extensions
# Download and install MongoDB PHP extension
RUN apt-get update && apt-get install -y \
    libssl-dev \
    && rm -rf /var/lib/apt/lists/* \
    curl -sS https://pecl.php.net/get/mongodb | tar xvz -C /tmp 
    
    EXPOSE 27017