<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Silakkan menginputkan data</h1>
            <form action="/tambah/{{ $users->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-floating">
                <input type="text" name='name' class="form-control rounded-top" @error('name') is-invalid
                @enderror id="name" placeholder="Name" required value="{{ $users->name }}">
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="form-floating">
                <input type="email" name="email" class="form-control" @error('email') is-invalid
                @enderror id="email" placeholder="name@example.com" required value="{{ $users->email }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom" @error('password') is-invalid
                @enderror id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Submit</button>
            </form>
        </main>
    </div>
</div>
