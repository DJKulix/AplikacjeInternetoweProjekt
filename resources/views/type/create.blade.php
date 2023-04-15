<!doctype html>
<html lang="en">

@include('shared.header')

<body>

@include('shared.nav')

<div class="container">
    <h1 class="mt-5 text-center">Insert type</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class='container my-5' method="POST" action="{{ route('type.store')}}">
        @csrf
        <div class="form-group mb-2">
            <label for="type">Name</label>
            <input id="type" name="type" type="text" required
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid name!</div>
        </div>
        <input type="submit" value="Submit">
    </form>


</div>
@include('shared.footer')
</body>

</html>
