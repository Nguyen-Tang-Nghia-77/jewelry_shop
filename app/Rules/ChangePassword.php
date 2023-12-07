<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ChangePasswordModel;
use App\Models\UserModel;
class ChangePassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   
        $userInfo = session('userInfo');
        $currentPassword = md5(request('current_password'));
        // $newPassword = request('password');
        // $confirmPassword = request('password_confirmation');

        $info = UserModel::where('email',$userInfo['email'] )->where('password', $currentPassword )->get();
        return $info->count();

        // $infoId = $this->getCurrentPassword();
        // $passwordId = $infoId->password;
        // $emailId = $infoId->email;

        // return ($passwordId != null && $passwordId == $currentPassword && $emailId == $this->emailCurrent);
    }

   
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error password.';
    }

    protected function getCurrentPassword()
    {
        $user = UserModel::find($this->userId);

        if ($user) {
            return $user;
        }

        return null;
    }
}
