<!doctype html>
<html lang="pl">

@include('shared.header')
<body>
@include('shared.nav')

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center mb-3">

            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($types as $type)

                    <tr>
                        <td>{{$type->id}}</td>
                        <td>{{$type->type}}</td>
                        <td>
                            <a class = "btn btn-warning btn-sm" href="{{route('type.edit', ['type'=>$type])}}">Edit</a></td>
                        <td>
                            <form method="POST" action="{{route('type.destroy', ['type'=>$type])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>Brak danych</p>
                @endforelse
                </tbody>
            </table>

        </div>
        <p style="text-align: center;">
            @can('is-admin')
                <a class="btn btn-success" href="{{route('type.create')}}">Add new type</a>
            @endcan
        </p>
    </div>
</section>
</body>
</html>
@include('shared.footer')
