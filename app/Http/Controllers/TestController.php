<?php

namespace App\Http\Controllers;

use AmoCRM\Client\AmoCRMApiClient;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public  function  index()
    {
        $num = 1;

        return $num;
    }
}
