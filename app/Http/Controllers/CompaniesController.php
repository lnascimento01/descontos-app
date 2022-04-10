<?php

namespace App\Http\Controllers;

use App\Services\CompaniesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function show(int $id): JsonResponse
    {
        $service = new CompaniesService;

        return response()->json($service->get($id));
    }

    public function list(): JsonResponse
    {
        $service = new CompaniesService;

        return response()->json($service->list());
    }

    public function save(Request $request): JsonResponse
    {
        $service = new CompaniesService;

        return response()->json($service->save($request));
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $service = new CompaniesService;

        return response()->json($service->update($id, $request));
    }

    public function delete(int $id): JsonResponse
    {
        $service = new CompaniesService;

        return response()->json($service->delete($id));
    }
}
