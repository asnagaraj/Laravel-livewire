<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{
    public $posts, $name,$email,$phone,$address, $post_id;
    public $updateMode =false;

    public function render()
    {
        $this->posts= Post::all();
        return view('livewire.posts');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email ='';
        $this->phone = '';
        $this->address = '';
    }

    public function store()
    {
        $validatedata = $this->validate([
            'name' =>'required',
            'email' =>'required',
            'phone' =>'required',
            'address' =>'required'
        ]);

        Post::create($validatedata);

        toastr()->success('Post Created Successfully!');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->name= $post->name;
        $this->email =$post->email;
        $this->phone = $post->phone;
        $this->address= $post->address;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode= false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedata = $this->validate([
            'name' =>'required',
            'email'=>'required',
            'phone' =>'required',
            'address' =>'required'
        ]);

        $post = Post::find($this->post_id);
        $post->update([
            'name' =>$this->name,
            'email' =>$this->email,
            'phone' =>$this->phone,
            'address' =>$this->address,
        ]);

        $this->updateMode =false;

        toastr()->success('Post Updated Successfully');

        $this->resetInputFields();
    }

    public function delete($id)
    {
        Post::find($id)->delete();

        toastr()->error('Post Deleted Successfully');
    }
}
