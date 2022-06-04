<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OperatorData extends Component
{
    public $rows = [];
    public $operator;

    public function mount()
    {
        if (!empty($this->operator)) {
            foreach ($this->operator->OperatorDetail as $item) {
                array_push($this->rows, $item);
            }
        }
    }

    public function render()
    {
        return view('livewire.operator-data');
    }

    public function addRow()
    {
        $this->rows[] = [
            'code' => null,
        ];
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows);
    }
}
