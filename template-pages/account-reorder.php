<?php
/*
  Template Name:Account Reorder Checks
 */
?>

<?php 


if(isset($_GET['invalid_order']) && !empty($_GET['invalid_order'])){
   $invalid_order = true; 
   $msg = 'Invalid Order';
}

if(isset($_GET['incomplete_order']) && !empty($_GET['incomplete_order'])){
   $incomplete_order = true;   
   $msg = 'Incomplete Order';
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $order_id = $_POST['order_again'];
  $myaccount = get_permalink( get_option('woocommerce_myaccount_page_id') );
  if(wc_get_order($order_id)){
  
      $order = new WC_Order( $order_id ); 
      $order_url = $order->get_view_order_url();
      
      if ( $order->has_status( 'completed' ) ) {
          $wpnonce = wp_nonce_url( add_query_arg( 'order_again', $order_id ) , 'woocommerce-order_again' );
          $wpnonce  = str_replace("&amp;","&", $wpnonce);
            wp_redirect($wpnonce);
          exit;
      } else {      
            wp_redirect($myaccount.'/reorder?incomplete_order=true');
          exit;
      }
  } else {
           wp_redirect($myaccount.'/reorder?invalid_order=true');
  }

}

?>
<?php get_header(); ?>
<section class="selling-checks"> 
    <div class="container">
        <div class="row">
            <div class="section-heading"> <h2> Reorder Checks</h2></div>
        </div>
        
        <?php if(isset($invalid_order) || isset($incomplete_order) ){ ?>
        <div class="row order-msg">
            <div class="alert alert-danger">
                <?php echo $msg; ?>
            </div>
        </div>
        <?php } ?>
        <div class="row product-reorder" > 
            <div class="panel panel-default">
              <div class="panel-heading">Reorder Checks</div>
              <div class="panel-body">
              
              <form class="form-inline row" action="" method="post">
                  <div class="form-group col-md-12">
                    <label for="exampleInputName2">Previous Order Id</label>
                    <input type="text" class="form-control" id="order-id" name="order_again" placeholder="Please Enter your Order Id">
                  </div>
                  <div class="col-md-12">
                     <button type="submit" class="btn btn-default">Reorder</button>
                  </div>
            </form>
              
              </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>