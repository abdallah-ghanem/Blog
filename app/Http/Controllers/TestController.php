<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function firstAction()
    {
    $localName='Abdo';
    $NewBooks=['Batman','Spiderman'];
    return view('test',['age'=>'24' , 'name'=>$localName ,'books'=>$NewBooks]);
    }

    public function greet(){
        echo 'Mein auto hat nicht';
    }
}
