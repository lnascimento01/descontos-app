<?php

namespace App\Services;

use App\Enums\ErrorEnum;
use App\Models\Categories;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriesService
{
    public function get(int $id)
    {
        $fields = ['id'];
        $rules = ['required|exists:categories,id'];
        $validate = validateHelper($fields, $rules, ['id' => $id], $messages = null);

        throw_if($validate->fails(), new Exception(
            implode('|', $validate->errors()->all()),
            ErrorEnum::OPT001['code']
        ));

        return Categories::find($id);
    }

    public function list(): Collection
    {
        return Categories::all();
    }

    public function save(Request $request)
    {
        $fields = ['name', 'description'];
        $rules = ['required|string|unique:categories,name', 'required'];
        $validate = validateHelper($fields, $rules, $request->all(), $messages = null);

        throw_if($validate->fails(), new Exception(
            implode('|', $validate->errors()->all()),
            ErrorEnum::OPT002['code']
        ));

        return Categories::insertGetId($request->all());
    }

    public function update(int $id, Request $request)
    {
        $object = $this->get($id);
        $fields = ['name', 'description'];
        $rules = ['string|unique:categories,name' . $object->id, 'int|unique:categories,description'];

        $validate = validateHelper($fields, $rules, $request->all(), $messages = null);

        foreach ($request->all() as $key => $param) {
            $object->$key = $param;
        }

        throw_if($validate->fails(), new Exception(
            implode('|', $validate->errors()->all()),
            ErrorEnum::OPT003['code']
        ));

        return $object->save();
    }

    public function delete(int $id)
    {
        $object = $this->get($id);

        return $object->delete();
    }
}
