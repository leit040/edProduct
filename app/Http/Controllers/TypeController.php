<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        Type::create($request->only('name', 'description'));
        redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('types.form', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTypeRequest $request
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->all());
        redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {

        $type->products()->delete();
        $type->delete();
        redirect(route('types.index'));
    }
}
