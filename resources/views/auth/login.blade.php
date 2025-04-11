<x-layout>
    <x-slot name="title">
        <title>Login</title>
    </x-slot>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <h3 class="text-primary text-center mt-3">Login Form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="exampleInputEmail1" class="mb-3">Email address</label>
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label class="mb-3" for="exampleInputPassword1">Password</label>
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
