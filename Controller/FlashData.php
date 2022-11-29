<?php 

class Flashdata{
    public static function render(){
        if (!isset($_SESSION['flash'])) {
            return null;
        }
        $msg = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $msg;
    }

    public static function add($key, $message)
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = array();
        }
        $_SESSION['flash'] = [
            $key => $message
        ];
    }
}
 ?>