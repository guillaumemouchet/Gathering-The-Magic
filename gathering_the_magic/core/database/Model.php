<?php

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


        $callback = function(string $_): string
        {
            return "?";
        };

        $copyParams = array_map($callback, $params); //Pour chaque params on lui attribue un ? pour le binding

        $binding = implode(", ", $copyParams); //binding need ? and value
        $keys = implode(", ", array_keys($params)); //Only need the value
        $values = array_values($params);

        $request = "INSERT INTO {$table} ({$keys}) VALUES ({$binding});";
        $statement = $dbh->prepare($request);

        for($k = 1; $k<= count($values); $k++)
        {
            $statement->bindParam($k, $values[$k-1]);
        }

        $statement->execute();


    }
    
    /**
     * SELECT * FROM
     * @param String $table Table name  
     */
    protected static function readAll($table)
    {
        $dbh = App::get('dbh');
        $statement= $dbh->prepare("SELECT * FROM {$table};");
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

        return $statement->fetch(PDO::FETCH_CLASS, get_called_class());
    }

    /**
     * UPDATE 
     * @param String $table Table name
     * @param Array $params Parameters to update
     */
    protected static function update($table, $id, $params)
    {
        $dbh = App::get('dbh');
        $callback = function(string $k):string
        {
            return "{$k}=:{$k}";
        };

        $keys = array_keys($params);
        $values = array_values($params);
        $set_string =implode(", ", array_map($callback, $keys));
        
        $request = "UPDATE {$table} SET {$set_string} WHERE id=:model_id;";
        $statement = $dbh->prepare($request);
        
        for($k = 0; $k < count($values); $k++)
        {
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
        $statement->bindparan(':model_id', $id);
        
        $statement->execute();
        
    }
}