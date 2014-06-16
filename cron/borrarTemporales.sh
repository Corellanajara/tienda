#!/bin/sh

# CRON PARA BORRAR LOS ARCHVOS TEMPORALES
# !!!! HAY QUE CAMBIAR USUARIO POR EL VALOR CORRECTO !!!!!

touch /home/USUARIO/public_html/log/log.txt

echo "Borrado de archivos temporales `date`" >> /home/USUARIO/public_html/log/log.txt
echo "------------------------------------------------------------" >> /home/USUARIO/public_html/log/log.txt

rm -Rf /home/USUARIO/public_html/tmp/*.xls
rm -Rf /home/USUARIO/public_html/tmp/*.csv
rm -Rf /home/USUARIO/public_html/tmp/*.xml
rm -Rf /home/USUARIO/public_html/tmp/*.yml

echo " " >> /home/USUARIO/public_html/Hermes/log/log.txt