<?php

/* commentaires generaux: parfois vous utilisez le bind positionnel ?
 * parfois le bind nomme: standardiser et genericiser dans une
 * fonction generique, eviter la repetition de code similaire
 * dans les differentes fonctions
 */

abstract class Model
{

    /**
     * Insertion into DB: INSERT INTO
     * @param String $table Table name
     * @param Array $params Parameters in array 
     */
    protected static function create($table, $params)
    {
        $dbh = App::get('dbh');

        // on peut simplifier le code (mais voir aussi les commentaires
        // generaux)
        //Pour chaque params on lui attribue un ? pour le binding
        $copyParams = array_map(function (x) {
                                   return "?";
                                }, $params);

        $binding = implode(", ", $copyParams); //binding need ? and value
        $keys = implode(", ", array_keys($params)); //Only need the key

        $request = "INSERT INTO {$table} ({$keys}) VALUES ({$binding});";
        $statement = $dbh->prepare($request);

        $statement->execute(array_values($params));
    }

    /**
     * SELECT * FROM
     * @param String $table Table name  
     */
    protected static function readAll($table)
    {
        $dbh = App::get('dbh');

        /* on pourrait imaginer, pour se passer de $table comme argument:
           $table = strtolower(get_called_class());
           $table = remplacer ([A-Z][a-z0-9]+)([A-Z][a-z0-9]+) par
                    $1_$2 (cf preg_replace)
           -- de preference dans une fonction generique de Model
         */
         
        preg_replace("([A-Z].*?[A-Z]
        $statement = $dbh->prepare("SELECT * FROM {$table};");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }

    /**
     * SELECT * FROM X ORDER BY X
     * @param String $table Table name
     * @param String $orderBy Column name
     */
    protected static function readAllOrderBy($table, $orderBy)
    {
        $dbh = App::get('dbh');
        $statement = $dbh->prepare("SELECT * FROM {$table} ORDER BY {$orderBy};");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }

    /**
     * SELECT * FROM X WHERE ID
     * @param String $table Table name
     * @param int $id
     */
    protected static function readById($table, $id)
    {
        $dbh = App::get('dbh');
        $statement = $dbh->prepare("SELECT * FROM {$table} WHERE id=:model_id;");
        $statement->bindParam(':model_id', $id);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }

    protected static function readByName($table, $name)
    {
        $dbh = App::get('dbh');
        /* bien se rappeler qu'alors $name peut contenir des % aussi, si voulu,
         * readbyName est alors readbyNamePattern plutot
         * les % devraient alors etre ajoutés par l'appelant plutot qu'ici.
         * sinon utiliser un simple "="
         */
        $statement = $dbh->prepare("SELECT * FROM {$table} WHERE name LIKE %:model_name%;");
        $statement->bindParam(':model_name', $name);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }
    
    protected static function search($table, $params)
    {
        $dbh = App::get('dbh');
        $request = "SELECT * FROM {$table} WHERE ";
        foreach ($params as $key => $value) {
            if ($key != "binding") {
                $request = $request . " " . $value;
            }
        }
        $request = $request.";";
        $statement = $dbh->prepare($request);
        if (isset($params["binding"])) {
            foreach ($params["binding"] as $key => $value) {
                $test = "%{$value[0]}%";
                $statement->bindParam(":".$key, $test, $value[1]);
            }
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }

    /* ne semble pas utilisee */
    protected static function exists($table, $params)
    {
        $dbh = App::get('dbh');
        $request = "SELECT * FROM {$table} WHERE ";
        foreach ($params as $key => $value) {
            if ($key != "binding") {
                $request = $request . " " . $value;
            }
        }
        $request = $request.";";
        $statement = $dbh->prepare($request);
        if (isset($params["binding"])) {
            foreach ($params["binding"] as $key => $value) {
                $test = "{$value[0]}";
                $statement->bindParam(":".$key, $test, $value[1]);
            }
        }
        $statement->execute();
        return $statement->fetchColumn();
    }

    /**
     * UPDATE 
     * @param String $table Table name
     * @param Array $params Parameters to update
     */
    protected static function update($table, $id, $params)
    {
        $dbh = App::get('dbh');
        $callback = function (string $k): string {
            return "{$k}=:{$k}";
        };

        $keys = array_keys($params);
        $values = array_values($params);
        $set_string = implode(", ", array_map($callback, $keys));

        $request = "UPDATE {$table} SET {$set_string} WHERE id=:model_id;";
        $statement = $dbh->prepare($request);

        for ($k = 0; $k < count($values); $k++) {
            $statement->bindParam(":{$keys[$k]}", $values[$k]);
        }
        $statement->bindParam(":model_id", $id);

        $statement->execute();
    }

    /**
     * DELETE FROM
     * @param String $table Table name
     * @param int $id 
     */
    protected static function delete($table, $id)
    {
        $dbh = App::get('dbh');

        $request = "DELETE FROM {$table} WHERE id=:model_id;";
        $statement = $dbh->prepare($request);
        $statement->bindParam(':model_id', $id);

        $statement->execute();
    }
}
