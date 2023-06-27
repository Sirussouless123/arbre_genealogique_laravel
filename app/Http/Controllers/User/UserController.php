<?php

namespace App\Http\Controllers\User;

use App\Models\Typemembre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Models\Utilisateur;

function generateCode()
{
    $var = mt_rand(0, 100) . mt_rand(0, 500) . mt_rand(0, 1000);
    return $var;
}

class UserController extends Controller
{
    public function show()
    {
        $types = DB::table('typemembres')
            ->where('name', 'Père')
            ->orWhere('name', 'Mère')
            ->get();

        return view('user.signup', [
            'types' => $types,
        ]);
    }

    public function signup(SignupRequest $request)
    {


        $data = $request->validated();

        if ($data['pwd'] == $data['cpwd']) {
            $code = generateCode();
            $exist = DB::table('utilisateurs')->where('code', $code)->get();
            if (!empty($exist)) {
                $code = generateCode();
            };
            $user = Utilisateur::create([
                'f_name' => $data['f_name'],
                'l_name' => $data['l_name'],
                'mail' => $data['mail'],
                'birth_date' => $data['birth_date'],
                'birth_city' => $data['birth_city'],
                'pwd' => password_hash($data['pwd'], PASSWORD_BCRYPT),
                'typemembre_id' => $data['typemembre_id'],
                'code' => $code,
            ]);
            if ($user == true){

                return to_route('signin');
            }
        } else {
            return to_route('new')->with('fail', 'Les mots de passe ne correspondent pas');
        }
       
    }
   

    public function login()
    {
        return view('user.signin');
    }

    public function doLogin(SigninRequest $request)
    {
        $data = $request->validated();

        $req1 = DB::table('utilisateurs')->where('mail', $data['mail'])->first();
        $req2 = DB::table('admins')->where('login', $data['mail'])->where('pwd', $data['pwd'])->first();

    
        if (!empty($req1)) {

            if (password_verify($data['pwd'], $req1->pwd)) {
                session([
                    'code' => $req1->code,
                    'idUt' => $req1->id,
                    'idTm' => $req1->typemembre_id,

                ]);
                $req3 = DB::table('typemembres')->where('id', session('idTm'))->first();
                session([
                    'name' =>  $req3->name,
                ]);
                return to_route('membre');
            } else {
                return to_route('signin')->with('pass', 'Mot de passe erroné');
            }
        } else if (!empty($req2)) {
            session([
                'idAd' => $req2->id,
            ]);
            return to_route('admin.typemembre.index');
        } else {
            return to_route('signin')->with('pass', 'Identifiant erroné');
        }
    }

    public function showMembre()
    {


        if (session()->has('idUt')) {
            $pere = DB::table('typemembres')->where('name', 'Père')->first();
           
            $mere = DB::table('typemembres')->where('name', 'Mère')->first();
            $users = DB::table('utilisateurs')->join('typemembres', 'utilisateurs.typemembre_id', '=', 'typemembres.id')->where('code','=',session('code'))->select('utilisateurs.*','typemembres.name')->get();
      
            return view('user.membre', [
                'users' => $users,
                'pere' => $pere->id,
                'mere' => $mere->id,
            ]);
        } else {
            return to_route('signin');
        }
    }

    public function addUser()
    {
        if (session()->has('idUt')) {


            if (session('name') == "Père") {

                $list = DB::table('typemembres')->where('name', '!=', 'Père')->get();

                return view('user.recensement', [
                    'types' => $list,
                ]);
            } elseif (session('name') == 'Mère') {
                $list = DB::table('typemembres')->where('name', '!=', 'Mère')->get();
                return view('user.recensement', [
                    'types' => $list,
                ]);
            } else {
                $list = DB::table('typemembres')->where('name', '!=', 'Père')->orWhere('name', '!=', 'Mère')->get();
                return view('user.recensement', [
                    'types' => $list,
                ]);
            }
        } else {
            return to_route('signin');
        }
    }

    public function insertUser(SignupRequest $request)
    {

        if (session()->has('idUt')) {

            $data = $request->validated();

            if ($data['pwd'] == $data['cpwd']) {
               $user = Utilisateur::create([
                    'f_name' => $data['f_name'],
                    'l_name' => $data['l_name'],
                    'mail' => $data['mail'],
                    'birth_date' => $data['birth_date'],
                    'birth_city' => $data['birth_city'],
                    'pwd' => password_hash($data['pwd'], PASSWORD_BCRYPT),
                    'typemembre_id' => $data['typemembre_id'],
                    'code' => session('code'),
                ]);
                if ($user == true){

                    return to_route('membre');
                }
            } else {
                return to_route('recensement')->with('fail', 'Mot de passe erroné');
            }
        } else {
            return to_route('signin');
        }
    }
    public function modifMem(Utilisateur $utilisateur)
    {
     
        if (session()->has('idUt')) {
            $list = DB::table('typemembres')->get();
            return view('user.form', [
                'utilisateur' => $utilisateur,
                'types' => $list,
            ]);
        } else {
            return to_route('signin');
        }
    }
    public function validModif(Utilisateur $utilisateur,SignupRequest $request)
    {
        if (session()->has('idUt')) {
          $user= new Utilisateur;
            $data = $request->validated();
          
           
            if ($data['pwd'] == $data['cpwd']) {
                $data['pwd']= password_hash($data['pwd'],PASSWORD_BCRYPT);
                $user = $utilisateur->update($data);
                if ($user == true){

                    return to_route('membre');
                }
            }else{
                return to_route('modifmembre',[
                    'utilisateur'=>$utilisateur,
                ])->with('pass','Vos mots de passe ne correspondent pas ');
            }
        } else {
            return to_route('signin');
        }
    }

    public function logout(){
       
       session()->forget('idUt');
       return to_route('signin');
          
       
    }
}
