<?php
class todoItem
{
	private $itemId;
	private $item;
	private $itemCategory;
	private $itemType;
	private $userId;
	
	function __construct($itemId, $item, $itemCategory, $itemType, $userId) 
	{
		$this->itemId = $itemId;
		$this->item = $item;
		$this->itemCategory = $itemCategory;
		$this->itemType = $itemType;
		$this->userId = $userId;
        }
        public function setId($itemId)
	{
		$this->itemId = $itemId;
	}
	public function getId()
	{
		return $this->itemId;
	}
	public function setItem($item)
	{
		$this->itemId = $item;
	}
	public function getItem()
	{
		return $this->item;
	}
	public function setCategory($category)
	{
		$this->itemCategory = $category;
	}
	public function getCategory()
	{
		return $this->itemCategory;
	}
	public function setType($type)
	{
		$this->itemType = $type;
	}
	public function getType()
	{
		return $this->itemType;
	}
	public function setUserId($userId)
	{
		$this->userId = $userId;
	}
	public function getUserId()
	{
		return $this->userId;
	}
}
?>
	