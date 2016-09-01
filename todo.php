<?php include("start_session.php"); ?>
<?php include("checkLoginStatus.php"); ?>
<?php include("/views/header.php"); ?>
<?php include("/views/nav.php"); ?>

<center>
<?php
	echo "To-Do List";
?>
	<form action="addTodoItem_page.php">
		<button type="submit">Add Item</button>
	</form>
</center>

<?php

	include("todo_class.php");
	$todo = new todo($id, $conn);
	//get array of todoItems of current user
	$todoItems = $todo->getItems();
	//print todo items if any exist
	if($todo->getItemCount() != 0)
	{
?>
		<table style="width:100%">
		  <tr>
		    <th>User ID</th>
		    <th>Entry ID</th>
		    <th>Entry</th>
		    <th>Category</th>
		    <th>Type</th>
		    <th>Cross Off Task</th>
		    <th>Change a Task</th>
		  </tr>
	<?php
		foreach($todoItems as $item)
		{
	?>
		  <tr>
		    <td><center><?php echo $item->getUserId(); ?></center></td>
		    <td><center><?php echo $item->getId(); ?></center></td>
		    <td><center><?php echo $item->getItem(); ?></center></td>
		    <td><center><?php echo $item->getCategory(); ?></center></td>
		    <td><center><?php echo $item->getType();?></center></td>
		    <td><center><form action ="deleteItem.php" method="post"><button type="submit" name="itemId" value="<?php echo $item->getId(); ?>">Cross</input></form></center></td>
		    <td><center><form action ="updateTodoItem_page.php" method="post"><button type="submit" name="itemId" value="<?php echo $item->getId(); ?>">Edit</input></form></center></td>
		  </tr>
	<?php
		}
	}
	else
	{
		echo "No items in todo list.";
	}
	?>
		</table> 
<center>
	<form action="addTodoItem_page.php">
		<button type="submit">Add Item</button>
	</form>
</center>

<?php include("views/footer.php"); ?>
