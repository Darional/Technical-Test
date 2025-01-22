# Usa una imagen oficial de Node.js compatible con Vue 3
FROM node:16.20.0

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /app

# Copia solo los archivos necesarios para instalar dependencias
COPY package.json package-lock.json ./

# Instala las dependencias
RUN npm install

# Copia el resto de los archivos de la aplicación
COPY . .

# Expone el puerto 8080 (puerto por defecto del servidor Vue)
EXPOSE 8080

# Comando para iniciar el servidor de desarrollo
CMD ["npm", "run", "serve"]
