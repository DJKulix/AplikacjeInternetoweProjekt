<!doctype html>
<html lang="pl">

@include('shared.header')
<body>
@include('shared.nav')
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            User panel <span class="sr-only">
                            </span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('event.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.edit', ["user"=>\Illuminate\Support\Facades\Auth::user()])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                            Your data
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome, {{Auth::user()->name}}!</h1>
            </div>

            <h2>Ordered equipment</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cartItems as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
{{--                        Sprawdzenie czy ilość w koszyku nie przekracza maksymalnej dostępnej ilości sprzętu--}}
                        @php
                        $maxQuantity = DB::table('equipments')->select('quantity')->where('id', $item->id)->value('quantity')
                        @endphp
                            @if($item->quantity > $maxQuantity)
                                @php
                            Cart::update($item->id, array(
                                'quantity' => array(
                                    'relative' => false,
                                    'value' => $maxQuantity
                                ),
                                ));
                                @endphp
                            <script>
                                alert("Your ordered number exceeds available quantity. Maximum available items were set.")
                            </script>
                        @endif
                        <td>{{$item->quantity}}</td>

                        <td>
                            <form id="cart" action="{{ route('cart.update') }}" method="POST" enctype="multipart/form-data" target="goback">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <input type="hidden" value="{{ $item->quantity + 1 }}" name="quantity">
                            <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            </button>
                            </form>
                        </td>
                        <td>
                            <form id="cart" action="{{ route('cart.update') }}" method="POST" enctype="multipart/form-data" target="goback">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <input type="hidden" value="{{ $item->quantity - 1 }}" name="quantity">
                            <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                            </button>
                            </form>
                        </td>
                        <td>{{$item->price}}</td>

                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="btn btn-danger" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <p>Cart is empty</p>
                    @endforelse
                    </tbody>
                </table>
                <div>
                    @if(Cart::getTotal() == 0)
                        <button type="button" class="btn btn-primary" disabled>
                            Next</button>
                    @else
                        <p><b>Total: {{ Cart::getTotal() }} PLN/day</b></p>
                    <a class="btn-primary btn my-5 block ml-5" style="width: 10rem"
                       href="/rent">Next</a>
                    @endif
                </div>

            </div>
        </main>
    </div>
</div>
@include('shared.footer')
</body>
</html>
