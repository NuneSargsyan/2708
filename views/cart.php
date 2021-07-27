<?php
  include "header.php";
  include "admin/connect.php";
	
?>
<table class="table table-bordered">
    <tr>
     <th >Name</th>
     <th >Count</th>
     <th >Price</th>
     <th >total</th>
    </tr>
   <?php
   if(isset($_COOKIE["shopping_cart"]))
   {


  $query = $conn->query('SELECT * FROM products');
  $query->execute();
  $products = $query->fetchAll();

    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
      foreach($products as $row){
        if($row['id']==$values['item_id']){
           ?>
            <tr>
             <td><a href ="back.php?event=product&id=<?= $row['id'] ?>"><?= $row['title'] ?></a></td>
             <td><?= $values["count"]; ?></td>
             <td><?= $row['price'] ?></td>
             <td> <?php echo number_format($values["count"] *$row['price'], 2);?> AMD</td>
             <td><a href="back.php?event=delete_cart&id=<?= $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
            </tr>
           <?php 
             $total = $total + ($values["count"] * $row['price']);
            }
        }
    }

           ?>
            <tr>
             <td colspan="3" align="right">Total</td>
             <td align="right">$ <?php echo number_format($total, 2); ?></td>
             <td></td>
            </tr>
           <?php
}else{
    echo '
    <tr>
     <td colspan="5" align="center">No Item in Cart</td>
    </tr>
    ';
   }
   ?>
   </table>

   <button class="conf">Confirm</button>