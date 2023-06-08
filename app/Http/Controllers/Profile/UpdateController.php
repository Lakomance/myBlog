<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
        $currentUser = auth("web")->user();
        $this->service->updateUser($data, $currentUser);
        return redirect()->route('profile.index');
    }
}
