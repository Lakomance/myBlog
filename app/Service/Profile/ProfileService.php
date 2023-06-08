<?php

namespace App\Service\Profile;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileService
{
    public function updateUser(mixed $data, User $user): void {

        if(isset($data['picture'])) {
            $data['picture'] = Storage::disk('public')->put('', $data['picture']);
        }

        if(!empty($data['password'])) {
            $data['password'] = $data['new_password'];
        }

        else {
            unset($data['password']);
        }

        $user->update($data);
    }
}
