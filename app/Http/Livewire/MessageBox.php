<?php

namespace App\Http\Livewire;

use App\Models\Operator;
use Livewire\Component;

class MessageBox extends Component
{
    public $operators;
    public $contacts = [];
    public $phoneNumbers = [];
    public $batches;
    public $batch;
    public $operator;
    public $message;
    public $charCount;
    public $batch_numnber;
    public $from;
    public $to;

    public function mount()
    {
        $this->operators = auth()->user()->Operaptor;
        $this->charCount = 0;
        $this->batch_numnber = 0;
    }

    public function updatedOperator($value)
    {
        $this->contacts = auth()->user()->Contact->where('operator_id', $value);
        $this->batch_numnber = 0;
    }

    public function updatedBatchNumnber($value)
    {
        if ($value > 0) {
            $isGreater = ceil(count($this->contacts) / $value) > count($this->contacts) / $value;
            if ($isGreater) {
                $this->batches = ceil(count($this->contacts) / $value) + 1;
            } else {
                $this->batches = ceil(count($this->contacts) / $value);
            }
        }
    }

    public function updatedBatch($value)
    {
        $this->from = ($value - 1) * $this->batch_numnber;
        $this->to = $value * $this->batch_numnber;
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
