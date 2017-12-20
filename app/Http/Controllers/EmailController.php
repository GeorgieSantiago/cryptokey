<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function create(Array $email)
    {

      $this->send();
    }

    private function send()
    {

      $this->home();
    }
}
