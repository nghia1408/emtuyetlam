<?php
     function setUserLogin($user){
    if($user) {
        $_SESSION['user'] = $user;
    }
    }

    function setUserLogout(){
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            return true;
        }
        return false;
    }

    function isUserLoggedIn(){
        if(isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    function getUserLoggedIn(){
    if(isset($_SESSION['user'])){
        return unserialize($_SESSION['user']);
    }
    return null;  // Trả về null nếu không có dữ liệu người dùng trong session
    }

    function showMessageRegister($mesg) {
         if ($mesg) {
             return $mesg;
         } else {
            return "";
        }
}

