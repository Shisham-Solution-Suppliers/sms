<?php

namespace App\Http\Livewire;

use App\Models\Operator;
use Livewire\Component;

class MessageBox extends Component
{
    public $operators;
    public $contacts = [];
    public $phoneNumbers = [];
    public $operator;
    public $message;
    public $charCount;

    public function mount()
    {
        $this->operators = auth()->user()->Operator;
        $this->charCount = 0;
    }

    public function updatedOperator($value)
    {
        $this->contacts = auth()->user()->Contact->where('operator_id', $value);
    }

    public function updatedMessage($value)
    {
        $this->charCount = strlen($value);
    }

    public function render()
    {
        return view('livewire.message-box');
    }
}
