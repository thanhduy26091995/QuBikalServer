<?php

	/**
	* Category
	*/
	class Category
	{
		public $keypath;
		public $category;
		public $images;
		public $subCategories;
		
		function __construct()
		{
		}

		public function toMaps(){
			$result = array('category' => $this->category,'images' => $this->images,'subcategories' => $this->images );
			return $result;
		}
	}