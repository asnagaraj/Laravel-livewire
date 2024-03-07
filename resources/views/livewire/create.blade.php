<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="form-label" for="nameInp">Name</label>
            <input type="text" class="form-control" id="nameInp" placeholder="Enter name" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="emailInp">Email</label>
            <input type="email" class="form-control" id="emailInp" placeholder ="Enter email" wire:model="email">
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="form-label" for="numberInp">Phone</label>
            <input type="number" class="form-control" id="numberInp" placeholder ="Enter phone" wire:model="phone">
            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="addressInp">Address</label>
            <input type="text" class="form-control" id="addressInp" placeholder ="Enter address" wire:model="address">
            @error('address')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Create</button>
</form>
