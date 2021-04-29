<?php

namespace App\Http\Livewire;

use App\Models\NewUser;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TableRow extends Component
{
    public $data = [];

    protected $listeners = ['userAdded' => 'mount'];

    public function mount()
    {
        $this->data = NewUser::all();
    }

    public function render()
    {

        return view('livewire.table-row', ['data' => $this->data]);
    }
}
