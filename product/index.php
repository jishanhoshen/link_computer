<?php include('../join/db.php');?>
<?php 
	$session_id=$_SESSION['bappy_id'];
	$end_time=time()+720*60;//12 Hours
	$product_category=htmlspecialchars($_GET['c']);
	$pagination_array_1='c='.htmlspecialchars($_GET['c']);
	$pagination_array_2='';
	/*============================================Pagination PHP Program Start*==================================*/
	if(isset($_GET['cc'])){
	$product_company=htmlspecialchars($_GET['cc']);//$_GET Variable Company
	$pagination_array_2='cc='.htmlspecialchars($_GET['cc']);//$_GET Pagination Variable Company
	$pagination_count_select="select * from products where category='".$product_category."'&&company='".$product_company."'";
	$pagination_count_query=mysqli_query($db,$pagination_count_select);
	$pagination_count=mysqli_num_rows($pagination_count_query);
	}
	else{
	$pagination_count_select="select * from products where category='".$product_category."'";
	$pagination_count_query=mysqli_query($db,$pagination_count_select);
	$pagination_count=mysqli_num_rows($pagination_count_query);
	}
	$page_rows=12;
	$last=ceil($pagination_count/$page_rows);
	if($last<1){
		$last=1;
	}
	$pagenum=1;
	if(isset($_GET['page'])){
		$pagenum=preg_replace('#[^0-9]#','',htmlspecialchars($_GET['page']));
	}
	if($pagenum<1){
		$pagenum=1;
	}else if($pagenum>$last){
		$pagenum=$last;
	}
	$limit=($pagenum-1) * $page_rows.','.$page_rows;
	$textline1="Testimonials (<b>$pagination_count</b>)";
	$textline2="Page <b>$pagenum</b> of <b>$last</b>";
	$paginationctrls='';
	if($last !=1){
		if($pagenum>1){
			$previous=$pagenum-1;
			$paginationctrls .='<div class="pagination"><ul><li class="prev"><a href="../product?'.$pagination_array_1.'&&'.$pagination_array_2.'&&page='.$previous.'">&lt;</a> &nbsp; &nbsp;</li></ul></div>';//Previous Pagination Button
			for($i=$pagenum-0;$i<$pagenum;$i++){
				$paginationctrls .='<a href="../product?'.$pagination_array_1.'&&'.$pagination_array_2.'&&page='.$i.'">'.$i.'</a> &nbsp;';
			}
		}
		$paginationctrls .='<div class="pagination">
								<ul>
									<li><a style="color:red;">'.$pagenum.'</a></li>
								</ul>
								</div>';
		for($i=$pagenum+1;$i<=$last;$i++){
			$paginationctrls .='<div class="pagination">
								<ul>
									<li><a href="../product?'.$pagination_array_1.'&&'.$pagination_array_2.'&&page='.$i.'">'.$i.'</a></li>
								</ul>
								</div>';
			if($i>=$pagenum+9){
				break;
			}
		}
		if($pagenum !=$last){
			$next=$pagenum+1;
			$paginationctrls .='<div class="pagination"><ul><li class="next"><a href="../product?'.$pagination_array_1.'&&'.$pagination_array_2.'&&page='.$next.'">&gt;</a> &nbsp; &nbsp;</li></ul></div>';//Next Pagination Button
		}
	}
/*============================================Pagination PHP Program End*=======================================*/
	if(isset($_GET['c'])||isset($_GET['cc'])||isset($_GET['page'])){}
	else{
		header('location:../index.php');
	}
	//$product_category=htmlspecialchars($_GET['c']);
	if(isset($_GET['cc'])){
	//$product_company=htmlspecialchars($_GET['cc']);
	$product_select="select * from products where category='".$product_category."'&&company='".$product_company."' order by id ASC limit $limit";
	$product_query=mysqli_query($db,$product_select);
	$product_count=mysqli_num_rows($product_query);
	}
	else{
	$product_select="select * from products where category='".$product_category."' order by id ASC limit $limit";
	$product_query=mysqli_query($db,$product_select);
	$product_count=mysqli_num_rows($product_query);
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../js/jquery.min.js"></script><!--Jquery-->
    <title>Link Computer || Home</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.css">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap&family=Philosopher:ital,wght@1,700&display=swap&family=Trade+Winds&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
  </head>
<body>
	<!--===================================All Header Start ===========================================-->
								<?php include '../join/header_2.php';?>
	<!--===================================All Header End ===========================================-->
	
	
	
	
	<!--===================================Content Area Start ===========================================-->
	<div class="container">
		<ul class="category_header">
			<li><i class="fa fa-home"></i></li>
			<li><i class="fa fa-angle-double-right"></i></li>
			<li><?php echo $product_category?></li>
			<li><i class="fa fa-angle-double-right"></i></li>
			<?php 
				if(isset($_GET['cc'])){
					$brand=htmlspecialchars($_GET['cc']);
				}
				else{
					$brand='All';
				}
			?>
			<li><?php echo $brand?></li>
		</ul>
		<div class="category_content">
			<div class="left_menu">
				<div class="title">CATEGORIES</div>
				<div class="category_list">
					<ul>
						<?php 
						$category_select="select * from category";
						$category_query=mysqli_query($db,$category_select);
						while($category_row=mysqli_fetch_assoc($category_query)){
						$category=$category_row['categoryname'];
						$category_count_select="select * from products where category='".$category."'";
						$category_count_query=mysqli_query($db,$category_count_select);
						$category_count=mysqli_num_rows($category_count_query);
						?>
						<li><i class="fa fa-caret-right"></i> <a href="../product/?c=<?php echo $category?>">&nbsp <?php echo $category.' ('.$category_count.')'?></a></li>
						<?php }?>
					</ul>
				</div>
				
				
				
				<div class="title">ACCOUNT</div>
				<div class="category_list">
					<ul>
						<li><i class="fa fa-caret-right"></i> <a href="../login/">&nbsp Login</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="../register/">&nbsp Registar</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Frogotten Password</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp My Account</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Address Book</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Wish List</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Order History</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Return</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp News Letter</a></li>
						
					</ul>
				</div>
			</div>
			<div class="main_content">
				<div class="main_title">
					<?php 
						if(isset($_GET['cc'])){
							echo $product_company;
						}
						else{
							echo $product_category;
						}
					?>
				</div>
				<div class="product_header">
					<div class="li_gri_main">
						<div class="list"><span class="tooltiptext_1">List</span><i class="fa fa-th-list"></i></div>
						<div class="grid"><span class="tooltiptext_2">Grid</span><i class="fa fa-th"></i></i></div>
						<div class="clear"></div>
					</div>
					<div class="product_compare">Product Compare (0)</div>
					<div class="sort_by">Product Found:</div>
					<div class="sort_div"><?php echo $pagination_count?></div>
					<div class="product_found">Product Show:</div>
					<div class="product_found_div">12</div>
					<div class="clear"></div>
				</div><!--Product Header End-->
				
				<!--=========================main product start================================-->
				<div class="product_show_main">
					<?php 
						$latest_no=1;
						while($product_row=mysqli_fetch_assoc($product_query)){
						$product_id=$product_row['id'];
						$product_image=$product_row['image'];
						$product_code=$product_row['code'];
						$product_title=substr($product_row['title'],0,70);
						$product_description=substr($product_row['description'],0,105);
						$product_old_price=$product_row['regular_price'];
						$product_current_price=$product_row['current_price'];
					?>
					<div class="latest_product_main main_box">
						<div class="latest_product_image">
						<img src="../img/product/<?php echo $product_image?>" alt="" onclick="window.location.href='../view_product?id=<?php echo $product_id?>'"/>
						</div>
						<div class="description">
							<div class="description_heading">
								<?php 
									if(strlen($product_title)>=70){
										echo $product_title.'...';
									}
									else{
										echo $product_title;
									}
								?>
							</div>
							<div class="description_content">
								
								<?php 
									if(strlen($product_description)>=105){
										echo $product_description.'...';
									}
									else{
										echo $product_description;
									}
								?>
								
							</div>
							<div class="description_price">
								$<?php echo $product_current_price?>.00 <span> &nbsp <strike>$<?php echo $product_old_price?>.00</strike></span>
							</div>
							<div class="description_vat">
								<span>Vat: $0.00</span>
							</div>
							<div class="cart_row product_page_cart_row">
								<button class="add_cart" value="<?php echo $latest_no?>">
								<i class="fa fa-shopping-cart"></i>&nbsp Add to Cart
								</button>
								<button class="like"><i class="fa fa-heart"></i></button>
								<div class="compire"><i class="fas fa-cog"></i></div>
							</div>
							<input id="latest_title<?php echo $latest_no?>" type="hidden" value="<?php echo $product_title?>"/>
							<input id="latest_code<?php echo $latest_no?>" type="hidden" value="<?php echo $product_code?>"/>
							<input id="latest_image<?php echo $latest_no?>" type="hidden" value="<?php echo $product_image?>"/>
							<input id="latest_price<?php echo $latest_no?>" type="hidden" value="<?php echo $product_current_price?>"/>
							<div class="clear"></div>
						</div>
					</div>
					<?php $latest_no++;}?>
					<div class="clear"></div>
				</div>
		<script>
			$(".add_cart").click(function(){
				var no=$(this).attr("value");
				var title=$('#latest_title'+no).val();
				var code=$('#latest_code'+no).val();
				var image=$('#latest_image'+no).val();
				var price=$('#latest_price'+no).val();
				var id='<?php echo $session_id?>';
				var time='<?php echo $end_time?>';
				$.post("../join/cart_ajax.php",{title:title,code:code,image:image,price:price,id:id,time:time},function(data){$(".main_print").html(data)});
				setTimeout(function(){
					$("body,html").animate({scrollTop:0},500);
				},100);
				setTimeout(function(){
					$(".cart_success").fadeIn(500);
					setTimeout(function(){
						$(".cart_success").fadeOut(500);
					},3000);
					$.post("../join/cart_total_ajax_2.php",{quantity:0},function(data){$(".cart").html(data)});
				},1000);
			});
		</script>
				<!--=========================main product end================================-->
					<center><div id="pagination_controls"><?php echo $paginationctrls?></div></center>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!--===================================Content Area End ===========================================-->
	
	
	
	
	
	<!--===================================Footer Start ====================================-->
							<?php include('../join/footer.php');?>
	<!--===================================Footer End ====================================-->
	
	
	
	
	
	
	
	
	
    
    <!--==============================Javascript Link Start ========================================-->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/slider.js"></script>
<script>
$(".list").click(function(){$(".main_box").css("width","100%");$(".main_box").css("margin-left","0");$(".main_box").css("min-height","283px");$(".latest_product_image").css("width","29.4%");$(".latest_product_image").css("float","left");$(".latest_product_image").css("margin-left","13px");$(".latest_product_image").css("margin-right","18px");$(".compire").css("margin-right","37%");$(".compire").css("transition","none");$(".grid").css("color","#f4f4f4");$(".list").css("color","#22ace9");});$(".grid").click(function(){$(".main_box").css("width","31.1%");$(".main_box").css("margin-left","3%");$(".main_box:first-child").css("margin-left","0%");$(".main_box:nth-child(4)").css("margin-left","0%");$(".main_box:nth-child(7)").css("margin-left","0%");$(".main_box:nth-child(10)").css("margin-left","0%");$(".main_box").css("min-height","484px");$(".latest_product_image").css("width","100%");$(".latest_product_image").css("float","none");$(".latest_product_image").css("margin-left","0");$(".latest_product_image").css("margin-right","0");$(".compire").css("margin-right","0");$(".compire").css("transition","none");$(".grid").css("color","#22ace9");$(".list").css("color","#f4f4f4");});
if(window.history.replaceState){
	window.history.replaceState(null,null,window.location.href);
}
$(".like").click(function(){
	$.post("../join/like_ajax.php",{like:0},function(data){$(".bbb").html(data)});
	window.location.href='';
});
 </script>
	<!--==============================Javascript Link End ========================================-->
  </body>
</html>