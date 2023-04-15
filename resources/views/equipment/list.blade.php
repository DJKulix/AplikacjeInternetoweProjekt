<!doctype html>
<html lang="en">



@include('shared.header')
<body>
@include('shared.nav')

<section style="background-color: #eee;">

    <div class="container py-5">
        @forelse($equipments as $equipment)
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <img src="{{asset('/storage/img/'.$equipment->imagePath)}}"
                                             class="w-100"/>
                                        <a href="#!">
                                            <div class="hover-overlay">
                                                <div class="mask"
                                                     style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5>{{$equipment->name}}</h5>
                                    <div class="d-flex flex-row">
                                        <div class="text-danger mb-1 me-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>

                                    <p class="text-truncate mb-4 mb-md-0">
                                        {{$equipment->description}}
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">{{$equipment->price}} zł</h4>

                                    </div>
                                    <h6 class="text-success">Price per day</h6>
                                    <div class="d-flex flex-column mt-4">
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-primary btn-sm" type="button"
                                               href="{{route('equipment.show', $equipment->id)}}">More</a>
                                            @if($equipment->quantity > 0)
                                            <form id="cart" action="{{ route('cart.store') }}"
                                                  method="POST" enctype="multipart/form-data" target="goback">
                                                @csrf
                                                <input type="hidden" value="{{ $equipment->id }}" name="id">
                                                <input type="hidden" value="{{ $equipment->name }}" name="name">
                                                <input type="hidden" value="{{ $equipment->price }}" name="price">
                                                <input type="hidden" value="1" name="quantity">

                                                    <button class="btn btn-outline-primary btn-sm mt-2"
                                                            onclick="showAlert()" style="width: 100%">
                                                       Add to cart
                                                    </button>
                                            </form>
                                            @else
                                                <button style="width: 100%"
                                                        class="btn btn-outline-secondary btn-sm btn-rounded mt-2"
                                                        disabled>Add to cart
                                                </button>
                                            @endif
                                            @can('is-admin')
                                                <a class="btn btn-warning btn-sm mt-2" type="button"
                                                   href="{{route('equipment.edit', ['equipment'=>$equipment])}}">Edit</a>

                                                <form method="POST"
                                                      action="{{route('equipment.destroy', ['equipment'=>$equipment])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm btn-block" style="width: 100%"
                                                            type="submit">Delete
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <p>No data</p>
        @endforelse
        <p style="text-align: center;">
            @can('is-admin')
                <a class="btn btn-success" href="{{route('equipment.create')}}">Add new equipment</a>
            @endcan
        </p>
    </div>

</section>
<script>
    function showAlert() {
        text = "Added to cart";
        alert(text);
    }
</script>
</body>
</html>
@include('shared.footer')
