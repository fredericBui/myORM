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

        // Connexion à la base de donnée
        include("Service/Orm.php");
        $orm = new Orm();

        // Ajouter 1
        // $orm->add("user","prenom","francis");
        
        // Supprimer 1
        // $orm->delete("user",5);

        // Modifier 1
        $orm->setValue("user","prenom","johndoe",1);

        // Afficher toutes les tables en bdd
        echo "<br/> SHOW TABLES FROM BDD :";
        $orm->showTables();
        
        // Afficher tout
        echo "<br/> SELECT FROM :";
        $orm->select("user");

        // Afficher 1
        echo "<br/> SELECT FROM WHERE :";
        $orm->selectOneById("user", 1);


    ?>
    
</body>
</html>