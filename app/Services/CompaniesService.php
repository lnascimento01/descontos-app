<?php

namespace App\Services;

use App\Enums\ErrorEnum;
use App\Models\Companies\Companies;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CompaniesService
{
    public function get(int $id)
    {
        $fields = ['id'];
        $rules = ['required|exists:companies,id'];
        $validate = validateHelper($fields, $rules, ['id' => $id], $messages = null);

        throw_if($validate->fails(), new Exception(
            implode('|', $validate->errors()->all()),
            ErrorEnum::OPT001['code']
        ));

        return Companies::find($id);
    }

    public function list(): Collection
    {
        return Companies::all();
    }

    public function save(Request $request)
    {
        $fields = ['name', 'category'];
        $rules = ['required|string|unique:companies,name', 'required'];
        $validate = validateHelper($fields, $rules, $request->all(), $messages = null);

        throw_if($validate->fails(), new Exception(
            implode('|', $validate->errors()->all()),
            ErrorEnum::OPT002['code']
        ));

        return Companies::insertGetId($request->all());
    }

    public function update(int $id, Request $request)
    {
        $object = $this->get($id);
        $fields = ['name', 'category'];
        $rules = ['string|unique:companies,name', 'int'];
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
