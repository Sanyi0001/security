<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cars = Car::orderBy('registration_number', 'asc')->get();

        // Connecting to the API and requesting the USD-EUR currency pair, the URL also contains the API key
        $response = Http::get('https://free.currconv.com/api/v7/convert?q=USD_EUR&compact=ultra&apiKey=9c7b50ffa8a208a7459f');

        // Getting the USD_EUR exchange rate out of the json reply
        $exchange_rate = $response->json('USD_EUR');

        // Calculating and assigning a USD value for every car based on the EUR
        foreach ($cars as $car) {
            $car->EUR = round($car->USD * $exchange_rate);
        }

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Car $car, Request $request)
    {
        Car::create($this->validateCar($request));
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return redirect('/cars');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $this->authorize('update-car');
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $this->authorize('update-car');
        $car->update($this->validateCarUpdate($request));
        return redirect(route('cars.show', $car));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $this->authorize('update-car');
        $car->delete();
        return redirect(route('cars.index'));
    }

    public function validateCar($request)
    {

        return $request->validate([
            'registration_number' => 'required|digits:8|unique:cars',
            'manufacturer' => 'required',
            'currently_available' => 'boolean',
            'contact_email' => 'required|email',
            'USD' => 'required|numeric'
        ]);
    }

    public function validateCarUpdate($request)
    {

        return $request->validate([
            'manufacturer' => 'required',
            'currently_available' => 'boolean',
            'contact_email' => 'required|email',
            'USD' => 'required|numeric'
        ]);
    }

}
