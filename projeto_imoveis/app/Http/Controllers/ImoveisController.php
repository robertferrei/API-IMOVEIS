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
    //criação
    public function store(Request $request){
        $messages = [
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.digits' => 'O CPF deve ter exatamente 11 dígitos.',
            'creci.required' => 'O campo CRECI é obrigatório.',
            'creci.min' => 'O CRECI deve ter no mínimo 3 caracteres.',
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.min' => 'O Nome deve ter no mínimo 3 caracteres.',
        ];


        $validated = $request->validate([
            'cpf' => ['required', 'digits:11'], // CPF com exatamente 11 dígitos
            'creci' => ['required', 'min:3'], // CRECI com no mínimo 3 caracteres
            'nome' => 'required|min:3' // Nome com no mínimo 3 caracteres
        ],$messages);
        
        Imoveis::create($validated);
        $imoveis = Imoveis::all();

        session()->flash('success', 'Corretor cadastrado com sucesso!');                
         return view('index', ['imoveis' => $imoveis]);
         
    }
    //edição
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
      $data = $request->validate([
        'nome' => 'required|min:3',
        'creci' => 'required|min:3',
        'cpf' => 'required|digits:11',
    ]);

    Imoveis::where('id', $id)->update($data);
    return redirect()->route('imoveis-index')->with('success', 'Corretor atualizado com sucesso!');
    }
    
    //delete
    public function destroy($id){
        Imoveis::where('id', $id)->delete();
        return redirect()->route('imoveis-index');
    }

    
}
