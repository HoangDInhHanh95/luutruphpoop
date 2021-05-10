<?php
	require_once ("config/db.class.php");

	class category
	{
		public $cateid;
		public $categoryname;
		public $description;

		public function __construct($cate_name,$desc)
		{
			$this->categoryname=$cate_name;
			$this->description=$desc;
		}

		public static function list_category()
		{
			$db=new db();
			$sql="SELECT * FROM category";
			$result=$db->select_to_array($sql);
			return $result;
		}
	}
?>
