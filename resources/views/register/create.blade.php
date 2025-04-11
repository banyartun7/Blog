<x-layout>
    <x-slot name="title">
        <title>Register</title>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center mt-3">Register Form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                id="name" placeholder="Enter name" />
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="username">Username</label>
                            <input name="username" value="{{ old('username') }}" type="text" class="form-control"
                                id="username" placeholder="Enter username" />
                            @error('username')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password" />
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
