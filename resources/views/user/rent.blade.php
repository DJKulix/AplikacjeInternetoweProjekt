<html lang="en">
@include('shared.header')

<body class="bg-light">
@include('shared.nav')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Rented equipment</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach($cartItems as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$item->name}}</h6>
                        <small class="text-muted">{{$item->quantity}} pcs</small>
                    </div>
                    <span class="text-muted">{{$item->price * $item->quantity}} PLN</span>
                </li>
                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong>{{Cart::getTotal()}} PLN</strong>
                </li>
            </ul>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Your credentials</h4>
            <form class="needs-validation" method="POST" action="{{route('event.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                        <div class="invalid-feedback"> This field is required</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Surname</label>
                        <input type="text" id="lastName" class="form-control" name="lastName" placeholder="" value="{{\Illuminate\Support\Facades\Auth::user()->surname}}" >
                        <div class="invalid-feedback">
                           This field is required
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"  name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    <div class="invalid-feedback">
                        Check your email
                    </div>
                </div>


                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" required="" name="address" value="{{\Illuminate\Support\Facades\Auth::user()->address}}">
                    <div class="invalid-feedback">
                        Check your address
                    </div>
                </div>

                <div class="mb-3">
                    <label for="eventName">Event name</label>
                    <input type ="text" class="form-control" id="eventName" name="eventName" placeholder="Event" required>
                    <div class="invalid-feedback">
                        Check event name
                    </div>
                </div>

                 <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="startDate">Start date</label>
                    <input type = "date" class="form-control" id="startDate" required="" name="startDate" value="<?php echo date('Y-m-d'); ?>">
                    <div class="invalid-feedback">
                        Check date
                    </div>
                </div>
                     <div class="col-md-6 mb-3">
                         <label for="endDate">End date</label>
                         <input type = "date" class="form-control" id="endDate" required="" name="endDate">
                         <div class="invalid-feedback">
                             Check date
                         </div>
                     </div>
                 </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"> </textarea>
                    <div class="invalid-feedback">
                        Check description
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
            </form>

        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


@include('shared.footer')
</body>
</html>
