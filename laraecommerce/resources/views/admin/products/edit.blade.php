@extends("layouts.admin")
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product
                    <a href="{{ url("/admin/products") }}" class="btn btn-danger btn-sm text-white float-end">
                        BACK
                    </a>
                </h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Products Image
                            </button>
                        </li>
                    </ul>
                  <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3 mt-2">
                                <label class="form-label">Sellect Category</label>
                                <select name="category_id" class="form-control form-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name',$product->name) }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ old('slug',$product->slug) }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Brand</label>
                                <select name="brand" class="form-control form-select">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}"{{ $brand->name == $product->brand ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Small Description (500 Words)</label>
                                <textarea type="text" name="small_description" rows="4" class="form-control">{{ old('small_description',$product->small_description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea type="text" name="description" rows="4" class="form-control">{{ old('description',$product->description) }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title',$product->meta_title) }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea type="text" name="meta_description" rows="4" class="form-control">{{ old('meta_description',$product->meta_description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" rows="4" class="form-control">{{ old('meta_keyword',$product->meta_keyword) }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Original Price</label>
                                        <input type="number" name="original_price" class="form-control" value="{{ old('original_price',$product->original_price) }}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Selling Price</label>
                                        <input type="number" name="selling_price" class="form-control" value="{{ old('selling_price',$product->selling_price) }}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" value="{{ old('quantity',$product->quantity) }}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Trending</label>
                                        <input type="checkbox" name="trending" style="width: 50px; height:50px;" {{ old('trending',$product->trending == '1' ? 'checked':'') }}/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <input type="checkbox" name="status" style="width: 50px; height:50px;" {{ old('status',$product->status == '1' ? 'checked':'') }}/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="form-label">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                @if($product->productImages)
                                    @foreach ($product->productImages as $image)

                                    <img src="{{ asset($image->image) }}" style="width: 80px; height:80px;" class="me-4 border">
                                    @endforeach
                                @else
                                <h5>No Image Added</h5>
                                @endif
                            </div>
                        </div>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
