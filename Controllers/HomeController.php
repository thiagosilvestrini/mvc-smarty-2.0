<?php
namespace Controllers;

use \Models\Home;

class HomeController {
    public function index() {    
        global $smarty; 
                                
        $smarty->assign('titulo', 'HOME');
        $smarty->display('home.tpl');
    }       
}