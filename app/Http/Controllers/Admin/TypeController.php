<?php

namespace App\Http\Controllers\Admin;

use App\Models\Typemembre;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->has('idAd')){

            return view('admin.type.index',[
                'typemembres'=> Typemembre::paginate(10),
            ]);
        }else{
            return to_route('signin');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session()->has('idAd')){

            return view('admin.type.form',[
                'typemembre'=>new Typemembre,
            ]);
        }else{
            return to_route('signin');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        if (session()->has('idAd')){

            $type = Typemembre::create($request->validated());
            if ($type == true){
   
                return to_route('admin.typemembre.index')->with('success','Le type a été crée');
            }
        }else{
            return to_route('signin');
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Typemembre $typemembre)
    {
        if (session()->has('idAd')){

            return view('admin.type.form',[
                'typemembre'=>$typemembre,
            ]);
        }else{
            return to_route('signin');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, Typemembre $typemembre)
    {
        if (session()->has('idAd')){

            $membre = $typemembre->update($request->validated());
            if ($membre == true){
    
                return to_route('admin.typemembre.index')->with('success','Le type a été modifié');
            }
        }else{
            return to_route('signin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Typemembre $typemembre)
    {
        if (session()->has('idAd')){

            $typemembre->delete();
            return to_route('admin.typemembre.index')->with('success','Le type a été supprimé');
        }else{
            return to_route('signin');
        }
    }

    public function logout(){
        session()->forget('idAd');
        return to_route('signin');
       
    }
}
