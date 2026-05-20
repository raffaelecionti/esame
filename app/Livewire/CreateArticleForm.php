<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticleForm extends Component
{
#[Validate('required|min:5')]
public $title;
#[Validate('required|min:1o')]
public $description;
#[Validate('required|numeric')]
public $price;
#[Validate('required')]
public $category;
public $article;

public function save()
{
    $this->validate();
    $this->article = Article::create([
    'title' => $this->title,
    'description' => $this->description,
    'price' => $this->price,
    'category' => $this->category,
    'user_id' => Auth::id()
    ]);
}


    public function render()
    {
        return view('livewire.create-article-form');
    }


    
    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->category = '';
        $this->price = ''; 
        $this->cleanForm();
        session()->flash('success', 'Articolo creato correttamente');
    }
    
}
