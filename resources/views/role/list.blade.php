<!doctype html>
<html lang="pl">

@include('shared.header')
<body>
@include('shared.nav')

<section style="background-color: #eee;">
    <div class="container">
        <div class ="row justify-content-center mb-3">
            <a class = "btn-primary btn my-5 block ml-5" href="{{route('role.create')}}">Add role</a>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center mb-3">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->createdAt}}</td>
                        <td>{{$role->updatedAt}}</td>
                        <td><a class = "btn-primary btn my-5 block ml-5" href="{{route('role.edit', ['role'=>$role])}}">Edit</a></td>
                        <td>
                            <form method="POST" action="{{route('role.destroy', ['role'=>$role])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-block" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>No data</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>
@include('shared.footer')
