<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function __construct(Car $car) {
        $this->car = $car;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $param = $request->all();
        $cars = $this->car::all();
        $merk = $cars->unique('merk')->pluck('merk', 'merk')->toArray();
        $model = $cars->unique('model')->pluck('model', 'model')->toArray();
        $merk = ['all' => 'All'] + $merk;
        $model = ['all' => 'All'] + $model;

        if (!empty($param['merk']) && $param['merk'] != 'all') {
            $cars = $cars->where('merk', $param['merk']);
            $model = $cars->unique('model')->pluck('model', 'model')->toArray();
            $model = ['all' => 'All'] + $model;
        }

        if (!empty($param['model']) && $param['model'] != 'all') {
            $cars = $cars->where('model', $param['model']);
        }
        return view('car.index', compact('cars', 'merk', 'model'))->with('selectedMerk', $param['merk']?? 'all')->with('selectedModel', $param['model']?? 'all');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'plat' => 'required',
        ]);
        $this->car::create($request->all());

        flash()->success('car registered');
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(car $car)
    {
        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(car $car)
    {
        return view('car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, car $car)
    {
        $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'plat' => 'required',
        ]);
        $car->update($request->all());

        flash()->success('car updated');
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(car $car)
    {
        $car->delete();
        flash()->warning('car deleted');
        return redirect()->route('cars.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function sewa(Request $request)
    {
        $param = $request->all();
        $cars = $this->car::all();
        $merk = $cars->unique('merk')->pluck('merk', 'merk')->toArray();
        $model = $cars->unique('model')->pluck('model', 'model')->toArray();
        $merk = ['all' => 'All'] + $merk;
        $model = ['all' => 'All'] + $model;

        if (!empty($param['merk']) && $param['merk'] != 'all') {
            $cars = $cars->where('merk', $param['merk']);
            $model = $cars->unique('model')->pluck('model', 'model')->toArray();
            $model = ['all' => 'All'] + $model;
        }

        if (!empty($param['model']) && $param['model'] != 'all') {
            $cars = $cars->where('model', $param['model']);
        }
        return view('car.sewa', compact('cars', 'merk', 'model'))->with('selectedMerk', $param['merk']?? 'all')->with('selectedModel', $param['model']?? 'all');
    }

    public function rentcar(car $car) {
        $user = auth()->user();
        return view('car.sewa-mobil', compact('car','user'));
    }

    public function rentcarsubmit(car $car, Request $request) {
        Rent::create($request->all());

        flash()->success('car registered');
        return redirect()->route('sewa');
    }
}
