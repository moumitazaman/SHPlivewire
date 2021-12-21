<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Document;
use Livewire\WithFileUploads;


class Documents extends Component
{
    use WithFileUploads;
    public $documents;

    public $name, $year, $document, $notes, $location, $user_id;
    public $select_for_edit = null;
    public $select_for_delete = null;

    public function create_new(){
        $this->select_for_edit = $this->name = $this->year = $this->document = $this->notes = $this->user_id = $this->location = null ;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'year' => 'required|numeric|min:0',
            'document' => 'nullable|image|max:1024'
        ]);

        
        $model = new Document();
        $model->name = $this->name;
        $model->year = $this->year;
        $model->notes = $this->notes;
        $model->location = $this->location;
        $model->user_id = $this->user_id;
        $model->type =1;
        if($this->document)
        $model->document = 'storage/'.$this->document->store('webfiles', 'public');
        $model->save();
        $this->create_new();
        $this->documents = Document::latest()->get();
        session()->flash('message', 'Successfully done');
    }

    public function render()
    {
        $this->documents = Document::orderBy('id','DESC')->get();
        return view('livewire.backend.documents')->layout('layouts.backend.app');
    }
}
