<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnic-popup.min.css" rel="stylsheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Modification</title>
    <link rel="stylesheet" href="{{asset('assets/css/inscription.css')}}">
</head>

<body>


    <form action="{{route( 'modif_store',[
        'utilisateur'=>$utilisateur,
    ])}}" method="post">
        @csrf
         @if (session('pass'))
             <div class="text-danger">
                {{ session('pass') }}
             </div>
         @endif
        <h2> Modification</h2>
        <input type="text" name="f_name" placeholder="Nom"  autocomplete="off"  value="{{ $utilisateur->f_name}}">
        <input type="hidden" name="code" value="{{session('code')}}">
        
        @error('f_name')
        <div class="text-danger ">
                 {{ $message}}
                </div>
            @enderror
        <input type="text" name="l_name" placeholder="Prénom" autocomplete="off" value="{{ $utilisateur->l_name}}">
        
        @error('l_name')
        <div class="text-danger">
            {{ $message}}
        </div>
            @enderror
        <input type="mail" name="mail" placeholder="Email"  autocomplete="off" value="{{ $utilisateur->mail}}">
        
        @error('mail')
        <div class="text-danger">
            {{ $message}}
        </div>
       @enderror
        <input type="date" name="birth_date" autocomplete="off" value="{{ $utilisateur->birth_date}}">
        
        @error('birth_date')
        <div class="text-danger">
            {{ $message}}
        </div>
            @enderror
        <input type="text " name="birth_city" placeholder="Ville de naissance"  autocomplete="off" value="{{ $utilisateur->birth_city}}">
        
        @error('birth_city')
        <div class="text-danger">
            {{ $message}}
        </div>
       @enderror
        <input type="password" name="pwd" placeholder="Mot de passe"  autocomplete="off" >
        @error('pwd')
        <div class="text-danger">
            {{ $message}}
        </div>
       @enderror
        <input type="password" name="cpwd" placeholder="Confirmez votre mot de passe"  autocomplete="off" >
        @error('cpwd')
        <div class="text-danger">
            {{ $message}}
        </div>
       @enderror

       
        <select name="typemembre_id" id="statut" >
           

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