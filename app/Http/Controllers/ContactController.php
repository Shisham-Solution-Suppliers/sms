<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Models\OperatorDetail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        $data['operator_id'] = $this->findOperator($data);

        auth()->user()->Contact()->create($data);

        return redirect()->route('contact.index')->with('toast_success', 'Contact Created Sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $contact->load('Operator');
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $data = $request->validated();
        $data['operator_id'] = $this->findOperator($data);
        $contact->update($data);

        return redirect()->route('contact.index')->with('toast_success', 'Contact Updated Sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('toast_success', 'Contact Deleted Sucessfully!');
    }

    public function remap()
    {
        $contacts = auth()->user()->Contact;
        foreach ($contacts as $contact) {
            $data = $contact->toArray();
            $data['operator_id'] = $this->findOperator($data);
            $contact->update($data);
        }
        return redirect()->route('contact.index')->with('toast_success', 'Remap Sucessful!');
    }

    public function findOperator($data)
    {
        $operator_id = null;
        $check = OperatorDetail::all();
        $phone_number = $data['phone'];
        $value = substr($phone_number, 0, 3);
        foreach ($check as $detail) {
            if ($value === $detail->code) {
                $operator_id = $detail->operator_id;
            }
        }
        return $operator_id;
    }
}
