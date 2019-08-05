<?php

namespace App\Http\Requests\Api;

class VerificationCodeRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'code' => 'required_without:access_token|string',
            'access_token' => 'required_without:code|string',
        ];

        if ($this->social_type == 'weixin' && !$this->code) {
            $rules['openid']  = 'required|string';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'captcha_key' => '图片验证码 key',
            'captcha_code' => '图片验证码',
        ];
    }
}
