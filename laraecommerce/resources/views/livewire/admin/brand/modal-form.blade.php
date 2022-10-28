<!-- Brand Modal Create-->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Brand Name</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label> <br>
                        <input type="checkbox" wire:model.defer="status" /> Checked=Hidden, Un-Checked= Visible
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Brand Create -->

<!-- Modal Brand Edit-->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Spinner loading -->
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div> Loading...
            </div>
            <div wire:loadin.remove>
                <!-- Form Edit -->
                <form wire:submit.prevent="updateBrand">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Brand Name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Brand slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label> <br>
                            <input type="checkbox" wire:model.defer="status" style="width: 70px; " /> Checked=Hidden, Un-Checked= Visible
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <!-- End Form Edit -->
            </div>
            <!-- End Spinner loading -->
        </div>
    </div>
</div>
<!-- End Modal Brand Edit -->

<!-- Modal Brand Delete-->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Spinner loading -->
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div> Loading...
            </div>
            <div wire:loadin.remove>
                <!-- Form Delete -->
                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
                <!-- End Form Delete -->
            </div>
            <!-- End Spinner loading -->
        </div>
    </div>
</div>
<!-- End Modal Brand Delete -->
