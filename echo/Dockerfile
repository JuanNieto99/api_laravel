# Usa una imagen base de Node.js
FROM node:alpine

# Directorio de trabajo
WORKDIR /app

# Copia los archivos necesarios
COPY package*.json ./

# Instala las dependencias
RUN apt-get update -y && apt-get install -y \
    nano \
    npm 

RUN npm install -g laravel-echo-server

# Copia la configuración del servidor Laravel Echo
COPY laravel-echo-server.json /app/laravel-echo-server.json

# Expone el puerto 6001 (por defecto para Laravel Echo)
EXPOSE 6001

# Comando para ejecutar el servidor Laravel Echo
CMD ["npm", "start"]
