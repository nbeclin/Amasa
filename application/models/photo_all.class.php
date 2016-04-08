<?php
class Photo_all extends Model {

    public $all = array();

    public function __construct(){
        parent::__construct();
        $this->load_all();
    }

    private function load_all(){
        foreach($this->selectAll('photo', '*', null, 'ORDER BY lien') as $photo){
            array_push($this->all, new Photo($photo));
        }
    }

    public function load_all_By_id(){
    	$pictures = array();
    	foreach($this->selectAll('photo', '*', null, 'ORDER BY idAnimal, lien') as $photo){
            array_push($pictures, new Photo($photo));
        }
    	return $pictures;
    }

    public function upload_image($size){
        
        if ($size == "small"){
            $width_std = 262;
            $height_std = 175;
            $name = '00-';
        }
        else if ($size == "normal"){
            $width_std = 750;
            $height_std = 500;
            $name = '';
        }

        $ratio = $width_std/$height_std;

        $src_img = imagecreatefromjpeg("img/test2.jpg");
        
        if (imagesx($src_img)/imagesy($src_img) < $ratio){
            $height = $height_std;
            $width = $height_std * imagesx($src_img) / imagesy($src_img);
            $pos_x = ($width_std - $width) / 2;
            $pos_y = 0;
        }
        else if (imagesx($src_img)/imagesy($src_img) > $ratio){
            $width = $width_std;
            $height = $width_std * imagesy($src_img) / imagesx($src_img);
            $pos_x = 0;
            $pos_y = ($height_std - $height) / 2;
        }
        else {
            $width = $width_std;
            $height = $height_std;
            $pos_x = 0;
            $pos_y = 0;
        }
        
        $dst_img = imagecreatetruecolor($width_std,$height_std);
        $color = imagecolortransparent($dst_img, 0);
        imagecopyresampled($dst_img,$src_img,$pos_x,$pos_y,0,0,$width,$height,imagesx($src_img),imagesy($src_img));
        imagepng($dst_img,"img/".$name."test2.png");

        unset($src_img);
    }
}