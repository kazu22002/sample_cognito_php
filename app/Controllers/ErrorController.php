<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    public function page404(){
        $this->view("error.404", []);
    }
}
