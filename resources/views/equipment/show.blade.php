<!doctype html>
<html lang="pl">
@include('shared.header')

<body>
@include('shared.nav')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{$equipment->name}}</h3>
            <h6 class="card-subtitle">Product ID: {{$equipment->id}}</h6>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center">
                        <img src="{{asset('/storage/img/'.$equipment->imagePath)}}" width="85%" height="75%" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">Product description</h4>
                    <p>{{$equipment->description}}</p>
                    <h2 class="mt-5">
                        {{$equipment->price}} PLN/day
                    </h2>
                    <h4 class="mt-5">
                        @if($equipment->quantity == 0)
                            Product not available!
                           <br> <button class="btn btn-secondary btn-rounded" disabled>Order</button>
                        @else
                        Available amount: {{$equipment->quantity}}
                          <br>
                            <form id="cart" action="{{ route('cart.store') }}"
                                  method="POST" enctype="multipart/form-data" target="goback">
                                @csrf
                                <input type="hidden" value="{{ $equipment->id }}" name="id">
                                <input type="hidden" value="{{ $equipment->name }}" name="name">
                                <input type="hidden" value="{{ $equipment->price }}" name="price">
                                <input type="hidden" value="1" name="quantity">

                                <button class="btn btn-outline-primary btn-sm mt-2"
                                        onclick="showAlert()" style="width: 25%">
                                    Add to cart
                                </button>
                            </form>
                        @endif
                    </h4>


                    <h3 class="box-title mt-5">Main features</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>{{$equipment->feature1}}</li>
                        <li><i class="fa fa-check text-success"></i>{{$equipment->feature2}}</li>
                        <li><i class="fa fa-check text-success"></i>{{$equipment->feature3}}</li>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">General info</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                            <tr>
                            {!!html_entity_decode($equipment->info1)!!}
                            </tr>
                            <tr>
                                {!!html_entity_decode($equipment->info2)!!}
                            </tr>
                            <tr>
                                {!!html_entity_decode($equipment->info3)!!}
                            </tr>
                            <tr>
                                {!!html_entity_decode($equipment->info4)!!}
                            </tr>
                            <tr>
                                {!!html_entity_decode($equipment->info5)!!}
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showAlert() {
        text = "Added to cart";
        alert(text);
    }
</script>
@include('shared.footer')
</body>
</html>
