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


    <form class='container my-5' id="eqstore" method="POST" action="{{ route('equipment.store')}}">
        @csrf
        <div class="form-group mb-2">
            <label for="type">Type</label>
            <select form="eqstore" id="type" name="type" class="@error('type') is-invalid @else is-valid @enderror">
                <option value="1">1 - Mixer</option>
                <option value="2">2 - Audio speaker</option>
                <option value="3">3 - Microphone</option>
                <option value="4">4 - Audio cable</option>
                <option value="5">5 - DMX controller</option>
                <option value="6">6 - DMX fixture</option>
                <option value="7">7 - DMX cable</option>
            </select>
            <div class="invalid-feedback">Invalid type!</div>
        </div>
        <div class="form-group mb-2">
            <label for="code">Name</label>
            <input id="name" name="name" type="text"
                   class="@error('name') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid name!</div>
        </div>
        <div class="form-group mb-2">
            <label for="currency">Price</label>
            <input  id="price" name="price" type="number"
                   class="@error('price') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid price!</div>
        </div>
        <div class="form-group mb-2">
            <label for="area">Quantity</label>
            <input  id="quantity" name="quantity" type="number"
                   class="@error('quantity') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Image path 1</label>
            <input  id="imagePath" name="imagePath"
                   type="text" class="@error('imagePath') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid path!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Image path 2</label>
            <input id="imagePath2" name="imagePath2"
                   type="text" class="@error('imagePath2') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid path!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Video path</label>
            <input  id="videoPath" name="videoPath"
                   type="text" class="@error('videoPath') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid path!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Description</label>
            <input id="description" name="description"
                   type="text" class="@error('videoPath') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid description!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Info1</label>
            <input  id="info1" name="info1"
                   type="text" class="@error('info1') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Info2</label>
            <input id="info2" name="info2"
                   type="text" class="@error('info2') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Info3</label>
            <input id="info3" name="info3"
                   type="text" class="@error('info3') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Info4</label>
            <input id="info4" name="info4"
                   type="text" class="@error('info4') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Info5</label>
            <input id="info5" name="info5"
                   type="text" class="@error('info5') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Feauture1</label>
            <input id="feature1" name="feature1"
                   type="text" class="@error('feature1') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Feauture2</label>
            <input id="feature2" name="feature2"
                   type="text" class="@error('feature2') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <div class="form-group mb-2">
            <label for="language">Feauture3</label>
            <input  id="feature3" name="feature3"
                   type="text" class="@error('feature3') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">Invalid value!</div>
        </div>
        <input type="submit" value="Submit">
    </form>


</div>
@include('shared.footer')
</body>

</html>
