<?php
	/**
	* Image model
	*/
	class ImageModel
	{
		public $keypath;
		public $imagekey;
		public $imagelink;
		
		function __construct()
		{
			
		}

		public function toMaps(){
			$result = array('imagekey' => $this->imagekey,'imagelink' => $this->imagelink);
			return $result;
		}
	}
?>