<?php

namespace Ashiful\Installer\Controllers;

use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{

    public function welcome()
    {
        return view('vendor.installer.welcome');
    }
}
