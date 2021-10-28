<?php

class QueryBuilder {

    protected $pdo;
    
    public function __construct (PDO $pdo){
        $this->pdo = $pdo;
    }

    public function selectAll($table) {
        $statement =  $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $parameters){

        $sql = sprintf(

            'INSERT INTO %s (%s) VALUES (%s)',
    
            $table,
    
            implode(', ', array_keys($parameters)),
    
            ':' . implode(', :', array_keys($parameters))
    
        );
    
        try{
            
            $statement = $this->pdo->prepare($sql);
    
            $statement->execute($parameters);
    
            header("Location: AdminManageAnnouncements.php");
            
        } catch(Exception $e){
    
            die($e->getMessage());
    
        }

    }

    public function update($table, $parameters, $id){

        $sql = sprintf(

            'UPDATE ' . $table  . ' SET=:'. implode(', SET =:', array_keys($parameters)) . ' WHERE id =  '.$id.' ', 
    
        );
        
        //':' . implode(', :', array_keys($parameters))
            // die($sql);

        // $sql = 'UPDATE ' . $table . ' SET ';
        // $sql .= implode(" = :" . implode(', ', array_keys($parameters)), array_keys($parameters));

        // $sql .= ' = : WHERE id =  ' .$id. '';
        //  die($sql);
        
        // $statement = $this->pdo->prepare($sql);
        // $statement->execute($parameters);
        

        try{
            
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
    
            header("Location: AdminManageAnnouncements.php");
            
        } catch(Exception $e){
    
            die($e->getMessage());
    
        }
        
    }

    public function delete ($table, $id) {
        // die(var_dump($id));
        try {

            $statement =  $this->pdo->prepare("delete from {$table} where id = $id");
            $statement->execute();
            header("Location: AdminManageAnnouncements.php");
            
        } catch (Exception $e) {
            
            die($e->getMessage());
        }
       
    }

    public function selectOne($table, $id) {

        $statement =  $this->pdo->prepare("select * from {$table} where id = :id");
        $statement->execute(array('id' => $id));
        return $statement->fetch(PDO::FETCH_ASSOC);
        
    }
}