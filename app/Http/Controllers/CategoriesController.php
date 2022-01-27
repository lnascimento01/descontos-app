<?php

namespace App\Http\Controllers;

use App\Services\CategoriesService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(int $id)
    {
        $service = new CategoriesService;

        return response()->json($service->get($id));
    }

    public function list(Request $request)
    {
        $service = new CategoriesService;

        return response()->json($service->list($request));
    }

    public function save(Request $request)
    {
        $service = new CategoriesService;

        return response()->json($service->save($request));        
    }

    public function update(int $id, Request $request)
    {
        $service = new CategoriesService;

        return response()->json($service->update($id, $request));        
    }

    public function delete(int $id)
    {
        $service = new CategoriesService;

        return response()->json($service->delete($id));        
    }
}
