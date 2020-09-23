<?php

namespace App\Http\Livewire;

use Kdion4891\LaravelLivewireTables\TableComponent;

class BaseTable extends TableComponent
{
    public $header_view = 'table.header';
    public $footer_view = 'table.footer';
    public $thead_class = 'thead-dark';
    public $checkbox_side = 'left';

    public $modal_title = 'Create';
    public $show_modal = false;
    public $model_update = false;


    public function create()
    {
        $this->show_modal = true;
    }

    public function toggleModel()
    {
        $this->show_modal = !$this->show_modal;
    }
}
