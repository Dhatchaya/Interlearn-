<?php 

class Payment extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "payment";
    protected $allowed_columns = [
        'studentID',
        'studentName',
        'month',
        'amount',
        'courseID',
        'method',
        'status',
        'date',
    ];
    public function getAll()
    {
        // // Prepare the query
        // $query = "SELECT * FROM $this->table";

        // // Execute the query
        // $db = new Database();
        // $result = $this->db->query($query);

        // // Return the result
        // return $result;
    }

}


class GetStudentName extends Model{
    //says what table it has to target
    public $error = [];
    protected $table = "student";
    protected $allowed_columns = [
        'studentID',
        'first_name',
        'last_name',
    ];
}



  