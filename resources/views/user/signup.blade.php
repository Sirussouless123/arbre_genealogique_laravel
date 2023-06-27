<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnic-popup.min.css" rel="stylsheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{asset('assets/css/inscription.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>


    <form action="" method="post">
@csrf
        <h2>Inscription</h2>
        <input type="text" name="f_name" placeholder="Nom"  autocomplete="off">
        <div class="text-danger ">

            @error('f_name')
                 {{ $message}}
            @enderror
        </div>
        <input type="text" name="l_name" placeholder="Prénom"  autocomplete="off">
        <div class="text-danger">

            @error('l_name')
            {{ $message}}
       @enderror
        </div>
        <input type="email" name="mail" placeholder="Email"  autocomplete="off">
        <div class="text-danger">

            @error('mail')
            {{ $message}}
       @enderror
        </div>
        <input type="date" name="birth_date" autocomplete="off">
        <div class="text-danger">

            @error('birth_date')
            {{ $message}}
       @enderror
        </div>
        <input type="text " name="birth_city" placeholder="Ville de naissance"  autocomplete="off">

        <div class="text-danger">
            
            @error('birth_city')
            {{ $message}}
       @enderror
        </div>
        <input type="password" name="pwd" placeholder="Mot de passe"  autocomplete="off">
        <div class="text-danger">
            
            @error('pwd')
            {{ $message}}
       @enderror
        </div>
        <input type="password" name="cpwd" placeholder="Confirmez votre mot de passe"  autocomplete="off">
        <div class="text-danger">
            
        @error('cpwd')
            {{ $message}}
       @enderror
        </div>
       
       
        <select name="typemembre_id" id="statut">
            @foreach ($types as $type) 
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <div class="button">
            <button >S'inscrire</button>
        </div>
        @if(session('fail'))
        <div class="text-danger">
                  {{ session('fail') }}
        </div>
@endif


    </form>


</body>

</html>