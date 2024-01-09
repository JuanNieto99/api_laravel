#!/bin/bash

# Configuración
DB_USER="user"
DB_PASSWORD="7654321"
DB_NAME="db"
BACKUP_DIR="/home/ubuntu/api_laravel/copias_seguridad"
CONTENEDOR="mariadb"

# Nombre del archivo de respaldo con la marca de tiempo
BACKUP_FILE="$BACKUP_DIR/backup_$(date +\%Y\%m\%d_\%H\%M\%S).sql"

# Verificar y crear el directorio si no existe
if [ ! -d "$BACKUP_DIR" ]; then
    mkdir -p "$BACKUP_DIR"
fi

# Comando mysqldump para realizar la copia de seguridad
DUMP_COMMAND="docker exec -i $CONTENEDOR mysqldump -u$DB_USER -p$DB_PASSWORD $DB_NAME"
echo "$DUMP_COMMAND > $BACKUP_FILE"
docker exec -i $CONTENEDOR mysqldump -u$DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_FILE 


# Verifica si el comando de copia de seguridad fue exitoso
if [ $? -eq 0 ]; then
    chmod +w $BACKUP_FILE
    echo "Copia de seguridad exitosa en $BACKUP_FILE"
    
    ls -t $BACKUP_DIR | tail -n +6 | xargs -I {} rm -- "$BACKUP_DIR/{}"
else
    echo "Error al realizar la copia de seguridad"
fi
