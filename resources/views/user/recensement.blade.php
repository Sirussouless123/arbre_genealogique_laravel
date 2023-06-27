<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnic-popup.min.css" rel="stylsheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Recensement</title>
    <link rel="stylesheet" href="{{asset('assets/css/inscription.css')}}">
</head>

<body>


    <form action="{{route('recensement_store')}}" method="post">
        @csrf
       
        <h2> Recensement</h2>
        @if (session('fail'))
            <div class="text-danger">
                {{ $message }}
            </div>
        @endif
        <input type="text" name="f_name" placeholder="Nom"  autocomplete="off" >
        
        @error('f_name')
        <div class="text-danger ">
                 {{ $message}}
                </div>
            @enderror
        <input type="text" name="l_name" placeholder="Prénom" autocomplete="off" ">
        
        @error('l_name')
        <div class="text-danger">
            {{ $message}}
        </div>
       @enderror
        <input type="mail" name="mail" placeholder="Email"  autocomplete="off" ">
        
        @error('mail')
        <div class="text-danger">
        {{ $message}}
    </div>
       @enderror
        <input type="date" name="birth_date" autocomplete="off" ">
        
        @error('birth_date')
        <div class="text-danger">
            {{ $message}}
        </div>
       @enderror
        <input type="text " name="birth_city" placeholder="Ville de naissance"  autocomplete="off" >
        
        @error('birth_city')
        <div class="text-danger">
            {{ $message}}
        </div>
       @enderror
        <input type="password" name="pwd" placeholder="Mot de passe"  autocomplete="off" >
        <input type="password" name="cpwd" placeholder="Confirmez votre mot de passe"  autocomplete="off" >

       
        <select name="typemembre_id" id="statut">
           

            @foreach ($types as $type) 
           
                <option value="{{ $type->id}}">{{ $type->name}}</option>
         
            @endforeach
        </select>
        <div class="button">
            <button type="submit" >Valider</button>
        </div>



    </form>


</body>

</html>