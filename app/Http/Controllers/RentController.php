<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Car;
use Illuminate\Http\Request;

class RentController extends Controller
{

    public function __construct(Rent $rent) {
        $this->rent = $rent;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $rents = [];
        $count = 0;
        $param = $request->all();
        $nomor = '';
        if (!empty($param['nomor'])) {
            $nomor = $param['nomor'];
            $car = Car::all()->where('plat', $param['nomor'])->first();
            $rents = $this->rent->all()->where('returned', FALSE)->where('car_id', $car->id)->where('user_id', $user->id);
            $count = $rents->count();
        }
        return view('rent.index', compact('rents', 'nomor','count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        $rent->update(['returned' => TRUE]);

        flash()->success('Mobil berhasil dikembalikan');
        return redirect()->route('rents.index');
    }
}
