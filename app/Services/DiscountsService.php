<?php

namespace App\Services;

use App\Enums\ErrorEnum;
use App\Models\Companies\Discounts;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiscountsService
{
    public function get(int $id)
    {
        $fields = ['id'];
        $rules = ['required|exists:discounts,id'];
        $validate = validateHelper($fields, $rules, ['id' => $id], $messages = null);

        throw_if($validate->fails(), new Exception(
            implode('|', $validate->errors()->all()),
            ErrorEnum::OPT001['code']
        ));

        return Discounts::find($id);
    }

    public function list(): Collection
    {
        return Discounts::all();
    }

    public function save(Request $request)
    {
        $fields = ['name', 'category'];
        $rules = ['required|string|unique:discounts,name', 'required'];
        $validate = validateHelper($fields, $rules, $request->all(), $messages = null);

        throw_if($validate->fails(), new Exception(
            implode('|', $validate->errors()->all()),
            ErrorEnum::OPT002['code']
        ));

        return Discounts::insertGetId($request->all());
    }

    public function update(int $id, Request $request)
    {
        $object = $this->get($id);
        $fields = ['name', 'category'];
        $rules = ['unique:discounts,name,' . $object->id, 'int|exists:categories,id'];

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
