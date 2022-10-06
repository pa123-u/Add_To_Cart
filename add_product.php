<html>
<?php
include('db.php');
 ?>
<body>
  <center>
<form enctype="multipart/form-data" method="post">
<table>
  <th colspan="1">
      <td><h2> ADD PRODUCT</h2></td>
  </th>
  <tr> <td>Product Code</td> <td><input type="text" name="pcode"/></td> </tr>
  <tr> <td>Product Name</td> <td><input type="text" name="pname"/></td> </tr>
  <tr> <td>Product Price</td> <td><input type="text" name="price"/></td> </tr>
  <tr> <td>Product Image</td> <td><input type="file" name="pimage"/></td> </tr>
  <tr> <td><button type="submit" class="btn btn-default" name="add_product">ADD</button></td> </tr>

</table>
</form>
</center>


<?php
//
if (isset($_POST['add_product'])) {


  $pcode=$_POST['pcode'];
  $pname=$_POST['pname'];
  $price=$_POST['price'];
  echo $pcode.$pname.$price;
  $target_path = "image/";
$target_path = $target_path.basename( $_FILES['pimage']['name']);

if(move_uploaded_file($_FILES['pimage']['tmp_name'], $target_path)) {
echo $target_path;
  $query="INSERT INTO product(code,name,price,image) VALUES ('$pcode','$pname',$price,'$target_path')";
    $sql=mysqli_query($con,$query);
    if ($sql) {
       echo ("<script>location.href='admin.php'</script>");
   
   }else {
     echo "Error";
   }
}
}
?>
</body>
</html>
