<?php 
/**
 * database class
 */
class Database{
    private function connect()
    {   
        $str="mysql:hostname=".DBHOST.";dbname=".DBNAME;
        $conn = new PDO($str,DBUSER,DBPASS);
        
        return $conn;
    }

    
    public function query($query,$data = [], $type = 'object')
    {

        $conn = $this -> connect();
        $stmt = $conn -> prepare($query);
    
        if($stmt)
        {
           

            $check = $stmt -> execute($data);
            if($check){
             
                if($type == 'object'){
                    $type = PDO::FETCH_OBJ;
                }
                else{
                    $type = PDO::FETCH_ASSOC;

                }
                $result = $stmt -> fetchAll($type);
                
                if(is_array($result) && count($result) >0 ){

                    return $result;
                }
            }
          
        }
        return false;
        
    }
    public function lastInserted(){
        $conn = $this -> connect();
        return $conn ->lastInsertId();
    }
    public function update_table($query,$data = [], $type = 'object')
    {

        $conn = $this -> connect();
        $stmt = $conn -> prepare($query);
        if($stmt)
        {
            $check = $stmt -> execute($data);
            // echo $check;die;
            if($check){
             
                    return true;
                }
            
          
        }
        return false;
        
    }
    public function delete_table($query,$data = [], $type = 'object')
    {

        $conn = $this -> connect();
        $stmt = $conn -> prepare($query);
        if($stmt)
        {
            $check = $stmt -> execute($data);
            if($check){
             
                    return true;
                }
            
          
        }
        return false;
        
    }
     public function create_tables(){
         //users table create
         $query ="
         CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `firstname` varchar(255) NOT NULL,
            `lastname` varchar(255) NOT NULL,
            `email` varchar(100) NOT NULL,
            `password` varchar(255) NOT NULL,
            `role` varchar(50) NOT NULL,
            `date` date DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `email` (`email`),
            KEY `firstname` (`firstname`),
            KEY `lastname` (`lastname`),
            KEY `date` (`date`)
           ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4
         ";
         $this->query($query);


         //course table create
         $query = "
         CREATE TABLE `course` (
            `course_id` int(11) NOT NULL,
            `grade` int(11) NOT NULL,
            `created_date` date NOT NULL DEFAULT current_timestamp(),
            `language_medium` varchar(55) NOT NULL,
            `emp_ID` int(11) NOT NULL,
            `course_material` varchar(55) NOT NULL,
            `description` varchar(55) NOT NULL,
            `subject` varchar(55) NOT NULL,
            `name` varchar(55) NOT NULL
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
           ";
           $this->query($query);
     }

}