<?php
	class Database{
		public $db;
		public function __construct(){
			$this->db=new mysqli('localhost','root','root','fp');
			$this->db->query('set names utf8');
		}
	}
?>