<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if($updateMode) 
        @include('livewire.update') 
    @else 
        @include('livewire.create')
    @endif
    
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i=0;  @endphp
            @foreach($posts as $post)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->email}}</td>
                <td>{{$post->phone}}</td>
                <td>{{$post->address}}</td>
                <td>
                    <div class="d-flex">
                        <button wire:click="edit({{$post->id}})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click ="delete({{$post->id}})" class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
