mysql -h 127.0.0.1 -P 3306 -u user -puserpass

Para pasar directamente un script de creación:
mysql -h 127.0.0.1 -P 3306 -u user -p mydb < src/exer2_16/student.sql

Anotaciones: Si tienes cualquier print, echo o lo que sea antes de un header("Location: Index.php") la lias porque no lo va a ejecutar porque va a cargar antes el html
Cargar siempre las clases antes que el operationsDB, se non vas ter problemas
