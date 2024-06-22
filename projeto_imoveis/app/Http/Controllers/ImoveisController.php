<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{
    public function index(){
        $imoveis = Imoveis::query()->orderby('nome')->get();
        return view('index',['imoveis'=> $imoveis]);
        dd($imoveis);
    }
    
}
