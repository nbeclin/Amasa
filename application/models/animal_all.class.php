<?php
class Animal_all extends Model {

    public $all = array();
    
    public function __construct(){
        parent::__construct();
        $this->load_all();
    }

    /** 
    * Function load_all - load all animal
    */
    private function load_all(){
        foreach($this->selectAll('animal', '*') as $animal){
            $animal['age_text'] = $this->interval($animal['age']);
            array_push($this->all, new Animal($animal));
        }
    }

    /** 
    * Function tri 
    * @param $post - searched values
    * @return array of result
    */
    public function tri($post, $page=null){
        $result = array();

        $post = $this->clean_post_tri($post);

        $other = null;

        if(isset($post['anneeAdoption'])){
            $other = 'AND anneeAdoption LIKE "%'.$post['anneeAdoption'].'%" ORDER BY nom';
            unset($post['anneeAdoption']);
        }

        if (!empty($post)) {
            foreach($this->selectAllLimit('animal', '*', $post, $other, $page) as $animal){
                $animal['age_text'] = $this->interval($animal['age']);
                array_push($result, new Animal($animal));
            }
        }
        else {
            foreach($this->selectAllLimit('animal', '*', null, null, $page) as $animal){
                $animal['age_text'] = $this->interval($animal['age']);
                array_push($result, new Animal($animal));
            }
        }

        return $result;
    }

    /** 
    * Function pet_of_the_month
    * @return array with name and picture link of the animal
    */
    public function pet_of_the_month(){
        return $this->selectOne('animal, photo', 'nom, lien', array('chatMois' => '1', 'premiere' => '1'), 'AND animal.id = photo.idAnimal');
    }

    /** 
    * Function load_one
    * @param $post - searched values
    * @return int of result number
    */
    public function count_tri($post){
        $result = 0;

        $post = $this->clean_post_tri($post);

        $other = null;

        if(isset($post['anneeAdoption'])){
            $other = 'AND anneeAdoption LIKE "%'.$post['anneeAdoption'].'%"';
            unset($post['anneeAdoption']);
        }

        if (!empty($post)) {
            foreach($this->selectAll('animal', '*', $post, $other) as $animal){
                $result++;
            }
        }
        else {
            foreach($this->selectAll('animal', '*') as $animal){
                $result++;
            }
        }

        return $result;
    }

    /** 
    * Function load_one
    * @param $id - searched id
    * @return array of result
    */
    public function load_one($id){
        $animal = new Animal($this->selectOne('animal', '*', array('id' => $id)));
        $animal->age = $this->date_conversion_fr($animal->age);
        $animal->anneeAdoption = $this->date_conversion_fr($animal->anneeAdoption);
        return $animal;
    }

    /** 
    * Function register
    * @param $post - values ​​to add or change
    * @return boolean 
    */
    public function register($post){
        if($post['age'] == ''){
            $post['age'] = '0000-00-00';
        }
        else {
            $post['age'] = $this->date_conversion_datetime($post['age']);
        }

        if($post['anneeAdoption'] == ''){
            $post['anneeAdoption'] = '0000-00-00';
        }
        else {
            $post['anneeAdoption'] = $this->date_conversion_datetime($post['anneeAdoption']);
        }

        $liens = $post['liens'];

        if($post['chatMois'] == 1){
            $this->update('animal', array('chatMois' => '0'), array('chatMois' => '1'));
        }

        if($post['id'] != ''){
            $animal_id = $post['id'];
            $this->delete('photo', array('idAnimal' => $animal_id));
            $this->update('animal', $this->clean_post($post), array('id' => $animal_id));
        }
        else{
            $animal_id = $this->insertOne('animal', $this->clean_post($post));
        }
        
        foreach ($liens as $lien => $value) {
            if($lien == 1){
                $premiere = 1;
            }
            else {
                $premiere = 0;
            }

            if($value != ''){
               $this->image_register($animal_id, $value, $premiere);
            }
        }

        return true;
    }

    /** 
    * Function date_conversion_fr
    * @param $dateToConvert - datetime format
    * @return string - fr date format 
    */
    private function date_conversion_fr($dateToConvert){
        if ($dateToConvert == '0000-00-00 00:00:00.0' || $dateToConvert == '0000-00-00' || $dateToConvert == ''){
            return null;
        }
        else {
            $date = new DateTime($dateToConvert);
            return $date->format('d/m/Y');
        }
    }

    /** 
    * Function date_conversion_datetime
    * @param $dateToConvert - fr date format
    * @return string - datetime format
    */
    private function date_conversion_datetime($dateToConvert){
        $date = DateTime::createFromFormat('d/m/Y', $dateToConvert);
        return $date->format('Y-m-d');
    }

    /** 
    * Function clean_post
    * @param $post - array of data
    * @return array of cleaning data
    */
    private function clean_post($post){
        unset($post['form_animal']);
        unset($post['id']);
        unset($post['liens']);
        return $post;
    }

    /** 
    * Function clean_post_tri
    * @param $post - array of data
    * @return array of cleaning data
    */
    private function clean_post_tri($post){
        foreach ($post as $key => $value) {
            if ($post[$key] == ''){
                unset($post[$key]);
            }
        }
        unset($post['tri']);
        return $post;
    }

    /** 
    * Function image_register - BDD register
    * @param $idAnimal - id of animal
    * @param $lien - name of image
    * @param $premiere - position of image
    */
    private function image_register($idAnimal, $lien, $premiere){
        $values = array(
                'idAnimal' => $idAnimal,
                'lien' => $lien,
                'premiere' => $premiere    
            );

        $this->insertOne('photo', $values);
    }

    /** 
    * Function interval - Age format
    * @param $date - datetime format
    * @return $result - date in string
    */
    private function interval($date) {      
        $datenow = new DateTime("now");
        $date = new DateTime($date);
        
        $interval = date_diff($datenow, $date);
        
        switch ($interval->y) {
            case 0:
                if ($interval->m == 0) {
                    $result = 'Presque 1 mois';
                }
                else {
                    $result = $interval->m.' mois';
                }
                break;
            
            case 1:
                if ($interval->m == 0) {
                    $result = $interval->y.' an';
                }
                else {
                    $result = ''.$interval->y.' an et '.$interval->m.' mois';
                }
                break;
            
            Default:
                if ($interval->m == 0) {
                    $result = ''.$interval->y.' ans';
                }
                else {
                    $result = ''.$interval->y.' ans et '.$interval->m.' mois';
                }
        }
        
        return $result;
    }

    /**
     * easy image resize function
     * @param  $file - file name to resize
     * @param  $string - The image data, as a string
     * @param  $width - new image width
     * @param  $height - new image height
     * @param  $proportional - keep image proportional, default is no
     * @param  $output - name of the new file (include path if needed)
     * @param  $delete_original - if true the original image will be deleted
     * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
     * @param  $quality - enter 1-100 (100 is best quality) default is 100
     * @param  $cropFromTop - if false crop will be from center, if true crop will be from top
     * @return boolean|resource
     */
    private function smart_resize_image($file, $string = null, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100, $cropFromTop = false) {

        if ( $height <= 0 && $width <= 0 ) {
            return false;   
        }

        if ( $file === null && $string === null ) {
            return false;
        }

        # Setting defaults and meta
        $info = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
        $image = '';
        $final_width = 0;
        $final_height = 0;
        list($width_old, $height_old) = $info;
        $cropHeight = $cropWidth = 0;

        # Calculating proportionality
        if ($proportional) {
          if ($width == 0) $factor = $height/$height_old;
          elseif  ($height == 0)  $factor = $width/$width_old;
          else                    $factor = min( $width / $width_old, $height / $height_old );
          $final_width  = round( $width_old * $factor );
          $final_height = round( $height_old * $factor );
        }
        else {
          $final_width = ( $width <= 0 ) ? $width_old : $width;
          $final_height = ( $height <= 0 ) ? $height_old : $height;
          $widthX = $width_old / $width;
          $heightX = $height_old / $height;
          $x = min($widthX, $heightX);
          $cropWidth = ($width_old - $width * $x) / 2;
          $cropHeight = ($height_old - $height * $x) / 2;
        }
        # Loading image to memory according to type
        switch ( $info[2] ) {
          case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
          case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
          case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
          default: return false;
        }
        # This is the resizing/resampling/transparency-preserving magic
        $image_resized = imagecreatetruecolor( $final_width, $final_height );
        if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
          $transparency = imagecolortransparent($image);
          $palletsize = imagecolorstotal($image);
          if ($transparency >= 0 && $transparency < $palletsize) {
            $transparent_color  = imagecolorsforindex($image, $transparency);
            $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
            imagefill($image_resized, 0, 0, $transparency);
            imagecolortransparent($image_resized, $transparency);
          }
          elseif ($info[2] == IMAGETYPE_PNG) {
            imagealphablending($image_resized, false);
            $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
            imagefill($image_resized, 0, 0, $color);
            imagesavealpha($image_resized, true);
          }
        }
        if ($cropFromTop){
          $cropHeightFinal = 0;
        }else{
          $cropHeightFinal = $cropHeight;
        }
        imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeightFinal, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
        # Taking care of original, if needed
        if ( $delete_original ) {
          if ( $use_linux_commands ) exec('rm '.$file);
          else @unlink($file);
        }
        # Preparing a method of providing result
        switch ( strtolower($output) ) {
          case 'browser':
            $mime = image_type_to_mime_type($info[2]);
            header("Content-type: $mime");
            $output = NULL;
          break;
          case 'file':
            $output = $file;
          break;
          case 'return':
            return $image_resized;
          break;
          default:
          break;
        }
        # Writing image according to type to the output destination and image quality
        var_dump($output);
        switch ( $info[2] ) {
          case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
          case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
          case IMAGETYPE_PNG:
            $quality = 9 - (int)((0.9*$quality)/10.0);
            imagepng($image_resized, $output, $quality);
            break;
          default: return false;
        }
        return true;
    } 
}