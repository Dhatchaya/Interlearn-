<?php

//Annuncement class

class AnnouncementFiles extends Model{
    public $error = [];
    public $table = "announcement_files";
    protected $allowed_columns = [
        'aid',
        'file_id',
        'file_name'
 
    ];
    // protected $staffs = [
    //     'Manager',
    //     'Teacher',
    //     'Instructor',
    //     'Receptionist',

    // ];

    public function validate($data)
    {   
        $this->error = [];
        if(empty($data['title']))
        {
            $this -> error['title'] = "Please provide a title for the announcement!";
        }
        if(empty($data['content']))
        {
            $this -> error['content'] = "Please provide a content body for the announcement!";
        }
        if(!empty($data['attachment']))
        {
            if(empty($data['file_name']))
            {
                $this -> error['file_name'] = "Please provide a name for the attachment!";
            }
        }
        // else{
        //     $this -> error['attachement'] = "Please provide a name for the attachement!";
        // }

        if(empty($this->error)){
            return true;
        }
        return false;
    }

//     public function validatefile($data,$previoussize=0)
//     {   

//         $this->error = [];
//     //    $size = 0;
//        $this->size=0;
        
//             // if(empty($data['assignment_file']))
//             // {
//             //     $this -> error['assignment_file'] = "Please upload your files";
//             // }
//             // else{
//                     foreach ($_FILES['assignment_file']['name'] as $i => $name) {
//                         $this -> size = $_FILES['assignment_file']['size'][$i]+ $this ->size;
                        
//                     }
//                     $this ->size = $this ->size+$previoussize;
//                  if(( $this ->size) > 5*MB){
//                     $this -> error['assignment_file'] = "File size is too large";
//                  }
//                 // }
//                 //  show($this->size);die;
//         if(empty($this->error)){
//             return true;
//         }
//         return false;
//     }
}