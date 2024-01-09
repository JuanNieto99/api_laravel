#!/bin/bash

# Configuración
DB_USER="user"
DB_PASSWORD="7654321"
DB_NAME="db"
BACKUP_DIR="/home/ubuntu/api_laravel/copias_seguridad/"

# Nombre del archivo de respaldo con la marca de tiempo
BACKUP_FILE="$BACKUP_DIR/backup_$(date +\%Y\%m\%d_\%H\%M\%S).sql"

# Comando mysqldump para realizar la copia de seguridad
docker exec -i mariadb mysqldump -u$DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_FILE 

# Verifica si el comando de copia de seguridad fue exitoso
if [ $? -eq 0 ]; then
    echo "Copia de seguridad exitosa en $BACKUP_FILE"
else
    echo "Error al realizar la copia de seguridad"
fi
