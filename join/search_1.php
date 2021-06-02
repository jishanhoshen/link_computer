<?php 
	include('db.php');
			$search=$_POST['search'];
			if(empty($search)){}
			else{
			$count_select="select * from products where keyword like '%$search%'";
			$count_query=mysqli_query($db,$count_select);
			$count_count=mysqli_num_rows($count_query);
			$c=$count_count-10;
			$select="select * from products where keyword like '%$search%' limit 10";
			$query=mysqli_query($db,$select);
			$count=mysqli_num_rows($query);
			if($count_count>0){
				while($row=mysqli_fetch_assoc($query)){
				$id=$row['id'];
				$title=$row['title'];
				$image=$row['image'];
				$price=$row['current_price'];
				echo'		
					<a href="view_product?id='.$id.'">
					<div class="search_main_div">
						<div class="search_img"><img src="img/product/'.$image.'" alt=""/></div>
						<div class="search_content">'.$title.' <br /><span>'.$price.' ৳</span></div>
						<div class="clear"></div>
					</div>
				</a>
				';
				} 
				if($count_count>10){echo '<a href="search?keyword='.$search.'"><div class="search_more">'.$c.' More Result</div></a>';}
			} 
			else{
					echo'		
					<div class="search_no_result">
						<i class="fa fa-ban"></i> <span>No result found in this keyword</span>
					</div>
				';
				}
		}
?>
