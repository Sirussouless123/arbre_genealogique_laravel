<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre</title>
    <link rel="stylesheet" href="{{ asset('assets/css/membre.css') }}">

</head>

<body>
    <div class="head">
        <h1>Famille</h1>
        <div class="nav-links">
            <ul>

                @if (session('idTm') && (session('idTm') == $pere || session('idTm') == $mere))
                    <a href="{{ route('recensement') }}">Recensement</a>
                    <a href="{{ route('logout') }}">Déconnexion</a>
                @else
                    <a href="{{ route('logout') }}">Déconnexion</a>
                @endif
            </ul>


        </div>
    </div>

    <div class="famille">


        @if (session('idTm') && (session('idTm') == $pere || session('idTm') == $mere))

            @foreach ($users as $user)
           
                <div class="personne">
                    <h5> <span>Membre</span> </h5>
                    <p>Nom: <span>{{ $user->f_name }} </span></p>
                    <p>Prénom: <span>{{ $user->l_name }}</span></p>
                    <p>Date de naissance: <span> {{ $user->birth_date }} </span></p>
                    <p>Statut: <span> {{ $user->name }}</span></p>
                    <u> <a href="{{ route('modifmembre',[
                        'utilisateur'=>$user->id,
                    ])}}" style='color:blue;'>Modifier les informations</a></u>
                </div>
            @endforeach
        @else
            @foreach ($users as $user)
                <div class="personne">
                    <h5> <span>Membre</span> </h5>
                    <p>Nom: <span>{{ $user->f_name }} </span></p>
                    <p>Prénom: <span>{{ $user->l_name }}</span></p>
                    <p>Date de naissance: <span> {{ $user->birth_date }} </span></p>
                    <p>Statut: <span> {{ $user->name }}</span></p>


                </div>
            @endforeach
        @endif



    </div>
</body>

</html>
