<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\UpdateProfileRequest;
use App\Models\Profile;

class ProfileController extends Controller
{
        
    /**
     * detailProfile
     *
     * @return void
     */
    public function detailProfile() {
        return Profile::firstOrCreate([], [
            'name' => 'TPA',
            'capacity' => 0
        ]);
    }
    
    /**
     * updateProfile
     *
     * @param  mixed $request
     * @return void
     */
    public function updateProfile(UpdateProfileRequest $request) {
        return Profile::updateOrCreate([], [
            'name' => $request->get('name'),
            'capacity' => $request->get('capacity')
        ]);
    }

}
