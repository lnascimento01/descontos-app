<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function get(Request $request){
        echo('<pre>');
        print_r("GET/POST");
        echo('</pre>');
        exit();
    }
}
