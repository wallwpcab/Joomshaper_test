<?php  include('server.php');


	// if (isset($_GET['edit'])) {
	// 	$id = $_GET['edit'];
	// 	$update = true;
	// 	$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

	// 	if (count($record) == 1 ) {
	// 		$n = mysqli_fetch_array($record);
	// 		$name = $n['name'];
	// 		$address = $n['address'];
	// 	}
	// }
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM info WHERE id = $id");
        $record = mysqli_fetch_array($rec);
        $name = $record['name'];
        $address = $record['address'];
        $id = $record['id'];
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td>
				<a href="product_page.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>


	<form method="post" action="server.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">

		<div class="input-group">
			<label>Product Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">

			<!-- <input type="text" name="name" value=""> -->
		</div>
		<div class="input-group">
			<label>product Values</label>
			<!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
            <input type="text" name="name" value="<?php echo $name; ?>">

			<!-- <input type="text" name="address" value=""> -->
		</div>
		<div class="input-group">
		<?php if ($edit_state == false): ?>
	        <button class="btn" type="submit" name="save" style="background: #556B2F;" >save</button>
            <?php else: ?>
	        <button class="btn" type="submit" name="update" >Update</button>
            <?php endif ?>
			<!-- <button class="btn" type="submit" name="save" >Save</button> -->
		</div>
	</form>
</body>
</html>
 