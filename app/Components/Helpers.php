<?php

namespace App\Components;

use Illuminate\Support\Facades\Validator;

class Helpers
{
    public function validateHelper($fields, $rules, $payload, $messages = null): void
    {
        $validationsInfo = $this->buildValidations($fields, $rules, $messages);
        Validator::make(
            $payload,
            $validationsInfo['validation'],
            $validationsInfo['messages']
        );
    }

    public function buildValidations($fields, $rules, $messages)
    {
        $uniqueRule = count($rules) > 1 ? false : true;
        $response = [];

        foreach ($fields as $key => $field) {
            $rules = $uniqueRule ? current($rules) : $rules[$key];
            $response['validation'][] = [$field => $rules];
            $response['messages'][] = $this->buildValidationMessages($field, $rules, $messages);
        }

        return $response;
    }

    public function buildValidationMessages($field, $rules, $messages)
    {
        $response = [];
        $rulesCut = explode('|', $rules);

        foreach ($rulesCut as $rule) {
            $messageIndex = $field . '.' . $rule;
            $response[] = [$messageIndex => $messages ? $this->buildFieldMessage($rule) : $messages];
        }

        return $response;
    }

    public function buildFieldMessage($rule)
    {
        $message = substr($rule, 0, strpos($rule, ":"));

        return "Regra - :parameter é {$message}";
    }
}
