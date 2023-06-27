<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>
   
    <style>
        form {
            width: 50% !important;
            height: 200px;
        }
    </style>
    <div class="container mt-5">
        <h2 class="text-center"> {{ $typemembre->exists ? 'Modification de type ' : 'Ajout de type' }}</h2>
        <div class="row d-flex justify-content-center">
            <form action="{{ route($typemembre->exists ? 'admin.typemembre.update' : 'admin.typemembre.store',[
                'typemembre'=>$typemembre,
            ])}}" method="post" class="bg-info">
                @csrf
                @method($typemembre->exists ? 'put' : 'post')
                <div class="offset-2 col-8 mt-4 ">
                    <input type="text" name="name" id="" placeholder="Nom du type"  class="form-control @error('name') is-invalid @enderror" value="{{  $typemembre->exists ? $typemembre->name : '' }}">
                </div>
                @error('name')
                      <div class="invalid-feedback">
                           {{ $message }}
                      </div>
                @enderror
                <div class="offset-4">
                    <button  class='btn btn-success mt-5 mx-5 '>
                        @if ($typemembre->exists)
                        Modifier
                        @else 
                        Créer
                        @endif
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</body>

</html>