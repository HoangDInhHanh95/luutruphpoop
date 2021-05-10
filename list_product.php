<?php
  require_once ("entities/product.class.php");
  require_once ("entities/category.class.php");
?>
<?php
  include_once ("header.php");
  if(!isset($_GET["cateid"]))
  {
    $prods=product::list_product();
  }
  else {
      $cateid=$_GET["cateid"];
      $prods=product::list_product_by_cateid($cateid);
  }
  $cates=category::list_category();
?>
<div class="container text-center">
  <div class="col-sm-3">
    <h3>Danh mục</h3>
    <ul class="list-group">
      <?php
        foreach ($cates as $item) {
          echo "<li class='list-group-item'>
          <a href=/hoangdinhhanh/list_product.php?cateid=".$item["cateid"]."> ".$item["categoryname"]."</a></li>";
        }
      ?>
    </ul>
  </div>
  <div class="col-sm-9">
  	<h3>Sản phẩm cửa hàng</h3><br>
  	<div class="row">
  	<?php
  		foreach ($prods as $item )
  		{
  	?>
  			<div class="col-sm-4">
  				<img src="<?php echo $item["picture"]; ?>" class="img-responsive" style="width:100%" alt="image">
  				<p class="text-danger"><a href="/hoangdinhhanh/product_detail.php?id=<?php echo $item["productid"]; ?>"><?php echo $item["productname"]; ?></a></p>
  				<p class="text-info"><?php echo $item["price"]; ?></p>
  				<p>
  					<button type="button" class="btn btn-primary" onclick="location.href='/hoangdinhhanh/shopping_cart.php?id=<?php echo $item["productid"]; ?>'">Mua hàng</button>
  				</p>
  			</div>
  	<?php
  		}
  	?>
  	</div>
  </div>
</div>
<?php
  include_once ("footer.php");
?>
