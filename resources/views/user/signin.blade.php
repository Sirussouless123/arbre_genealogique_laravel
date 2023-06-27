<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnic-popup.min.css" rel="stylsheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{asset('assets/css/inscription.css')}}">
</head>

<body>

    <form action="" method="post">
        @csrf
       
        <h2>Connexion</h2>
        @if (session('pass'))
        <div class="text-danger">
           {{ session('pass')}}
        </div>
        @endif
        <input type="text" name="mail" placeholder="Email" >
         @error('mail')
              <div class="text-danger">
                    {{ $message }}
              </div>
         @enderror
        <input type="password" name="pwd" placeholder="Mot de passe">
        @error('pwd')
        <div class="text-danger">
              {{ $message }}
        </div>
   @enderror
        <div class="button">
            <button type="submit">Connexion</button>
        </div>

    </form>
    <div class="inscri">
        <h5>Vous n'êtes pas inscrit ?</h5>
        <a href="{{ route('new')}}">Inscrivez vous</a> </li>
    </div>
</body>

</html>