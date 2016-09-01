<?php
include("todoItem_class.php");
class todo
{
	private $todoItems = array();	//array of todo item (todoItem_class.php) objects
	private $itemCount;		//number of todoItems in object array
	private $userId;		//userId of user that items belong to
	private $conn;			//db connection

        function __construct($userId, $conn) 
	{
		$this->conn = $conn;  //set db connection
		$this->userId = $userId; //set user id
		$this->makeTodoList();
        }
        
        //fill $todoItems array with todo items of user specified by $userId
        public function makeTodoList()
        {
        	$this->itemCount = 0;  //set item count to zero
        	$sql = "SELECT * FROM todoItem 
			INNER JOIN todoCategory ON todoItem.todoItemCategory = todoCategory.todoCategoryId
			INNER JOIN todoType ON todoItem.todoType = todoType.todoTypeId 
			WHERE todoItem.userId = $this->userId
			ORDER BY todoItemId";
		$stmt = sqlsrv_query( $this->conn, $sql);
		//check for error in query execution
		if( $stmt === false ) 
		{
		     die( print_r( sqlsrv_errors(), true));
		}
		//check that rows were returned
		if(sqlsrv_has_rows($stmt))
		{
			//fill todoItems array with all items belonging to user specified by $userId
			while( $obj = sqlsrv_fetch_object($stmt)) 
			{
				$temp = new todoItem($obj->todoItemId,$obj->todoItem,$obj->category,$obj->todoType,$obj->userId);
				$this->todoItems[$this->itemCount++] = $temp;
			}
		}
        }
        
        //returns array of category names from database where category ids are keys and category names are values
        public function getCategoryList()
        {
        	$categoryList = array();
        	$sql = "SELECT * FROM todoCategory";
		$stmt = sqlsrv_query( $this->conn, $sql);
		if(sqlsrv_has_rows($stmt))
		{
			//get Category list
			while( $obj = sqlsrv_fetch_object($stmt)) 
			{
				$categoryList[$obj->todoCategoryId] = $obj->category;
			}
		}
		return $categoryList;
        }
        
        //returns array of type names from database where type ids are keys and type names are values
        public function getTypeList()
        {
        	$typeList = array();
        	$sql = "SELECT * FROM todoType";
		$stmt = sqlsrv_query($this->conn, $sql);
		if(sqlsrv_has_rows($stmt))
		{
			//get Type list
			while( $obj = sqlsrv_fetch_object($stmt)) 
			{
				$typeList[$obj->todoTypeId] = $obj->todoType;
			}
		}
		return $typeList;
        }
        
        //returns current size of todoItems array
        public function getItemCount()
        {
        	return $this->itemCount;
        }
        
        //creates a new todo item in database and updates the array of todoItems
        public function addItem($item, $itemCategory, $itemType)
        {
        	//get array of todo item categories where category names are the keys and the values are category ids
        	$categories = array_flip($this->getCategoryList());
        	//set category id for insertion into database
        	$itemCategoryId = $categories[$itemCategory];
        	//get array of todo item types where type names are the keys and the values are type ids
        	$types = array_flip($this->getTypeList());
        	//set type id for insertion into database
        	$itemTypeId = $types[$itemType];
        	//prep value strings for insertion statement
        	$item = "'".strval($item)."'";
        	$sql = "INSERT INTO todoItem (todoItem, todoItemCategory, todoType, userId)
        		VALUES($item, $itemCategoryId, $itemTypeId, $this->userId)";
        	//create new todo item in database
        	$stmt = sqlsrv_query( $this->conn, $sql);
        	//check for error in query execution
		if( $stmt === false ) 
		{
		     die( print_r( sqlsrv_errors(), true));
		}
		//remake todoItems array to include new item
		$this->makeTodoList();
        }
        
        //returns todoItems array
        public function getItems()
        {
        	return $this->todoItems;
        }
        
        //delete item specified by $itemId
        public function deleteItem($itemId)
        {	
        	$sql = "DELETE FROM todoItem
        		WHERE todoItem.todoItemId = $itemId";
        	$stmt = sqlsrv_query( $this->conn, $sql);
        	//check for error in query execution
		if( $stmt === false ) 
		{
		     die( print_r( sqlsrv_errors(), true));
		}
		//remake todoItem array with deleted item excluded
		$this->makeTodoList();
        } 
        
        //update item specified by $itemId
        public function updateItem($itemId, $item, $itemCategory, $itemType)
        {
        	//get array of todo item categories where category names are the keys and the values are category ids
        	$categories = array_flip($this->getCategoryList());
        	//set category id for insertion into database
        	$itemCategoryId = $categories[$itemCategory];
        	//get array of todo item types where type names are the keys and the values are type ids
        	$types = array_flip($this->getTypeList());
        	//set type id for insertion into database
        	$itemTypeId = $types[$itemType];
        	//prep value strings for insertion statement
        	$item = "'".strval($item)."'";
        	$sql = "UPDATE todoItem
        		SET todoItem =$item, todoItemCategory=$itemCategoryId, todoType=$itemTypeId
        		WHERE todoItemId=$itemId";
        	$stmt = sqlsrv_query( $this->conn, $sql);
        	//check for error in query execution
		if( $stmt === false ) 
		{
		     die( print_r( sqlsrv_errors(), true));
		}
		//remake todoItem array with updated item included
		$this->makeTodoList();
        }
        
        //returns a specific todo item object specified by $itemId
        public function getItem($itemId)
        {
        	$index = 0;	//hold index of current object in todoItems array
        	while($this->todoItems[$index]->getId() != $itemId)
        	{
        		$index = $index + 1;
        	}
        	return $this->todoItems[$index];
        }      	
}
?>
        
        
	