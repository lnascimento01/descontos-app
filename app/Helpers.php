<?php


function validateHelper($fields, $rules, $payload, $messages = false)
{
    $validationsInfo = buildValidations($fields, $rules, $messages);
    $validation =  Illuminate\Support\Facades\Validator::make(
        $payload,
        $validationsInfo['validation'],
        $validationsInfo['messages']
    );

    return $validation;
}

function buildValidations($fields, $rules, $messages)
{
    $uniqueRule = count($rules) > 1 ? false : true;
    $response['validation'] = [];
    $response['messages'] = [];

    foreach ($fields as $key => $field) {
        $ruless = $uniqueRule ? current($rules) : $rules[$key];
        $response['validation'] = array_merge($response['validation'], [$field => $ruless]);
        $response['messages'] = array_merge($response['messages'], buildValidationMessages($field, $ruless, $messages));
    }

    return $response;
}

function buildValidationMessages($field, $rules, $messages)
{
    $response = [];
    $rulesCut = explode('|', $rules);

    foreach ($rulesCut as $rule) {
        $messageIndex = $field . '.' . $rule;
        $response = array_merge($response, [$messageIndex => $messages ? $messages : buildFieldMessage($rule)]);
    }

    return $response;
}

function buildFieldMessage($rule)
{
    $hasSeparator = strpos($rule, ":") ;
    $message = $hasSeparator ? substr($rule, 0, strpos($rule, ":")) : $rule;

    return "Regra - :attribute é {$message}";
}
