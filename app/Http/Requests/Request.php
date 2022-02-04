<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

abstract class Request extends FormRequest
{
    public $langNamespace;

    /**
     * Set Domain and Namespace of the current method Language
     *
     * @param $nameSpace
     */
    public function setLangNamespace($nameSpace)
    {
        $this->langNamespace = $nameSpace;
    }

    /**
     * Handel Illuminate\Foundation\Http\FormRequest :: response()
     *
     * @param  array $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson()) {
            return new JsonResponse($errors, 422);
        }

        /*  \Session::flash('message', (new \Illuminate\Support\MessageBag($errors))->all());
            \Session::flash('alert-class', ' alert-danger');
            return $this->redirector->to($this->getRedirectUrl())
                                    ->withInput($this->except($this->dontFlash));
        */

        return $this->redirector->to($this->getRedirectUrl())
                                ->withInput($this->except($this->dontFlash))
                                ->withErrors($errors, $this->errorBag);
    }

    public function authorize()
    {
        // Handel the Validator
        /*  $validator = $this->getValidatorInstance();
            $validator->setAttributeNames(['message' => 'The Message']);
            $this->failedValidation($validator);
        */

        return true;
    }

    public function attributes()
    {
        $attributes = [];
        $rules = $this->rules();

        foreach ($rules as $key => $rule) {
            if ( ! is_array($rule)) {
                $rule = [$rule];
            }
            foreach ($rule as $oneRule) {
                if (strpos('?' . $oneRule, 'required_with')) {
                    $oneRule = explode(":", $oneRule);
                    $rules = array_merge($rules, array_fill_keys(explode(",", $oneRule[1]), 0));
                    continue;
                }
            }
        }

        foreach ($rules as $key => $rule) {
            $langNamespace = $this->langNamespace;

            if ( ! app('translator')->has($langNamespace . '.' . $key)) {
                $langNamespace = 'app';
            }

            $translate = trans($langNamespace . '.' . $key);

            // Skip if doesn't has a translate
            if ($translate && $translate != $langNamespace . '.' . $key) {
                $attributes[$key] = $translate;
            }
        }

        return $attributes;
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
