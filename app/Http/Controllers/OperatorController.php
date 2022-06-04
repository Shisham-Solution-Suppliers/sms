<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;
use App\Models\Operator;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatorRequest $request)
    {
        $data = $request->validated();
        $operator = auth()->user()->Operator()->create($data['details']);
        $operator->OperatorDetail()->createMany($data['rows']);

        return redirect()->route('operator.index')->with('toast_success', 'Operator Created Sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        $operator->load('OperatorDetail');
        return view('operator.show', compact('operator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function edit(Operator $operator)
    {
        return view('operator.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperatorRequest  $request
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperatorRequest $request, Operator $operator)
    {
        $data = $request->validated();
        $operator->OperatorDetail()->delete();
        $operator->OperatorDetail()->createMany($data['rows']);
        $operator->update($data['details']);

        return redirect()->route('operator.index')->with('toast_success', 'Operator Updated Sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        if ($operator->isUsed()) {
            return redirect()->route('operator.index')->with('toast_error', 'Operator in use!');
        } else {
            $operator->OperatorDetail()->delete();
            $operator->delete();

            return redirect()->route('operator.index')->with('toast_success', 'Operator Deleted Sucessfully!');
        }
    }
}
