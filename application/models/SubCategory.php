<?php
	/**
	* 
	*/
	class SubCategory
	{
		public $keypath;
		public $category;
		public $images;
		
		function __construct()
		{
			
		}

		public function toMaps(){
			$result = array('category' => $this->category,'images' => $this->images);
			return $result;
		}
	}
?>