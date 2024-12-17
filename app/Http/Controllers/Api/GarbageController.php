<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Garbage\CreateGarbageRequest;
use App\Http\Requests\Api\Garbage\UpdateGarbageRequest;
use App\Models\Garbage;
use App\Models\Profile;

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
    
    /**
     * updateGarbage
     *
     * @param  mixed $garbage
     * @param  mixed $request
     * @return void
     */
    public function updateGarbage(Garbage $garbage, UpdateGarbageRequest $request) {
        $profile = Profile::firstOrCreate([], [
            'name' => 'TPA',
            'capacity' => 0
        ]);
        $capacityLeft = $profile->capacity - Garbage::sum('amount') + $garbage->amount;

        if ($request->get('amount') > $capacityLeft) {
            return response([
                'message' => 'Jumlah melebihi sisa kapasitas'
            ], 400);
        }

        $garbage->update($request->validated());

        return $garbage;
    }

    public function deleteGarbage(Garbage $garbage) {
        $garbage->delete();

        return $garbage;
    }

}
