<?php
//include 'admin/inc/dbconfig.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// code... add product to cart
	if (isset($_POST['add_to_cart'])) {
		if (isset($_SESSION['cart'])) {
			$myitems = array_column($_SESSION['cart'], 'Pname');
			if (in_array($_POST['Pname'], $myitems)) {
					echo "<script>
					 alert('Item Already Added!');
					 window.location.href='index.php';
					</script>";
	          		//echo '<META HTTP-EQUIV="Refresh" content="0; URL=index.php">';
			}
			else {
				$count = count($_SESSION['cart']);
				$_SESSION['cart'][$count] = array('Pname' => $_POST['Pname'], 'price' => $_POST['price'], 'quantity' =>1);
				//print_r($_SESSION['cart']);
				echo "<script>
						alert('Item Added to cart!');
						window.location.href='index.php';
					</script>";
			}
		}
			else {
				//$count = count($_SESSION['cart']);
				$_SESSION['cart'][0] = array('Pname' => $_POST['Pname'], 'price' => $_POST['price'], 'quantity' =>1);
				print_r($_SESSION['cart']);
				echo "<script>
					alert('Item Added to Cart!');
				</script>";
	          	echo '<META HTTP-EQUIV="Refresh" content="0; URL=index.php">';
			}
	}
	// remove product to cart
	if (isset($_POST['remove_to_cart'])) {
		# code...
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['Pname']==$_POST['Pname']) {
				unset($_SESSION['cart'][$key]);
				$_SESSION['cart']=array_values($_SESSION['cart']);
				echo "<script>
					 alert('Item Removed to Cart!');
					 window.location.href='index.php';
					</script>";
			}
		}
	}
	// modify  quantity
	if (isset($_POST['mod_qty'])) {
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['Pname'] == $_POST['Pname']) {
				$_SESSION['cart'][$key]['quantity'] = $_POST['mod_qty'];
				echo "<script>
                	window.location.href='my_cart.php';
                </script>";
			}
		}
	}

}
?>