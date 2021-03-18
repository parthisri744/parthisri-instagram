<?php
require_once "config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location: login.php");
   //exit;
}  
class useradd{
    private $post;
    private $err;
    private $dob;
    
    function __construct(){
        $this->check_empty_errors();
    }
    
    private function get_data_from_post($param){
        return isset($_POST[$param]) ? trim($_POST[$param]) : "";              
    }
    private function check_empty_errors(){
       $this->dob = $this->get_data_from_post("dob"); 
       $this->reqno = $this->get_data_from_post("reqno"); 
       $this->sname = $this->get_data_from_post("sname"); 
       if(strlen($this->dob) < 2){
         $this->err [] = "Please Enter Dob";  
       }
	   if(strlen($this->reqno) < 2){
         $this->err [] = "Please Enter Register No";  
       }
	   if(strlen($this->sname) < 2){
         $this->err [] = "Please Enter Dob";  
       }
       //
    }
    public function valid_data($regno){
		$sql = "SELECT id FROM students WHERE regno = :regno"; 
            if($stmt = $pdo->prepare($sql)){
                $stmt->bindParam(":regno", $regno, PDO::PARAM_STR);
				if($stmt->execute()){
                        if($stmt->rowCount() == 1){
                                    $this->err[] = "This username is already taken.";
                             } else{
                                   $regno = $this->get_data_from_post("reqno"); 
                        }
				}
			}
            return sizeof($this->err) <1  ? true : false;
    }
    
    public function get_errors(){
       return  $this->err;
    }    
}

$error = "";

if(isset($_POST["dob"])){
    //var_dump($_POST);
    $obj = new useradd();
    if($obj->valid_data() === true){
        
    }else{
        //echo "entered";
        $total_errors = $obj->get_errors();
        $error = $total_errors[0];
    }
}

//echo $error;

/*
$regno=$sname=$dob=$course=$branch=$syear=$phno=$email=$password=$stu_address="";
    // Define variables and initialize with empty values
$regno_err = $sname_err = $dob_err=$course_err=$branch_err=$syear_err=$phno_err=$email_err=$password_err=$address_err=""; 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
     // Check if Student Name is empty
     if(empty(trim($_POST["sname"]))){
         $sname_err = "Please Enter Student Name.";
     } else{
         $sname = trim($_POST["sname"]);
     }
     // Check if Date Of Birth is empty
     if(empty(trim($_POST["dob"]))){
         $dob_err = "Please Enter Date Of Birth.";
     } else{
         $dob = trim($_POST["dob"]);
     }
         // Check if Register No is empty
         if(empty(trim($_POST["regno"]))){
               $regno_err = "Please Enter Register Number.";
             } else{
                   // Prepare a select statement
                   $sql = "SELECT id FROM students WHERE regno = :regno";
                     
                    if($stmt = $pdo->prepare($sql)){
                          // Bind variables to the prepared statement as parameters
                         $stmt->bindParam(":regno", $regno, PDO::PARAM_STR);
                         
                         // Set parameters
                        $regno = trim($_POST["regno"]);
                         
                          // Attempt to execute the prepared statement
                          if($stmt->execute()){
                                 if($stmt->rowCount() == 1){
                                       $regno_err = "This username is already taken.";
                                      
                                 } else{
                                        $regno = trim($_POST["regno"]);
                                }
                         } else{
                           echo "Oops! Something went wrong. Please try again later.";
                          }
             
                        // Close statement
                unset($stmt);
            }
        }
    }
*/
?>

  

          <div>
        <?php include_once("Navigation.php")  ?>
        </div>
        <div class="page-header"  align="center">
        <img src="assets/img/student-graduate.jpg" alt="Anna University" width="auto" width="auto">
        <h2>ADD STUDENTS</h2>
        <?php if(strlen($error) > 2) { ?>
          <script>swal('','<?php echo $error; ?>','error')</script>
        <?php } ?>
        
        <div class="wrapper">
            <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post" id="contact-form">
            <div class="form-group">
                <label>Enter Register Number</label>
                <input type="text" name="regno" autocomplete="off" class="form-control" autofocus>
                
            </div>    
            <div class="form-group">
                <label>Enter Student Name</label>
                <input type="text" name="sname" class="form-control">
                
            </div>
            <div class="form-group">
                <label>Enter  Date Of Birth</label>
                <input type="date" name="dob" class="form-control">
               
            </div>
            <div class="form-group">
                <input type="submit" style="background-color:green;" class="btn" value="Save & Next"><a class="btn" style="background-color:red;" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div>
</div>

    <div>
         <?php include_once("Footer.php") ?>
    </div>
    
 </body>
</html> 
    <?php 
    /*
     // Check input errors before inserting in database
     if((!empty($regno)) && (!empty($sname)) && (!empty($dob))){
         // Prepare an insert statement
         $sql = "INSERT INTO students (regno,sname,dob) VALUES (:regno,:sname,:dob)";
         //var_dump($sql);
         if($stmt = $pdo->prepare($sql)) {
             $stmt->bindParam(":regno", $regno, PDO::PARAM_STR);
             $stmt->bindParam(":sname", $sname, PDO::PARAM_STR);
             $stmt->bindParam(":dob", $dob , PDO::PARAM_STR);
             $result=$stmt->execute();
             $last_id = number_format($pdo->lastInsertId());
             $last=(int)$last_id;
             //var_dump($regno ."".$sname."".$dob,"".$last);
             $sampl="newstudentaddrule.php/".$last."";
             echo $sampl;
                if($result){  
                   // header("location: newstudentaddrule.php/$last"); 
                   echo "<script type='text/javascript'>
                    location.href = '".$sampl."';
                     </script>";
             } else {
                echo "<script type='text/javascript'>
                location.href = '".$sampl."';
                </script>";
             }
         }
         unset($stmt);
     }
 unset($pdo);
 */
     ?>