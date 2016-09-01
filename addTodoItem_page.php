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
?>
<form action="addTodoItem.php" method="post">
<input type="text" name="todoitem" placeholder="THING TO DO" size="80">
<br>
Select Category:
<select name="todoitemcategory">
	<?php 
	foreach($categories as $category)
	{
	?>
	<option value="<?php echo $category ?>" <?php if($category == "none"){ echo "selected"; }?>><?php echo $category ?></option>
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
	<option value="<?php echo $type ?>" <?php if($type == "none"){ echo "selected"; }?>><?php echo $type ?></option>
	<?php
	}
	?>
</select>
<button type="submit">Add</button><br>
</form>	
	
<?php include("views/footer.php"); ?>
