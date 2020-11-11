<?php 
include('top.php');
if(isset($_GET['id']) && $_GET['id']>0){
  $id=get_safe_value($_GET['id']);
  $sql="select order_master.*,order_status.order_status as order_status_str from order_master,order_status where order_master.order_status=order_status.id and order_master.id='$id' order by order_master.id desc";
  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0){
    $orderRow=mysqli_fetch_assoc($res);

  }

	
}
else{
  redirect(index.php);
}
?>
  <div class="page-header">
  <div>
  <?php 
    $orderStatusRes = mysqli_query($con,'select * from order_status order by order_status')
  
  
  ?>
  </div>
    <select class="form-control" name="order_status" id="order_status" onchange="updateOrderStatus()">
    <option value="">Update Order Status</option>
    <?php
    while($orderStatusRow = mysqli_fetch_assoc($orderStatusRes)){
      echo "<option value=".$orderStatusRow['id'].">".$orderStatusRow['order_status']."</option>";
    }
    
    
    ?>
    
    </select>
  
  <div>
        
  
  </div>
  
  
  
  </div>
  <script>
  function updateOrderStatus(){
    // alert("Working")
    var order_status = jQuery('#order_status').val();
    // alert(order_status)
    if(order_status!=''){
      var oid = '<?php echo $id?>';
      window.location.href = '<?php echo FRONT_SITE_PATH?>admin/order_detail.php/?id='+oid+'&order_status='+order_status;
    }
  }
  
  
  </script>
                  
<?php include('footer.php');?>