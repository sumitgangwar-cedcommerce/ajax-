<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$(".add-to-cart").click(function(){
			event.preventDefault();
			var data = $(this).attr('href').split('=');
			
			$.ajax({
				type : 'post',
				url : 'store_item.php',
				data:{
					name : data[0],
					image : data[1],
					price : data[2]
				},
				success:function(response) {
          			document.getElementById("res").value=response;
					  	

				}
			});
			show_cart();	
		});
	});
	function show_cart()
    {
      $.ajax({
      type:'post',
      url:'store_item.php',
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("res").innerHTML=response;
        // $("#res").slideToggle();
      }
     });

    }
</script>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php include('header.php');
	  include('config.php');?>
	<div id="main">
		<div id="products">
			<?php foreach($products as $val){ ?>
			<div id="product-101" class="product">
				<img src="<?php echo $val['image'];?>">
				<h3 class="title"><a href="#"><?php echo $val['name'];?></a></h3>
				<span><?php echo $val['price'];?></span>
				<a class="add-to-cart" href="<?php echo $val['name'];?>=<?php echo $val['image'];?>=<?php echo $val['price'];?>">Add To Cart</a>
			</div>
			<?php } ?>
			
		</div>
	</div>

	<div id="res"></div>
	<?php include('footer.php')?>
	
	
</body>
</html>