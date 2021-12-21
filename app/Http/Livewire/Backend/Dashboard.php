<?php

namespace App\Http\Livewire\Backend;

use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class Dashboard extends Component
{

    public $filter_date = null;
    public $month = null;
    public $year = null;
    public $total_sell_amount = 0;
    public $total_items = 0;
    public $total_active_items = 0;
    public $total_inactive_items = 0;
    public $total_categories = 0;
    public $total_active_categories = 0;
    public $total_inactive_categories = 0;
    public $total_active_online_items = 0;
    public $total_inactive_online_items = 0;
    public $total_active_online_categories = 0;
    public $total_inactive_online_categories = 0;
    public $total_expense_amount = 0;

    public function calculation()
    {
       

       
    }


    public function mount()
    {
        $this->month = date('m');
        $this->year = date('Y');

    }

    public function render()
    {
        $this->calculation();
        return view('livewire.backend.dashboard')
        ->layout('layouts.backend.app');
    }
}
