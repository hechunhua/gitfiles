<?
function generate_image() {
        $theme = $this->root_path . $this->realpath;
        $this->newpath = $this->root_path . $this->newpath;

        $arr_img_size = @getimagesize($theme);
        //不能访问 filename 指定的图像或者其不是有效的图像
        if(empty($this->realpath) || $arr_img_size===FALSE){
        	$this -> pic_not_exist = true;
        	$theme = $this->default_pic; //设置默认图片
        	$arr_img_size = @getimagesize($theme);
        }

		$imagetype = exif_imagetype($theme);
		//print_r(function_exists('imagecreatefromjpeg'));exit;
		if(function_exists('imagecreatefromjpeg') && ((imagetypes() & IMG_JPG) > 0) && ($imagetype == IMAGETYPE_JPEG)){
		    $source = imagecreatefromjpeg($theme);
		}elseif(function_exists('imagecreatefromgif') && ((imagetypes() & IMG_GIF) > 0) && ($imagetype == IMAGETYPE_GIF)){
			$source = imagecreatefromgif($theme);
		}elseif(function_exists('imagecreatefrompng') && ((imagetypes() & IMG_PNG) > 0) && ($imagetype == IMAGETYPE_PNG)){
			$source = imagecreatefrompng($theme);
		}elseif(function_exists('imagecreatefromwbmp') && ((imagetypes() & IMG_WBMP) > 0) && ($imagetype == IMAGETYPE_WBMP)){
			$source = imagecreatefromwbmp($theme);
		}else{
			die("No image support in this PHP server");
		}

		$initial_width  = imagesx($source);
		$initial_height = imagesy($source);

		$this->width = ($this->width > 0 ? $this->width : $initial_width);
		$this->height = ($this->height > 0 ? $this->height : $initial_height);

	    if(($this->width > $initial_width) || ($this->width <= 0)){
			$this->width = $initial_width;
		}
	    if(($this->height > $initial_height) || ($this->height <= 0)){
			$this->height = $initial_height;
		}

		if(($this->width > $initial_width) && ($this->height > $initial_height)){
			$this->width = $initial_width;
			$this->height = $initial_height;
		}elseif($initial_width > $this->width || $initial_height > $this->height){
			$bit = $this->height/$this->width;
			$imgbit = $initial_height/$initial_width;
			if($imgbit>=$bit){
				$this->width = $initial_width*($this->height/$initial_height);
			}else{
				$this->height = $initial_height*($this->width/$initial_width);
			}
		}
		$this->width = round($this->width);
		$this->height = round($this->height);

		$im   = ((function_exists('imagecreatetruecolor')) && PHP_VERSION >= '4.3') ?
		              imagecreatetruecolor($this->width, $this->height) : imagecreate($this->width, $this->height);

		/* 将背景图象复制原始图象并调整大小 */
		if (function_exists('imagecopyresampled') && PHP_VERSION >= '4.3') { // GD 2.X
		    imagecopyresampled($im, $source, 0, 0, 0, 0, $this->width, $this->height, $initial_width, $initial_height);
		} else { // GD 1.X
		    imagecopyresized($im, $source, 0, 0, 0, 0, $this->width, $this->height, $initial_width, $initial_height);
		}
		imagedestroy($source);

		if (function_exists('imagecreatefromjpeg')  && ((imagetypes() & IMG_JPG) > 0)) {
			if (!$this -> pic_not_exist)
				imagejpeg($im, $this->newpath);
		    header('Content-type: image/jpeg');
		    //imageinterlace($im, 1);
		    imagejpeg($im, false, 95);
		} elseif(function_exists('imagecreatefromgif') && ((imagetypes() & IMG_GIF) > 0)) {
			if (!$this -> pic_not_exist)
				imagegif($im, $this->newpath);
			header("Content-type: image/gif");
			imagegif($im);
		} elseif(function_exists('imagecreatefrompng') && ((imagetypes() & IMG_PNG) > 0)) {
			if (!$this -> pic_not_exist)
				imagepng($im, $this->newpathh);
			header("Content-type: image/png");
			imagepng($im);
		} elseif(function_exists('imagecreatefromwbmp') && ((imagetypes() & IMG_WBMP) > 0)) {
			if (!$this -> pic_not_exist)
				imagewbmp($im, $this->newpath);
		    header("Content-type: image/vnd.wap.wbmp");
		    imagewbmp($im);
		}
		imagedestroy($im);
		return true;
	}

?>