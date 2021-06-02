<?php include("db.php");?>
<?php 
	$session_id=$_SESSION['bappy_id'];
	$end_time=time()+720*60;//12 Hours
	$cart_select="select sum(price),sum(quantity) from cart where session_id='".$session_id."'";
	$cart_query=mysqli_query($db,$cart_select);
	$cart_row=mysqli_fetch_assoc($cart_query);
	$cart_total=$cart_row['sum(price)'];
	$cart_quantity=$cart_row['sum(quantity)'];
	if(empty($cart_quantity)){
	$cart_quantity=0;
	}
?>
 <span class="cart_quantity"><i class="fa fa-shopping-cart"></i> <?php echo $cart_quantity?> item(s)-$<?php echo $cart_total?>.00</span>
				<div class="cart_full_child">
					<ul class="cart_ul">
						<li style="height:40px;line-height:40px;text-align:center;"><span class="cart_heading">Sub-Total</span> &nbsp <span class="cart_content">$<?php echo $cart_total?>.00</span></li>
						<li style="height:30px;line-height:30px;padding-left:25px;"><span class="cart_heading">Shipping-Tax(0%)</span> &nbsp <span class="cart_content">$00.00</span></li>
						<li style="height:30px;line-height:30px;padding-left:83px;"><span class="cart_heading">Vat(0%)</span> &nbsp <span class="cart_content">$00.00</span></li>
						<li style="height:30px;line-height:30px;padding-left:99px;"><span class="cart_heading">Total</span> &nbsp <span class="cart_content">$<?php echo $cart_total?>.00</span></li>
						<li style="height:60px;padding:12px 10px;">
							<div class="col-xs-5" style="padding:0;">
								<a href="cart/" class="view_cart"><i class="fa fa-shopping-cart"></i>&nbsp View Cart</a>
							</div>
							<div class="col-xs-offset-1 col-xs-6">
								<a href="checkout" class="checkout"><i class="fa fa-share"></i>&nbsp Checkout</a>
							</div>
						</li>
					</ul>
				</div>
	<script>
		$(".cart_quantity").click(function(){
			$(".cart_full_child").stop().fadeToggle(100);
		});
	</script>