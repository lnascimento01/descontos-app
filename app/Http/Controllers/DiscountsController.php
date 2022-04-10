<?php

namespace App\Http\Controllers;

use App\Services\DiscountsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{
    public function show(int $id): JsonResponse
    {
        $service = new DiscountsService;

        return response()->json($service->get($id));
    }

    public function list(Request $request): JsonResponse
    {
        $service = new DiscountsService;

        return response()->json($service->list($request));
    }

    public function save(Request $request): JsonResponse
    {
        $service = new DiscountsService;

        return response()->json($service->save($request));
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $service = new DiscountsService;

        return response()->json($service->update($id, $request));
    }

    public function delete(int $id): JsonResponse
    {
        $service = new DiscountsService;

        return response()->json($service->delete($id));
    }
}
