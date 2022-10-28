<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $brand_id;


// function untuk validasi form
    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }
// function end validasi form

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }


// Close Modal Store
    public function storeBrand()
    {
        $validateData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
// End Close Modal Store

//  close modal/ wire:click="closeModal"
    public function closeModal()
    {
        $this->resetInput();
    }
//  Endclose modal

//  open modal/ wire:click="openModal"
    public function openModal()
    {
        $this->resetInput();
    }
//  End open modal

//  value modal edit
public function editBrand(int $brand_id)
{
    $this->brand_id = $brand_id;
    $brand = Brand::findOrFail($brand_id);
    $this->name = $brand->name;
    $this->slug = $brand->slug;
    $this->status = $brand->status;
}
// end value modal edit

// update data
    public function updateBrand()
    {
        $validateData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', 'Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
// end update data

// function delete data
    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }
// end function delete data

// function destroy form
    public function destroyBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
// end function destroy form

// function brand index table brand
    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(7);
        return view('livewire.admin.brand.index', ["brands" => $brands])
                    ->extends('layouts.admin')
                    ->section('content');
    }
// end function brand index table brand
}
