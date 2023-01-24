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
                //type could be either object for array if the type is not provided it'll by default take it as an object
                //inside pdo these fetch_obj and fetch_assoc are considered as numbers
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
    /**
     * reason for using prepared statements
     * select * from users wher email = 'email@email.com' or '1' or password='password'"
     * 'email@email.com' or '1' instead of the email they can type this and gain access to the system 
     * with out a password 
     */

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
     }

}