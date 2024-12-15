<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Garbage\CreateGarbageRequest;
use App\Models\Garbage;
use App\Models\Profile;
use Illuminate\Http\Request;

class GarbageController extends Controller
{
        
    /**
     * getAllGarbage
     *
     * @return void
     */
    public function getAllGarbage() {
        return Garbage::all();
    }
    
    /**
     * createGarbage
     *
     * @param  mixed $request
     * @return void
     */
    public function createGarbage(CreateGarbageRequest $request) {
        $profile = Profile::firstOrCreate([], [
            'name' => 'TPA',
            'capacity' => 0
        ]);
        $capacityLeft = $profile->capacity - Garbage::sum('amount');

        if ($request->get('amount') > $capacityLeft) {
            return response([
                'message' => 'Jumlah melebihi sisa kapasitas'
            ], 400);
        }

        return Garbage::create($request->validated());
    }

}
