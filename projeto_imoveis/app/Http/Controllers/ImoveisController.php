<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ImoveisController extends Controller
{
    public function index(){
        //$imoveis = Imoveis::query()->orderby('nome')->get();
        $imoveis  =Imoveis::all();
        return view('index',['imoveis'=> $imoveis]);
        dd($imoveis);
    }
    public function store(Request $request){
         Imoveis::create($request->all());                
         $imoveis  =Imoveis::all();        
         return view('index', ['imoveis' => $imoveis]);
    }
    public function edit($id){
        $imoveis = Imoveis::where('id',$id)->first();
        if(!empty($imoveis)){
            return view('edit',['imoveis'=>$imoveis]);
            
        }
        else{
            return redirect()->route('imoveis-index');
        }
    }
    public function update(Request $request, $id){
        $data=[
            'nome'=>$request->nome,
            'creci'=>$request->creci,
            'cpf'=>$request -> cpf
        ];

        Imoveis::where('id',$id)->update($data);
        return redirect()->route('imoveis-index');
        
    }

    
}
