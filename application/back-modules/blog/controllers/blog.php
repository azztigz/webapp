<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MX_Controller {

	function __construct(){
		parent::__construct();
		isLoggedIn();
	}

	public function index(){
		loadBackLayout('blog_view');
	}

	function newPost(){
		if($this->input->post()){
    	
    		$this->form_validation->set_rules('post_intro', 'Introduction', 'required|xss_clean|trim');
		    $this->form_validation->set_rules('post_title', 'Title', 'required|xss_clean|trim');
		    $this->form_validation->set_rules('post_content', 'Content', 'required');
		    
		    $this->form_validation->set_message('required', '%s is required');


		    if ($this->form_validation->run() == FALSE){
		    	loadBackLayout('newpost_view');
		    }else{
		      $path = "assets/blog/";

				$valid_formats = array("jpg", "png", "gif", "bmp");
				
					$name = $_FILES['post_image']['name'];
					$size = $_FILES['post_image']['size'];

					$ThumbSquareSize 		= 200; 
					$BigImageMaxSize 		= 500;
					$ThumbPrefix			= "small/thumb_";
					$DestinationDirectory	= 'assets/blog/thumbs/'; 
					$Quality 				= 90;

					$RandomNumber 	= rand(0, 9999999999); 

						$ImageName 		= str_replace(' ','-',strtolower($_FILES['post_image']['name'])); 
						$ImageSize 		= $_FILES['post_image']['size']; 
						$TempSrc	 	= $_FILES['post_image']['tmp_name'];
						$ImageType	 	= $_FILES['post_image']['type']; 

						
						switch(strtolower($ImageType))
						{
							case 'image/png':
								$CreatedImage =  imagecreatefrompng($_FILES['post_image']['tmp_name']);
								break;
							case 'image/gif':
								$CreatedImage =  imagecreatefromgif($_FILES['post_image']['tmp_name']);
								break;			
							case 'image/jpeg':
							case 'image/pjpeg':
								$CreatedImage = imagecreatefromjpeg($_FILES['post_image']['tmp_name']);
								break;
							default:
								die('Unsupported File!');
						}
						
						
						list($CurWidth,$CurHeight)=getimagesize($TempSrc);
						
						$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
					  	$ImageExt = str_replace('.','',$ImageExt);
						
						
						$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
						
						
						$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
						
						$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName;
						$DestRandImageName 			= $DestinationDirectory.'medium/thumb_'.$NewImageName; 
						
						
						
				if(strlen($name)){
					list($txt, $ext) = explode(".", $name);
						
						if(in_array($ext,$valid_formats)){
							
							if($size<(5000000)){
								$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
								$tmp = $_FILES['post_image']['tmp_name'];
								
								if(move_uploaded_file($tmp, $path.$actual_image_name)){	
									$image_path = base_url().$path.$actual_image_name;

									
									if($this->resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType)){
										
										if(!$this->cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType)){
												echo 'Error Creating thumbnail';
											}
										
										list($ResizedWidth,$ResizedHeight)=getimagesize($DestRandImageName);
										
										echo '<table width="100%" border="0" cellpadding="4" cellspacing="0">';
										echo '<tr>';
										echo '<td align="center"><img src="'.base_url().'/assets/blog/thumbs/'.$ThumbPrefix.$NewImageName.'" alt="Thumbnail" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'"></td>';
										echo '</tr><tr>';
										echo '<td align="center"><img src="'.base_url().'/assets/blog/thumbs/medium/thumb_'.$NewImageName.'" alt="Resized Image" height="'.$ResizedHeight.'" width="'.$ResizedWidth.'"></td>';
										echo '</tr>';
										echo '</table>';
										
										echo '<pre>Other Post Variables:';
										print_r($_POST);
										echo '</pre>';
										/*
										// Insert info into database table!
										mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
										VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
										*/

									}else{
										die('Resize Error'); 
									}


								}else{
									$imagerror = "failed";
								}
						}else{
							$imagerror = "Image file size max 1 MB";
						}
					}else{
						$imagerror = "Invalid file format..";
					}
				}


		      $info = array("user_idFK"		=> $this->session->userdata('user_id'),
		      			    "post_intro" 	=> $this->input->post("post_intro"),
		      				"post_title" 	=> $this->input->post("post_title"),
		      				"post_content" 	=> $this->input->post("post_content"),
		      				"post_image" 	=> $image_path
		      			);
		      //$this->newpost_model->savePost($info);

		     pr($info);

		      //redirect(base_url("blog"));
		    }
		}else{
			loadBackLayout('newpost_view');
		}

	}

	function categories(){
		loadBackLayout('category_view');
	}

	function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType){
		if($CurWidth <= 0 || $CurHeight <= 0) {
			return false;
		}
		
		$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
		$NewWidth  			= ceil($ImageScale*$CurWidth);
		$NewHeight 			= ceil($ImageScale*$CurHeight);
		
		if($CurWidth < $NewWidth || $CurHeight < $NewHeight){
			$NewWidth = $CurWidth;
			$NewHeight = $CurHeight;
		}
		$NewCanves 	= imagecreatetruecolor($NewWidth, $NewHeight);
		
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight)){
			switch(strtolower($ImageType)){
				case 'image/png':
					imagepng($NewCanves,$DestFolder);
					break;
				case 'image/gif':
					imagegif($NewCanves,$DestFolder);
					break;			
				case 'image/jpeg':
				case 'image/pjpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				default:
					return false;
			}
			
			if(is_resource($NewCanves)) {
				imagedestroy($NewCanves);
			} 
			return true;
		}

	}

	function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType){	 
		if($CurWidth <= 0 || $CurHeight <= 0) {
			return false;
		}
		
		if($CurWidth>$CurHeight){
			$y_offset = 0;
			$x_offset = ($CurWidth - $CurHeight) / 2;
			$square_size 	= $CurWidth - ($x_offset * 2);
		}else{
			$x_offset = 0;
			$y_offset = ($CurHeight - $CurWidth) / 2;
			$square_size = $CurHeight - ($y_offset * 2);
		}
		
		$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)){
			switch(strtolower($ImageType)){
				case 'image/png':
					imagepng($NewCanves,$DestFolder);
					break;
				case 'image/gif':
					imagegif($NewCanves,$DestFolder);
					break;			
				case 'image/jpeg':
				case 'image/pjpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				default:
					return false;
			}
	
			if(is_resource($NewCanves)) {
				imagedestroy($NewCanves);
			} 
			return true;
		}
		  
	}
}
