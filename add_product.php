<?php
	require_once ("entities/product.class.php");
	require_once ("entities/category.class.php");

	if(isset($_POST["btnsubmit"]))
	{
		$productname=$_POST["txtname"];
		$cateid=$_POST["txtcateid"];
		$price=$_POST["txtprice"];
		$quantity=$_POST["txtquantity"];
		$description=$_POST["txtdesc"];
		$picture=$_FILES["txtpic"];

		$newproduct=new product($productname,$cateid,$price,$quantity,$description,$picture);
		$result=$newproduct->save();
		if(!$result)
		{
			header("Location: add_product.php?failure");
		}
		else
		{
			header("Location: add_product.php?inserted");
		}
	}
?>

<?php
	include_once ("header.php");
?>

<?php
	if(isset($_GET["inserted"]))
	{
		echo"<h2>Thêm sản phẩm thành công</h2>";
	}
?>

<form method="post" enctype="multipart/form-data" style="margin-left: 60px;">
	<div class="row">
		<div class="lbltitle">
			<label>Tên sản phẩm</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtname" value="<?php echo isset($_POST["txtname"]) ? $_POST["txtname"] : ""; ?>" />
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Mô tả sản phẩm</label>
		</div>
		<div class="lblinput">
			<textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : ""; ?>"></textarea>
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Số lượng sản phẩm</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : ""; ?>" />
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Giá bán</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : ""; ?>" />
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Chọn loại sản phẩm</label>
		</div>
		<div class="lblinput">
			<select name="txtcateid">
				<option value="" selected>---Chọn loại sản phẩm---</option>
				<?php
					$cates=category::list_category();
					foreach ($cates as $item)
					{
						echo "<option value=".$item["cateid"].">".$item["categoryname"]."</option>";
					}
				?>
			</select>
	</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Đường dẫn hình</label>
		</div>
		<div class="lblinput">
			<input type="file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.JPG" />
		</div>
	</div>

	<div class="row">
		<div class="submit">
			<input type="submit" name="btnsubmit" value="Thêm sản phẩm" />
		</div>
	</div>
</form>

<?php include_once ("footer.php"); ?>
