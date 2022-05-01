<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Frédéric Bui">
    <title>Fredibu ORM</title>
</head>
<body>
    <?php

        // Importation de la classe ORM
        include("Service/Orm.php");

        // Connexion à la base de donnée en PDO
        $orm = new Orm();

        /* Listes de toutes les méthodes de la classes ORM :
            - createTable()
            - add()
            - showTables()
            - select()
            - selectOneBy()
            - setValue()
            - delete()
        */

    ?>
    
</body>
</html>