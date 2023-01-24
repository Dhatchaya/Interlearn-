<?php

class App
 {
    //default controller
    protected $controller = '_404';
    // if you don't find a controller you display 404
    protected $method = 'index';
    // this is used to call a specific function in the class
    public static $page = '_404';

    function __construct()
    {
        
       // print_r($this->getURL());
//if we are expecting an array of objects may be string we use print_r(print readable)
//get variable will get anything after the ? in the url
//url:http://localhost/Interlearn/public/index.php?a=2&b=3&c=2
//output:    Array ( [a] => 2 [b] => 3 [c] => 2 )
//in ht access if the given file location does not 
//exists it will assign that path to a variable named url instead of not fount error


//$this->getURL() without this it will search for the function in global scope and it won't be able to find it
    $arr=$this->getURL();
//getURL() funtion is there below
//we check with the file with first item exists
    $filename = "../app/controllers/".ucfirst($arr[0]).".php";
    
//this will get the first file and display ucfirst to make the first letter caps
//include - ignore if it doesn't find the file but require will shut down the program if it doesn't find the file
    if(file_exists($filename)){
        require $filename;
        $this -> controller = $arr[0];
        //if we find it will change the controller to the first file
      //  unset($arr[0]);
        //remove arr[0] from the array
        //this is used to create a instance but when it is a static value can use self 
        self::$page = $arr[0];
        unset($arr[0]);
    }
    else{
        require "../app/controllers/".$this->controller.".php";
        //if the file doesn't exist it will load the default controller which is 404
    }
    //new instance of the controller class that we are calling
    $mycontroller = new $this->controller();
    //check whether second parameter exits if not it'll route to the index
    $mymethod = $arr[1] ?? $this->method;
    
    //check whether the method not empty
    if(!empty($arr[1])){
            //check whether there is a method named with second parameter
        if (method_exists($mycontroller,strtolower($mymethod)))
        {   
            
        $this->method = strtolower($mymethod);
        //change method name to the second parameter
       unset($arr[1]);
        }

    }
    //cleaning the array and making a new array with the available values
    $arr = array_values($arr);
    //show($arr);
    //call the relavant function by passing arr as argument
    call_user_func_array([$mycontroller,$this->method], $arr);
}




private function getURL(){
    $url = $_GET['url']??'home';
   
    //we have check whether url exists for that we use ??(null coalescing operator)

    //****************null coalescing operator*****************************//

    //Fetches the value of $_GET['user'] and returns 'nobody'
    // if it does not exist.
    //$username = $_GET['user'] ?? 'nobody';
    // This is equivalent to:
    //$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';

    // Coalescing can be chained: this will return the first
    // defined value out of $_GET['user'], $_POST['user'], and
    // 'nobody'.
    //$username = $_GET['user'] ?? $_POST['user'] ?? 'nobody';

    //********************************************************************//
    // seperate the url by '/'
    //check for malicious variables in the url if you have spaces this won't allow that
    $url = filter_var($url,FILTER_SANITIZE_URL);
    //filter _sanitize will remove all character except letters
    //if you want space in your url don't use sanitize
    //you have so many filters like filter email and so onn check php manual for that

    $arr = explode("/",$url);

    
    return $arr;
    }
 }