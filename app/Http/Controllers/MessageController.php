<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Contact;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('message.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated();
        $nums = [];
        foreach ($data['phone'] as $phone) {
            auth()->user()->Message()->create([
                'contact_id' => $phone,
                'message' => $data['message']
            ]);
            array_push($nums, Contact::find($phone)->phone);
        }
        $phone_numbers = implode(",",$nums);
        $url = "sms://open?addresses=".$phone_numbers."?&body=" . rawurlencode($data['message']);

        return redirect($url)->with('toast_success', 'Message Sent Sucessfully!');
    }

}
