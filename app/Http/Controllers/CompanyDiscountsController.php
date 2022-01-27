<?php

namespace App\Http\Controllers;

use App\Services\CompanyDiscountsService;
use Illuminate\Http\Request;

class CompanyDiscountsController extends Controller
{
    public function show(int $id)
    {
        $service = new CompanyDiscountsService;

        return response()->json($service->get($id));
    }

    public function list()
    {
        $service = new CompanyDiscountsService;

        return response()->json($service->list());
    }

    public function save(Request $request)
    {
        $service = new CompanyDiscountsService;

        return response()->json($service->save($request));        
    }

    public function update(int $id, Request $request)
    {
        $service = new CompanyDiscountsService;

        return response()->json($service->update($id, $request));        
    }

    public function delete(int $id)
    {
        $service = new CompanyDiscountsService;

        return response()->json($service->delete($id));        
    }
}
