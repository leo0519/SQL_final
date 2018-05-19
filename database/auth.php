<?php
	include $_SERVER['DOCUMENT_ROOT'].'/database/database.php';
	class Auth extends Database{
		public function login($account,$password){
			$result=$this->db->query('select id from user where id = \''.$account.'\' and password = \''.$password.'\'');
			return mysqli_num_rows($result)>0;
		}
	}
?>