<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyOptionRequest;
use App\Models\Property;
use App\Models\PropertyOption;

class PropertyOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Property  $property
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        $propertyOptions = PropertyOption::paginate(10);
        return view('auth.property_options.index', compact('propertyOptions', 'property'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Property  $property
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {
        return view('auth.property_options.form', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PropertyOptionRequest  $request
     * @param  Property  $property
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyOptionRequest $request, Property $property)
    {
        $params = $request->all();
        $params['property_id'] = $request->property->id;

        PropertyOption::create($params);
        return redirect()->route('property-options.index', $property);
    }

    /**
     * Display the specified resource.
     *
     * @param  Property  $property
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return void
     */
    public function show(Property $property, PropertyOption $propertyOption)
    {
        return view('auth.property_options.show', compact('propertyOption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyOption  $propertyOption
     * @param  Property  $property
     * @return void
     */
    public function edit(Property $property, PropertyOption $propertyOption)
    {
        return view('auth.property_options.form', compact('propertyOption', 'property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Property  $property
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyOptionRequest $request, Property $property, PropertyOption $propertyOption)
    {
        $params = $request->all();

        $propertyOption->update($params);
        return redirect()->route('property-options.index', $property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Property  $property
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Property $property, PropertyOption $propertyOption)
    {
        $propertyOption->delete();
        return redirect()->route('property-options.index', $property);
    }
}
