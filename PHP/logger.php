<?php 
	class admin{
		private $utility;
		public $password;

		public function __construct($psw,$user){
    		$this->utility= new utility();
			$this->password=$psw;
			$this->name=$user;
    	}

    	public function loginAdmin(){
			echo ("came");
    		$isCorrect=$this->utility->checkAdminPsw($this->name,$this->password);
    		if ($isCorrect=="admin"){
				return true;
    		}else{
    			return false;
    		}
    	}
	}
 ?>