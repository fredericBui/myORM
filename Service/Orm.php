<?php

    // Récupération des variables d'environnements
    include("Service/DotEnv.php");
    $dotenv = new DotEnv(__DIR__ . '/.env'); // TODO - A modifier pour que le .env soit à la racine de l'application
    $dotenv->load();

    class Orm {
    
        // TODO - Pourquoi ne peuvent-ils pas avoir comme valeur getenv() ?
        private string $dns;
        private string $user;
        private string $password;
        private $conn;

        // TODO - A commenter
        public function __construct()
        {
            $this->dns = getenv('DATABASE_DNS');
            $this->user = getenv('DATABASE_USER');
            $this->password = getenv('DATABASE_PASSWORD');
            
            try{
                $conn = new PDO($this->dns, $this->user, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }

            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }

            return $this->conn = $conn;
        }

        // Liste les tables en BDD
        public function showTables(){
            $sql =  'SHOW TABLES FROM `bddtest`';
            $sth = $this->conn->prepare($sql);
            $sth->execute();
            $tables = $sth->fetchAll();
            
            foreach  ($tables as $row) {
                print "<br/>" . $row[0];
            }

        }

        // Liste les enregistrements d'une table
        public function select(string $table){
            $sql =  'SELECT * FROM ' . $table;
            $sth = $this->conn->prepare($sql);
            $sth->execute();
            $users = $sth->fetchAll();

            foreach  ($users as $row) {
                print "<br/>" . $row['id'] . " ";
                print  $row['prenom'];
            }
        }

        // Affiche un enregistrement en fonction de son id
        public function selectOneById(string $table, int $valeur){
            $sql =  'SELECT * FROM ' . $table . ' WHERE id = :valeur';
            $sth = $this->conn->prepare( $sql);
            $sth->bindParam('valeur', $valeur, PDO::PARAM_INT);
            $sth->execute();
            $user = $sth->fetch();

            print "<br/>" . $user['id'] . " ";
            print  $user['prenom'];
        }

        // Modifie un enregistrement
        public function setValue(string $table, string $key, string $value, int $id){
            $sql = 'UPDATE ' . $table . ' SET `'.$key.'` = :value WHERE id = :id';
            $sth = $this->conn->prepare($sql);
            $sth->bindParam('value', $value, PDO::PARAM_STR);
            $sth->bindParam('id', $id, PDO::PARAM_INT);
            $sth->execute();
        }

        // Ajoute un enregistrement
        public function add(string $table, string $key, string $value){
            $sql = 'INSERT INTO ' . $table . ' ('.$key.') VALUES (:value)';
            $sth = $this->conn->prepare($sql);
            $sth->bindParam('value', $value, PDO::PARAM_STR);
            $sth->execute();
        }

        // Supprime un enregistrement
        public function delete(string $table, int $id){
            $sql = 'DELETE FROM '.$table.' WHERE id=:id';
            $sth = $this->conn->prepare($sql);
            $sth->bindParam('id', $id, PDO::PARAM_INT);
            $sth->execute();
        }

    }

    
?>