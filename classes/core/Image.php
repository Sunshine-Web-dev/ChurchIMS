<?php
/**
*
* This is a class Image
* @version 0.01
* @author Numan Tahir <numan_tahir1@yahoo.com>
* @Date 28 Dec, 2007
* @modified 28 Dec, 2007 by Numan Tahir
*
**/
class Image extends Database{
	protected $image;
	protected $type;
	protected $size;
	protected $error;
	protected $path;
	protected $thumbs;
	
	public $filename;
	/*
	* This is the constructor of the class Image
	* @author Numan Tahir <numan_tahir1@yahoo.com>
	* @Date 28 Dec, 2007
	* @modified 28 Dec, 2007 by Numan Tahir
	*/
	public function __construct($path){
		parent::__construct();
		$this->path 	= $path;
		$this->thumbs 	= $path . "thumbs/";
		if(!is_dir($this->thumbs)){
			mkdir($this->thumbs);
			chmod($this->thumbs, 0777);
		}
	}

	/*
	* This method is used to set the image
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	public function setImage($image){
		$this->image 	= $image;
		$this->type 	= $this->image['type'];
		$this->size 	= $this->image['size'];
	}

	/*
	* This method is used to check whether the file is uploaded or not
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	public function isFileUploaded(){
		if(is_uploaded_file($this->image['tmp_name']))
			return true;
		else
			return false;
	}
	
	/*
	* This method is used to check the valid image type
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	public function isValidImage(){
		if(in_array($this->type, $this->validImage())){
			return true;
		}
		else{
			$this->error[] = 'Invalid image type.';
			return false;
		}
	}

	/*
	* This method is used to get filename
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	protected function genFilename($id){
		$filen = $this->genRandom(5);
		$filen = $filen . "-" . $id . "." . $this->getExtention();
		$this->filename = $filen;
		return $this->filename;
	}
	
	/*
	* This method is used to check the valid image type
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	public function uploadImage($id){
		$this->filename = $this->genFilename($id);
		if(move_uploaded_file($this->image['tmp_name'], $this->path . $this->filename)){
			return true;
		}
		else{
			$this->error[] = 'Ooops! Error in image uploading.';
			return false;
		}
	}

	/*
	* This method is used to check the valid image size
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	public function isValidSize($size = 1){
		$total = ($size * 1024 * 1024);
		if($this->size <= $total){
			return true;
		}
		else{
			$this->error[] = 'Invalid image size (max size is ' . $size . 'MB only).';
			return false;
		}
	}

	/*
	* This method is used to get the valid image types
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	private function validImage(){
		return array('image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg', 'image/png');
	}
	
	/*
	* This method is used to get image extension
	* @author Numan Tahir
	* @Date : 30 Dec, 2007
	* @modified : 30 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function getExtention(){
		if($this->type == "image/jpeg" || $this->type == "image/jpg" || $this->type == "image/pjpeg")
			return "jpg";
		elseif($this->type == "image/png")
			return "png";
		elseif($this->type == "image/gif")
			return "gif";
	}
	
	/*
	* This method is used to get some random characters
	* @author Numan Tahir
	* @Date 30 Dec, 2007
	* @modified 30 Dec, 2007 by Numan Tahir
	*/
	function genRandom($char = 5){
		$md5 = md5(time());
		return substr($md5, rand(5, 25), $char);
	}

	/*
	* This method is used to create thumbnail of an image.
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	public function createThumb($rW, $rH, $do = "thumbs"){
		if($do == "resize")
			$image_path = $this->path . $this->filename;
		else
			$image_path = $this->thumbs . $this->filename;
		if($this->type == "image/gif"){
			$im 			= imagecreatefromgif($this->path . $this->filename);
			$width 			= imagesx($im);
			$height 		= imagesy($im);
			
			#$n_width		= ($width > $rW) ? $rW : $width;
			#$n_height		= ($height > $rH) ? $rH : $height;
			
			if($width > $rW){
				$diff 			= $width - $rW;
				$n_width 		= $rW;
				$per 			= number_format(($diff * 100) / $width, 2);
				$n_height 		= $height - (int)(($height * $per) / 100);
			}
			else{
				$n_width		= $width;
				$n_height		= $height;
			}
			
			$canvas 		= imagecreatetruecolor($n_width, $n_height);
			imagecopyresized($canvas, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
			if(function_exists("imagegif")){
				imagegif($canvas, $image_path);
			}
			elseif(function_exists("imagejpeg")){
				imagejpeg($canvas, $image_path);
			}
			chmod($image_path, 0777);
		}
		if($this->type == "image/pjpeg" || $this->type == "image/jpeg" || $this->type == "image/jpg"){
			$im 			= imagecreatefromjpeg($this->path . $this->filename);
			$width 			= imagesx($im);
			$height 		= imagesy($im);
			if($width > $rW){
				$diff 			= $width - $rW;
				$n_width 		= $rW;
				$per 			= number_format(($diff * 100) / $width, 2);
				$n_height 		= $height - (int)(($height * $per) / 100);
			}
			else{
				$n_width		= $width;
				$n_height		= $height;
			}
			$canvas 		= imagecreatetruecolor($n_width, $n_height);                 
			imagecopyresized($canvas, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
			imagejpeg($canvas, $image_path);
			chmod($image_path, 0777);
		}
		if($this->type == "image/png"){
			$im 			= imagecreatefrompng($this->path . $this->filename); 
			$width 			= imagesx($im);
			$height 		= imagesy($im);
			if($width > $rW){
				$diff 			= $width - $rW;
				$n_width 		= $rW;
				$per 			= number_format(($diff * 100) / $width, 2);
				$n_height 		= $height - (int)(($height * $per) / 100);
			}
			else{
				$n_width		= $width;
				$n_height		= $height;
			}
			$canvas 		= imagecreatetruecolor($n_width, $n_height);                 
			imagecopyresized($canvas, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
			imagepng($canvas, $image_path);
			chmod($image_path, 0777);
		}
		@imagedestroy($im);
		@imagedestroy($canvas);
	}

	/*
	* This method is used to crop the image
	* @author Numan Tahir
	* @Date : 30 Dec, 2007
	* @modified :  30 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	public function cropImage($rW, $rH, $image_path){
		if(file_exists($image_path)){
			$size		= getimagesize($image_path);
			$this->type = $size['mime'];
		}
		else{
			$image_path = $this->path . $this->filename;
		}
		$canvas = imagecreatetruecolor($rW, $rH);
		
		if($this->type == "image/gif"){
			$im 			= imagecreatefromgif($image_path);
			$width 			= imagesx($im);
			$height 		= imagesy($im);

			$n_width 		= $width / 2;
			$n_height 		= $height / 2;
			
			$cropLeft 		= ($n_width / 2) - ($rW / 2);
			$cropTop 		= ($n_height / 2) - ($rH / 2);

			imagecopyresized($canvas, $im, 0, 0, $cropLeft, $cropTop, $rW, $rH, $n_width, $n_height);
			if(function_exists("imagegif")) {
				header("Content-type: image/gif");
				imagegif($canvas, $this->thumbs . $this->filename);
			}
			elseif(function_exists("imagejpeg")) {
				header("Content-type: image/jpeg");
				imagejpeg($canvas, $image_path, 90);
			}
			chmod($image_path, 0777);
		}
		if($this->type == "image/pjpeg" || $this->type == "image/jpeg" || $this->type == "image/jpg"){
			$im 			= imagecreatefromjpeg($image_path);
			$width 			= imagesx($im);
			$height 		= imagesy($im);

			$n_width 		= $width / 2;
			$n_height 		= $height / 2;
			
			$cropLeft 		= ($n_width / 2) - ($rW / 2);
			$cropTop 		= ($n_height / 2) - ($rH / 2);

			imagecopyresized($canvas, $im, 0, 0, $cropLeft, $cropTop, $rW, $rH, $n_width, $n_height);
			imagejpeg($canvas, $image_path, 90);
			chmod($image_path, 0777);
		}
		if($this->type == "image/png"){
			$im 			= imagecreatefrompng($image_path); 
			$width 			= imagesx($im);
			$height 		= imagesy($im);

			$n_width 		= $width / 2;
			$n_height 		= $height / 2;
			
			$cropLeft 		= ($n_width / 2) - ($rW / 2);
			$cropTop 		= ($n_height / 2) - ($rH / 2);

			imagecopyresized($canvas, $im, 0, 0, $cropLeft, $cropTop, $rW, $rH, $n_width, $n_height);
			imagepng($canvas, $image_path);
			chmod($image_path, 0777);
		}
		@imagedestroy($im);
		@imagedestroy($canvas);
	}
	
	/*
	* This method is used to return all the errors that occured during image upload.
	* @author Numan Tahir
	* @Date : 30 Dec, 2007
	* @modified :  30 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	public function getErrors(){
		return $this->error;
	}

	/*
	* This method is used to delete the image
	* @author Numan Tahir
	* @Date : 02 Jan, 2008
	* @modified :  02 Jan, 2008 by Numan Tahir
	* @return : bool
	*/
	public function deleteImage($image){
		@unlink($this->path . $image);
		@unlink($this->thumbs . $image);
	}
}
?>