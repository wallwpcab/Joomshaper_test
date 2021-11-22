<?php 
	session_start();
    //connect to database
	$db = mysqli_connect('localhost:3307', 'root', '', 'crud');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	//$update = false;
    $edit_state = false;
    // if button is clicked
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: OrderList_page.php');
	}
    
    if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: product_page.php');
	}

    if(isset($_POST['update'])) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $id = mysqli_real_escape_string($db, $_POST['id']);

        mysqli_query($db, "UPDATE info SET name = '$name', address = '$address' WHERE id =$id");
        $_SESSION['message'] = "Address updated";
        header('location: OrderList_page.php'); 


    }

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id = $id");
        $_SESSION['message'] = "Address deleted";
        header('location: OrderList_page.php'); 
     }


    if(isset($_POST['update'])) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $id = mysqli_real_escape_string($db, $_POST['id']);

        mysqli_query($db, "UPDATE info SET name = '$name', address = '$address' WHERE id =$id");
        $_SESSION['message'] = "Address updated";
        header('location: product_page.php'); 


    }

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id = $id");
        $_SESSION['message'] = "Address deleted";
        header('location: product_page.php'); 
    }
    



    
    


    $results = mysqli_query($db, "SELECT * FROM  info");


?>