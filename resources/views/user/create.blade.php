<!doctype html>
<html lang="en">
@include('shared.header')
<body>
@include('shared.nav')

<div class="container">
    <h1 class="mt-5 text-center">Insert Equipment</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class='container my-5' id="userstore" method="POST" action="{{ route('user.store')}}">
        @csrf
        <div class="form-group mb-2">
            <label for="role">Role</label>
            <select form="userstore" id="role" name="role" class="@error('type') is-invalid @else is-valid @enderror">
                <option value="1">1 - Admin</option>
                <option value="2">2 - User</option>
            </select>
            <div class="invalid-feedback">Invalid role!</div>
        </div>
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input id="name" name="name" type="text"
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid name!</div>
        </div>
        <div class="form-group mb-2">
            <label for="surname">Surname</label>
            <input id="surname" name="surname" type="text"
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid surname!</div>
        </div>
        <div class="form-group mb-2">
            <label for="email">E-mail</label>
            <input id="email" name="email" type="text"
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid email!</div>
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input id="password" name="password" type="password"
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid password!</div>
        </div>
        <div class="form-group mb-2">
            <label for="address">Address</label>
            <input  id="address" name="address" type="text"
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid address!</div>
        </div>
        <div class="form-group mb-2">
            <label for="company">Company</label>
            <input  id="company" name="company" type="text"
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid company!</div>
        </div>
        <div class="form-group mb-2">
            <label for="nip">NIP</label>
            <input id="nip" name="nip" type="number"
                   class="@error('type') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid nip!</div>
        </div>
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
