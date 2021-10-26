<?php 

class Database{
   private $host = DB_HOST;
   private $db_name = DB_NAME;
   private $db_user = DB_USER;
   private $db_pass = DB_PASS;

   public $link;
   public $error;
   function __construct(){
     $this->connectDb();
  }

  private function connectDb()
  {
      $this->link = new mysqli($this->host,$this->db_user,$this->db_pass,$this->db_name);
      if(!$this->link){
        $this->error = 'connection failed'.$this->link->connect_error;
      }
  }

  public function sign_up($query){
    // echo ($query);
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result){
          header('Location: login.php');
          //  return $result;
        } else{
          return false;
        }
  }

  public function sign_in($query){
    // echo "login";
    $reslut = $this->link->query($query) or die($this->link->error.__LINE__);
    // echo $reslut->num_rows;
    // echo $reslut;
    if($reslut->num_rows>0){
        return 'Login Success';
    } else{
        return false;
    }
  }

  public function getAllEmployess($fetcAllEmpQuery){
    // echo $fetcAllEmpQuery;
    $employees = $this->link->query($fetcAllEmpQuery) or die($this->link->error.__LINE__);
    // echo $employees->num_rows;

    if($employees->num_rows>0){
      return $employees;
    } else{
      echo 'no employes';
    }
  }

  //project
  public function addProject($query)
  {
     // echo "login";
     $reslut = $this->link->query($query) or die($this->link->error.__LINE__);
     // echo $reslut->num_rows;
     // echo $reslut;
     if($reslut){
         return 'Success';
     } else{
         return false;
     }
  }

  //fecthAllProjects
  public function fecthAllProjects($query)
  {
     // echo "login";
     $reslut = $this->link->query($query) or die($this->link->error.__LINE__);
    //  echo json_encode($reslut);
     echo $reslut->num_rows;
     // echo $reslut;
     if($reslut->num_rows>0){
         return $reslut;
     } else{
         return false;
     }
  }

  // fetchSingleProject
  function fetchSingleProject($query){

    $reslut = $this->link->query($query) or die($this->link->error.__LINE__);

    //  echo "num rows: ".$reslut->num_rows;
     // echo $reslut;
     if($reslut->num_rows>0){
         return $reslut;
     } else{
         return false;
     }
  }

  //fetchEmployeSingle
  public function fetchEmployeSingle($query)
  {
     // echo "login";
     $reslut = $this->link->query($query) or die($this->link->error.__LINE__);
     $name = $reslut->fetch_assoc();
    //  echo json_encode($reslut);
     echo $name['name'];
     // echo $reslut;
    //  if($reslut->num_rows>0){
    //      return $reslut;
    //  } else{
    //      return false;
    //  }
  }
}

