<?php
  require_once ("entities/product.class.php");
  require_once ("entities/category.class.php");
?>

<?php
  include_once ("header.php");
  if(!isset($_GET["id"]))
  {
    header("Location: not_found.php");
  }
  else {
    $id=$_GET["id"];
    $prod=reset(product::get_product($id));
    $prods_relate=product::list_product_relate($prod["cateid"],$id);
  }
  $cates=category::list_category();
?>
<div class="container text-center">
  <div class="col-sm-3 panel panel-danger">
    <h3 class="panel-heading">Danh mục</h3>
    <ul class="list-group">
      <?php
        foreach ($cates as $item) {
          echo "<li class='list-group-item'><a href=/hoangdinhhanh/list_product.php?cateid=".$item["cateid"].">".$item["categoryname"]."</a></li>";
        }
      ?>
    </ul>
  </div>
  <div class="col-sm-9 panel panel-info">
    <h3 class="panel-heading">Chi tiết sản phẩm</h3>
    <div class="row">
      <div class="col-sm-6">
        <img src="<?php echo $prod["picture"]; ?>" class="img-responsive" style="width:100%" alt="image">
      </div>
      <div class="col-sm-6">
        <div style="padding-left:10px;">
          <h3 class="text-info">
            <?php echo $prod["productname"]; ?>
          </h3>
          <p>
            Giá: <?php echo $prod["price"] ?>
          </p>
          <p>
            Mô tả: <?php echo $prod["description"] ?>
          </p>
          <p>
            <button type="button" class="btn btn-danger">Mua hàng</button>
          </p>
        </div>
      </div>
    </div>
    <h3 class="panel-heading">Sản phẩm liên quan</h3>
    <div class="row">
      <?php
        foreach ($prods_relate as $item) {
      ?>
          <div class="col-sm-4">
            <a href="/hoangdinhhanh/product_detail.php?id=<?php echo $item["productid"]; ?>">
              <img src="<?php echo $item["picture"] ?>" class="img-responsive" style="width:100%;" alt="image">
            </a>
            <p class="text-danger"><?php echo $item["productname"]; ?></p>
            <p class="text-info"><?php echo $item["price"] ?></p>
            <p>
              <button type="button" class="btn btn-primary">Mua hảng</button>
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
