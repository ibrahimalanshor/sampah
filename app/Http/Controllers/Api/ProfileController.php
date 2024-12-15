<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

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
            'capacity' => 100
        ]);
    }

}
