<?php

class mathcaptchaHelper

{ 

	private $bil1; 

	private $bil2; 

	private $operator; 

	function __construct($apps){

	

		global $logger,$CONFIG;

		$this->logger = $logger;

		$this->apps = $apps;

		$this->config = $CONFIG;

		

		

	}

	function initial() 

	{ 

		$listoperator = array('+', 'x'); 

		$this->bil1 = rand(1, 9); 

		$this->bil2 = rand(1, 9); 

		$this->operator = $listoperator[rand(0, 1)]; 

	} 

	

	function showcaptcha() 

	{

		global $CONFIG;

		
		$this->apps->session->setsession($CONFIG['SESSION_NAME'],'kodeCapcahMath','');
		$this->initial(); 

		$bil1 =$this->bil1;

		$bil2=$this->bil2;

		$operator = $this->operator;

		if ($operator == '+') $hasil = $bil1 + $bil2; 

		//else if ($operator == '-') $hasil = $bil1 - $bil2; 

		else if ($operator == 'x') $hasil = $bil1 * $bil2; 

		//pr($bil1." ".$operator." ".$bil2);die;

		
		if($hasil==0)
		{
		
			$hasil=0;
		}
		$this->apps->session->setsession($CONFIG['SESSION_NAME'],'kodeCapcahMath',$hasil);

		

			$im = imagecreatetruecolor(50, 25);
 
			//colors:
			$white = imagecolorallocate($im, 255, 255, 255);
			$grey = imagecolorallocate($im, 128, 128, 128);
			$black = imagecolorallocate($im, 0, 0, 0);
		 
			imagefilledrectangle($im, 0, 0, 150, 50, $white);
		 
			//path to font:
		 
			$font = $CONFIG['LOCAL_PUBLIC_ASSET'].'font/arial.ttf';
		 
			//draw text:
		$text_color=$black;
		// $text_color=imagettftext($im, 30, 10,20, 55, $grey, $font, $bil1);
		 
		// $text_color=imagettftext($im, 30, 0, 83, 55, $grey, $font, $bil2);

		// $text_color=imagettftext($im, 32, 0, 53, 48, $grey, $font, $operator);

		//@imagestring($im,90, 15, 100,  $bil1." ".$operator." ".$bil2, $text_color);

		//$font =$CONFIG['PUBLIC_ASSET'].'assets/maybe-bold-webfont.ttf'.

		imagettftext($im, 13, 0, 10, 20, $text_color, $font, $bil1." ".$operator." ".$bil2);

		$imgName = rand(0,100000);
		$timestamp= date('d');
		
		$path=$CONFIG['LOCAL_PUBLIC_ASSET'] . 'cptcha/'.$timestamp.$imgName.'.jpg';
		unlink($path);
		// echo $path;die;
		// Set the content type header - in this case image/jpeg

		//header('Content-Type: image/jpeg');



		// Output the image

		imagejpeg($im, $path); 

		imagedestroy($im);
		chmod($path,0777);
		return $timestamp.$imgName;

		

		

	} 

	

} ?> 