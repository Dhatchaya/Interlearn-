<?php 
/**
 * model class
 */
class Model extends Database {
    protected $table = "";
    
    public function insert($data){
        //remove unwanted columns
        if(!empty($this->allowed_columns)){
            foreach($data as $key => $value){
                if(!in_array($key,$this->allowed_columns))
                {
                    unset($data[$key]);
                }
            }
        }
            $keys = array_keys($data);
             $query = "insert into ".$this->table."(".implode(",",$keys) .") values (:".implode(",:",$keys).")";
             echo $query;
             $this -> query($query,$data);
            //  echo $query;
            //  show($data[$key]);
    }

    public function where($data){
        $keys = array_keys($data);
        $query ="select * from ".$this->table." where ";

        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;
           
    }
    public function first($data){
        $keys = array_keys($data);
        $query ="select * from ".$this->table." where ";

        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $query .= " order by id desc limit 1";//make sure to leave a space at the begning
        $res = $this -> query($query,$data);
        //this will only have one result but just to be on the safe side we return res[0]
        if(is_array($res)){
            return $res[0];
        }
        return false;
           
    }
}
