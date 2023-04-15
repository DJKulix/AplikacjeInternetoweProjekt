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
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{DB::table('roles')->select('name')->where('id', '=', $user->roleID)->pluck('name')->get(0)}}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{route('user.edit', ['user'=>$user])}}">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('type.destroy', ['type'=>$user])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>No data</p>
                @endforelse
                </tbody>
            </table>

        </div>
        <p style="text-align: center;">
            @can('is-admin')
                <a class="btn btn-success" href="{{route('user.create')}}">Add new user</a>
            @endcan
        </p>
    </div>
</section>
</body>
</html>
@include('shared.footer')
