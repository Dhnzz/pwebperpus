<?php 
class Fungsi 
{
    public static function arrToStr($x)
    {
        $string = '';
        $i = 1;
        foreach($x as $key => $value){
            $string .= $value;
            if($i < count($x)){
                $string .= ', ';
            }
            $i++;
        }
        return $string;
    }
}
 ?>