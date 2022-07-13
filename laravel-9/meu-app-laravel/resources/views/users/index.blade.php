@extends('template.users')
@section('title', 'Usuários')
@section('body')
    <h1 class= "">Usuários</h1>
    <a href="{{route('users.create')}}" class= "btn btn-secondary">Novo Usuário</a>
    <table class="table container" >
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">e-mail</th>
                <th scope="col">Postagens</th>
                <th scope="col">Data Cadastro</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
                <tr>
                    @if($user->image)
                        <th><img src="{{ asset('storage/' .$user->image) }}" width="50px" height="50px" class="rounded-circle"></th>
                    @else
                    <th><img src="{{ asset('storage/profile/avatar.png') }}" width="50px" height="50px" class="rounded-circle"></th>
                    @endif
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    <a href="{{route('posts.show', $user->id)}}" class="btn btn-outline-dark text-white">Postagens</a>
                    </td>
                    <td>{{date('d/m/Y', strtotime($user->created_at))}}</td>
                    <td><a href="{{route('users.show', $user->id)}}" class="btn btn-info text-white">Visualizar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="justify-content-center pagination">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection

<!-- implementa dados fake no banco -->
<!-- php artisan db:seed -->

<!-- criar model e migration -->
<!-- php artisan make:model NomeDaMigration -m -->

<!-- criar model e migration -->
<!-- php artisan make:model NomeDaMigration -m -->

<!-- criar o seeder  -->
<!-- php artisan make:seeder NomeSeeder -->

<!-- cria o factory -->
<!-- php artisan make:factory NameFactory -->

<!-- implementa dados fake no banco -->
<!-- php artisan db:seed NameSeeder-->
