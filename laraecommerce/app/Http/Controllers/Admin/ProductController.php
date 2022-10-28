<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            "products" => Product::all(),
        ]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }

    public function store(ProductFormRequest $request)
    {
        $validateData = $request->validated();
        $category = Category::findOrFail($validateData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validateData['category_id'],
            'name' => $validateData['name'],
            'slug' => Str::slug($validateData['slug']),
            'brand' => $validateData['brand'],
            'small_description' => $validateData['small_description'],
            'description' => $validateData['description'],
            'original_price' => $validateData['original_price'],
            'selling_price' => $validateData['selling_price'],
            'quantity' => $validateData['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $validateData['meta_title'],
            'meta_keyword' => $validateData['meta_keyword'],
            'meta_description' => $validateData['meta_description'],
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'upload/products/';

            $i=1;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        return redirect('/admin/products')->with('message', 'Product Added Successfully');
    }

    public function edit(int $product_id)
    {
        return view('admin.products.edit',[
            "product" => Product::findOrFail($product_id),
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validateData = $request->validated();
        $product = Category::findOrFail($validateData['category_id'])
                            ->products()->where('id', $product_id)->first();
        if($product)
        {
            $product = update([
                'category_id' => $validateData['category_id'],
                'name' => $validateData['name'],
                'slug' => Str::slug($validateData['slug']),
                'brand' => $validateData['brand'],
                'small_description' => $validateData['small_description'],
                'description' => $validateData['description'],
                'original_price' => $validateData['original_price'],
                'selling_price' => $validateData['selling_price'],
                'quantity' => $validateData['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $validateData['meta_title'],
                'meta_keyword' => $validateData['meta_keyword'],
                'meta_description' => $validateData['meta_description'],
            ]);
            if($request->hasFile('image')){
                $uploadPath = 'upload/products/';

                $i=1;
                foreach($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            return redirect('/admin/products')->with('message', 'Product Updated Successfully');
        }
        else {
            return redirect('/admin/products')->with('message', 'No Such Product Id Found');
        }

    }
}
