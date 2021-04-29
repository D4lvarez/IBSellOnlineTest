<form wire:submit.prevent="registerUser" method="POST">
    @method('POST')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
    @csrf

    {{-- Username Field --}}
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="username" class="col-form-label">Username</label>
        </div>
        <div class="col-2">
            <input type="text" id="username" wire:model="username" required class="form-control">
            @error('username') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    {{-- Email Field --}}
    <div class="row g-3 align-items-center mt-3">
        <div class="col-2">
            <label for="email" class="col-form-label">Email</label>
        </div>
        <div class="col-2">
            <input type="email" id="email" wire:model="email" required class="form-control">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    {{-- Phone Field --}}
    <div class="row g-3 align-items-center mt-3">
        <div class="col-2">
            <label for="phone" class="col-form-label">Phone</label>
        </div>
        <div class="col-2">
            <input type="number" id="phone" wire:model="phone" required class="form-control">
            @error('phone') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    {{-- Image Field --}}
    <div class="row g-3 align-items-center mt-3">
        <div class="col-auto" style="margin-left: 59px">
            <label class="input-group-text" for="userImage">Upload Image</label>
            <input type="file" class="form-control" required wire:model="userImage" id="userImage">
            @error('userImage') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
