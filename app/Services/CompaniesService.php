<?php

namespace App\Services;

use App\Models\Companies\Companies;
use Illuminate\Http\Request;

class CompaniesService
{
    public function get(Request $request)
    {
        validateH();
        return Companies::find($request->id);
    }
}
