<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\AppBaseController;
use App\User;


class ApiAuthController extends AppBaseController
{
    public function __construct() {
        $this->OT_VERIFICATION_TOKEN = 'Fy0vyxtwuXI9BbsNwhSnYOKA6rRXLsahCZkQt1BP5Qo0w6O55ckwZClMXcEB';
    }

    private function validateData($requestArr, $required){
        foreach($required as $field){
            if(!array_key_exists($field, $requestArr))return false;
            if(empty($requestArr[$field]))return false;
        }
        return true;
    }

    private function validateRequest($bearerToken) {
        if($bearerToken !== $this->OT_VERIFICATION_TOKEN) return false;
        return true;
    }

    public function authenticate(Request $request)
    {
        $goodFellow = $this->validateRequest($request->bearerToken());
        if(!$goodFellow) return $this->sendError('I don\'t know who you are. Please verify your self.', 401);

        $data = $request->all();

        $fieldsToValidate = ['first_name', 'last_name', 'phone'];
        $validator = $this->validateData((array)$data,$fieldsToValidate);
        if(!$validator) return $this->sendError('Error !! Some Fields are missing/empty, Please check all required fields.', 206);

        $user = User::firstOrCreate($data);
        $token = Str::random(60);
        $user->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();
        return $this->sendResponse(['user' => $user->toArray(), 'token' => $token], 'User Registered Successfully.');
    }
}
