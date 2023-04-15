<!doctype html>
<html lang="en">

@include('shared.header')

<body>

@include('shared.nav')

<div class="container">
    <h1 class="mt-5 text-center">Edycja typu</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class='container my-5' method="POST" action="{{ route('type.update', $type->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="type">Nazwa</label>
            <input value={{ $type->type }} id="type" name="type" type="text"
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
        </div>
        <input type="submit" value="Wyślij">
    </form>
</div>
@include('shared.footer')
</body>
</html>
