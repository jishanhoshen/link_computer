<?php include('../join/db.php');?>
<?php 
	$session_id=$_SESSION['bappy_id'];
	$end_time=time()+720*60;//12 Hours
	$keyword=htmlspecialchars($_GET['keyword']);
	$select="select * from products where title like '%$keyword%'";
	$query=mysqli_query($db,$select);
	$rows=mysqli_num_rows($query);//first count query
	$page_rows=10;
	$last=ceil($rows/$page_rows);
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
	$product_select="select * from products where title like '%$keyword%' order by id ASC limit $limit";
	$product_query=mysqli_query($db,$product_select);//main query for product
	$textline1="Testimonials (<b>$rows</b>)";
	$textline2="Page <b>$pagenum</b> of <b>$last</b>";
	$paginationctrls='';
	if($last !=1){
		if($pagenum>1){
			$previous=$pagenum-1;
			$paginationctrls .='<div class="pagination"><ul><li class="prev"><a href="../search?keyword='.$keyword.'&&page='.$previous.'">&lt;</a> &nbsp; &nbsp;</li></ul></div>';//Previous Pagination Button
			for($i=$pagenum-0;$i<$pagenum;$i++){
				$paginationctrls .='<a href="../search?keyword='.$keyword.'&&page='.$i.'">'.$i.'</a> &nbsp;';
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
									<li><a href="../search?keyword='.$keyword.'&&page='.$i.'">'.$i.'</a></li>
								</ul>
								</div>';
			if($i>=$pagenum+9){
				break;
			}
		}
		if($pagenum !=$last){
			$next=$pagenum+1;
			$paginationctrls .='<div class="pagination"><ul><li class="next"><a href="../search?keyword='.$keyword.'&&page='.$next.'">&gt;</a> &nbsp; &nbsp;</li></ul></div>';//Next Pagination Button
		}
	}
	if(isset($_POST['search_sbt'])){
		$search_word=$_POST['search'];
		header('location:../search?keyword='.$search_word.'');
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
			<li style="color:#22ace9;">Search Engine</li>
		</ul>
		<div class="category_content" style="min-height:500px;">
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
			</div>
			<div class="main_content" style="padding-top:0;min-height:400px;">
				<div class="search_heading">Search Keyword</div>
				<div class="search_border"></div>
				<div class="search_box_main">
					<form method="post" autocomplete="off">
						<input type="text" value="<?php echo $keyword?>" name="search"/>
						<button name="search_sbt"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<?php 
					$product_count=mysqli_num_rows($product_query);
					if($product_count==0){echo '<div class="search_empty">No product found in this keyword</div>';}
					$latest_no=1;
					while($product_row=mysqli_fetch_assoc($product_query)){
					$id=$product_row['id'];
					$title=$product_row['title'];
					$image=$product_row['image'];
					$description=substr($product_row['description'],0,180);
					$code=$product_row['code'];
					$price=$product_row['current_price'];
				?>
				<div class="search_result_main">
					<div class="search_image">
						<a href="../view_product?id=<?php echo $id?>"><img src="../img/product/<?php echo $image?>" alt="" /></a>
					</div>
					<div class="search_content">
						<div class="search_p_name"><?php echo $title?></div>
						<div class="search_p_description">
							<?php 
								if(strlen($description)>=180){
									echo $description.'...';
								}
								else{
									echo $description;
								}
							?>
						</div>
						<div class="search_p_price">$<?php echo $price?>.00</div>
						<div class="search_cart_box">
							<button class="add_cart" value="<?php echo $latest_no?>">
								<i class="fa fa-shopping-cart"></i>&nbsp; Add to Cart
							</button>
							<button class="like"><i class="fa fa-heart"></i></button>
							<a href="../view_product?id=<?php echo $id?>"><button class="like">View</button></a>
							<div class="clear"></div>
							<input id="latest_title<?php echo $latest_no?>" type="hidden" value="<?php echo $title?>"/>
							<input id="latest_code<?php echo $latest_no?>" type="hidden" value="<?php echo $code?>"/>
							<input id="latest_image<?php echo $latest_no?>" type="hidden" value="<?php echo $image?>"/>
							<input id="latest_price<?php echo $latest_no?>" type="hidden" value="<?php echo $price?>"/>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<?php $latest_no++;}?>
				<center><div id="pagination_controls"><?php echo $paginationctrls?></div></center>
			</div>
			<div class="clear"></div>
		</div>
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
			
			if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);
			}
			$(".like").click(function(){
				$.post("../join/like_ajax.php",{like:0},function(data){$(".bbb").html(data)});
				window.location.href='';
			});
		</script>
	<!--===================================Content Area End ===========================================-->
	
	
	
	
	
	<!--===================================Footer Start ====================================-->
							<?php include('../join/footer.php');?>
	<!--===================================Footer End ====================================-->
	
	
	
	
	
	
	
	
	
    
    <!--==============================Javascript Link Start ========================================-->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/slider.js"></script>
	<!--==============================Javascript Link End ========================================-->
  </body>
</html>