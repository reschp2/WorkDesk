<?php include("start_session.php"); ?>
<?php include("checkLoginStatus.php"); ?>
<?php include("/views/header.php"); ?>
<?php 
	include("todo_class.php");
	$todo = new todo($id,$conn);
	//create array of todo categories for html drop down
	$categories = $todo->getCategoryList();
	//create array of todo types for html drop down 
	$types = $todo->getTypeList();
	//get $itemId
	$itemId = $_POST["itemId"];
	//get item info
	$item = $todo->getItem($itemId);
	//put $itemId in $_SESSION
	$_SESSION["itemId"] = $itemId;
?>
<form action="updateTodoItem.php" method="post">
<input type="text" name="todoitem" placeholder="<?php echo $item->getItem()?>" value="<?php echo $item->getItem() ?>" size="80">
<br>
Select Category:
<select name="todoitemcategory">
	<?php 
	foreach($categories as $category)
	{
	?>
	<option value="<?php echo $category; ?>" <?php if($item->getCategory() == $category){ echo "selected"; }?>><?php echo $category; ?></option>
	<?php
	}
	?>
</select>
Select Type:
<select name="todoitemtype">
	<?php 
	foreach($types as $type)
	{
	?>
	<option value="<?php echo $type; ?>" <?php if($item->getType() == $type){ echo "selected"; }?>><?php echo $type; ?></option>
	<?php
	}
	?>
</select>
<button type="submit">Ok</button><br>
</form>	
	
<?php include("views/footer.php"); ?>
