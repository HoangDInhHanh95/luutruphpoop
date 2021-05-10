<?php
	require_once ("config/db.class.php");
	class product
	{
		public $productid;
		public $productname;
		public $cateid;
		public $price;
		public $quantity;
		public $description;
		public $picture;

		public function __construct($pro_name,$cate_id,$price,$quantity,$desc,$picture)
		{
			$this->productname=$pro_name;
			$this->cateid=$cate_id;
			$this->price=$price;
			$this->quantity=$quantity;
			$this->description=$desc;
			$this->picture=$picture;
		}

		public function save()
		{
			$file_temp=$this->picture['tmp_name'];
			$user_file=$this->picture['name'];
			$timestamp=date("Y").date('m').date("h").date("i").date("s");
			$filepath="uploads/".$timestamp.$user_file;

			if(move_uploaded_file($file_temp,$filepath)==false)
			{
				return false;
			}

			$db= new db();
				$sql="INSERT INTO product (productname,cateid,price,quantity,description,picture) VALUES
			('$this->productname','$this->cateid','$this->price','$this->quantity','$this->description','$filepath')";
			$result	=$db->query_execute($sql);
			return $result;
		}

		public static function list_product()
		{
			$db=new db();
			$sql="SELECT * FROM product";
			$result=$db->select_to_array($sql);
			return	$result;
		}

		public static function list_product_by_cateid($cateid)
		{
			$db=new db();
			$sql="SELECT*FROM product WHERE cateid='$cateid'";
			$result=$db->select_to_array($sql);
			return $result;
		}

		public static function list_product_relate($cateid,$id)
		{
			$db=new db();
			$sql="SELECT * FROM product WHERE	cateid='$cateid' AND productid!='$id'";
			$result=$db->select_to_array($sql);
			return $result;
		}

		public static function get_product($id)
		{
			$db=new db();
			$sql="SELECT * FROM product WHERE productid='$id'";
			$result=$db->select_to_array($sql);
			return $result;
		}
	}
?>
