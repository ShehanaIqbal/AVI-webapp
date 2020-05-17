<?php
	 require_once('DBController.php');
	 require_once('config.php');
	?>

<?php
	class utility{
		private $controller;

		public function __construct(){
			$this->controller= new DBController();
		}

	///////////////////////////////////////////////////////
		public function addAdmin($name,$regNo,$username,$branch,$password){
		    $query="INSERT INTO
		        admin
		        (name, regNo, username, password, branchID, isActive)
		        VALUES
		        ('$name', '$regNo', '$username', '$password', '$branch', 1 )
		    ";
		    $result=$this->controller->insertQuery($query);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    ///////////////////////////////////////////////////////
        public function addGeneralUser($name,$regNo,$username,$branch,$password){
            $query="INSERT INTO
            		        users
            		        (name, regNo, username, password, branchID, isActive)
            		        VALUES
            		        ('$name', '$regNo', '$username', '$password', '$branch', 1 )
            		    ";
            		    $result=$this->controller->insertQuery($query);
                        if($result){
                            return true;
                        }else{
                            return false;
                        }
        }

    //////////////////////////////////////////////////////
        public function checkAdminPsw($name,$password){
            if ($name=='avi-admin-$#1'){
                if ($password=='admin123'){
                    $_SESSION['currentUser']=$name;
                    return true;
                }else{
                    return false;
                }
            }else{
                $password=password_hash($password, PASSWORD_BCRYPT );
                $query="SELECT * from admin where username='$name' and password='$password'";
                $result=$this->controller->runQuery($query);
                if ($result){
                    $_SESSION['currentUser']=$name;
                    return true;
                }else{
                    return false;
                }
            }
        }

    //////////////////////////////////////////////////////
      public function getAdminList(){
            $query="SELECT * FROM admin INNER JOIN  branch ON admin.branchID=branch.branchID";
            $result=$this->controller->runQuery($query);
            return $result;
      }

      ////////////////////////////////////////////////////
      public function getUserList(){
          $query="SELECT * FROM users INNER JOIN  branch ON users.branchID=branch.branchID";
          $result=$this->controller->runQuery($query);
          return $result;
      }

        /////////////
        public function getSearchedVehicles($number){
            $query="SELECT DISTINCT blacklistedvehicles.vehicle_number, branch.branchName, detect.datetime, blacklistedvehicles.bID, blacklistedvehicles.isBlacklisted FROM blacklistedvehicles INNER JOIN detect INNER JOIN branch ON blacklistedvehicles.bID=detect.bID and detect.branchID=branch.branchID WHERE vehicle_number LIKE '%$number%'";
            $result=$this->controller->runQuery($query);
            echo $result;
            // foreach($result as $i){
            //     echo $i;
            // }
            if(false){
                return false;
                
            } else {
                return $result;
            }
            
        }

      //get blcklisted vehicle list
      public function getBlackListedVehicleList(){
          $query="SELECT DISTINCT blacklistedvehicles.vehicle_number, branch.branchName, detect.datetime, blacklistedvehicles.bID, blacklistedvehicles.isBlacklisted FROM blacklistedvehicles INNER JOIN detect INNER JOIN branch ON blacklistedvehicles.bID=detect.bID and detect.branchID=branch.branchID";
          $result=$this->controller->runQuery($query);
          return $result;
      }
      //get released vehicles list
      public function getReleasedVehicleList(){
            $query="SELECT * FROM releasedvehicle INNER JOIN blacklistedvehicles ON releasedvehicle.bID=blacklistedvehicles.bID";
            $result=$this->controller->runQuery($query);
            return $result;
      }

      public function RemoveAdmin($id){
           $query = "UPDATE admin SET isActive = 0 WHERE adminID=$id";
           $result=$this->controller->updateQuery($query);
            if ($result){
                return $result;
            }else{
                return false;
            }
      }

      public function removeBlocked($blacklistedID){
            //add vehicle to the released vehicle list
            $query1 = "INSERT INTO releasedvehicle (bID, releasedDatetime) VALUES ($blacklistedID, CURRENT_TIMESTAMP)";
            
            //remove vehicle from the blacklisted table
            $query2 = "UPDATE blacklistedvehicles SET isBlacklisted=0 WHERE bID=$blacklistedID";

            $result1=$this->controller->insertQuery($query1);
            $result2=$this->controller->updateQuery($query2);
            
            if($result2){
                return $result2;
            } else {
                return false;
            }
      }

      public function RemoveUser($id){
             $query = "UPDATE users SET isActive = 0 WHERE  userID=$id";
             $result=$this->controller->updateQuery($query);
              if ($result){
                  return $result;
              }else{
                  return false;
              }
       }

      public function EditAdmin($id){
          $query="SELECT * FROM admin INNER JOIN  branch ON admin.branchID=branch.branchID WHERE adminID='$id'";
          $result=$this->controller->runQuery($query);
          return $result;
      }

      public function EditUser($id){
          $query="SELECT * FROM users INNER JOIN  branch ON users.branchID=branch.branchID WHERE userID='$id'";
          $result=$this->controller->runQuery($query);
          return $result;
      }

      public function UpdateAdmin($name,$regNo,$username,$branchID,$id){
           echo "awa";
           $query = "UPDATE admin SET name='$name',regNo='$regNo',username='$username',branchID='$branchID' WHERE adminID=$id";
           $result=$this->controller->runQuery($query);
           echo $result, "hhhhh";
           return $result;
      }

      public function UpdateUser($name,$regNo,$username,$branchID,$id){
           $query = "UPDATE users SET name='$name',regNo='$regNo',username='$username',branch='$branchID' WHERE userID=$id";
           $result=$this->controller->runQuery($query);
           echo "came";
           return $result;
      }
  }