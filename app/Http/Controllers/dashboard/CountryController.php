<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('dashboard.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('dashboard.countries.create');
    }

    public function store(CountryStoreRequest $request)
    {
        //create the validated data from the request
        //Country::create($request->validated());

        Country::create([
            'country_code' => $request->country_code,
            'name' => $request->name
        ]);
        return Redirect(route('countries.index'))->with('message', 'Country Created Successfully!!!');
    }

    public function edit(Country $country)
    {
        return view('dashboard.countries.edit', compact('country'));
    }

    public function update(CountryUpdateRequest $request, Country $country)
    {
        $country->update([
            'country_code' => $request->country_code,
            'name' => $request->name
        ]);
        return Redirect(route('countries.index'))->with('message', 'Country Updated Successfully!!!');
    }

     public function destroy(Country $country)
    {
        $country->delete();
        return Redirect(route('countries.index'))->with('message', 'Deleted Successfully!!');
    }
}
