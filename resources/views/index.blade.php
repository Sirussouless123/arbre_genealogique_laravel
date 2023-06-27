<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{asset('assets/css/accueil.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
</head>
<body>
    
    
    <div class="nav">
        <nav class="navbar">
            <a href="/" class="logo">Logo</a>
                <div class="nav-links">
                     <ul>
                            <li class="active"> <a href="/">Accueil</a> </li>
                            <li > <a href="{{route('signin')}}">Connexion</a> </li>
                            <li > <a href="{{route('new')}}">Inscription</a> </li>
                           
                     </ul>
        
            
                </div>
            <ion-icon name="menu"  class="menu-hamburger"></ion-icon>
        </nav>
        <div class="page">
            <div class="infos">
                <h2>Renseignement familial</h2>
                <p>Plus besoin d'écrire de long message avant d'informer tel ou tel proche des membres de votre famille. Faites le une fois et vous n'aurez qu'à faire la capture pour vos proches.</p>
            </div>
            <img src="{{asset('assets/images/Family-amico.svg ')}}" class="img">
        </div>
    </div>
       
   

<script src="{{asset('assets/js/accueil.js ')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>