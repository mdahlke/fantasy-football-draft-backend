<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UserController extends Controller
{
    public function user()
    {
        return response()->json(auth()->user());
    }

    /**
     * Update the user's profile information.
     *
     * @param Request $request
     * @param UpdatesUserProfileInformation $updater
     * @return JsonResponse
     */
    public function update(Request $request,
        UpdatesUserProfileInformation $updater)
    {
        $updater->update($request->user(), $request->all());

        return response()->json(auth()->user());
    }
}
