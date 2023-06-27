<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>

    <h2 class="text-center text-primary mt-3">Liste des types de membre</h2>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('admin.typemembre.create') }}" class="btn btn-success ">Ajouter un type</a>
        <a href="{{route('admin.logout')}}" class="btn btn-danger mx-5">Se déconnecter</a>
        <div class="row d-flex justify-content-center">
            <table class="table  table-striped-columns mt-5">
                <thead>
                    <tr>
                        <th>
                            N°
                        </th>
                        <th>
                            Nom
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($typemembres as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>
                                <a href="{{ route('admin.typemembre.edit',['typemembre'=>$type->id])}}"
                                    class="btn btn-warning">Modifier</a>
                            </td>
                            <td>

                                <form
                                    action="{{ route('admin.typemembre.destroy',['typemembre'=>$type])}}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
