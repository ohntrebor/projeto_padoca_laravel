<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RequestStack;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        $carrinho = Carrinho::where('user_email', $_SESSION['email'])->get();
        $user = User::where('email', $_SESSION['email'])->get();


        $carrinho_de_compra = Produto::all();





        return view('privado.carrinho', ['titulo' => 'Carrinho de Compras', 'carrinho_de_compra' => $carrinho_de_compra, 'carrinho' => $carrinho, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    public function addToCart(Request $request, Redirect $redirect)
    {
        // dd($request->all());
        Carrinho::create($request->all());
        // return redirect('/produtos');
        return Redirect::back()->with('msg','Produto Adicionado no Carrinho com sucesso!');
        // return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function show(Carrinho $carrinho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrinho $carrinho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function AddCupom(Request $request)
    {

        $regras = [
            'cupom' => 'integer',
        ];

        $feedback = [
            'cupom.integer' => 'Apenas valores',
        ];

        $request->validate($regras,$feedback);

        Carrinho::where('id', $request->id)->update(['cupom' => $request->cupom]);

        return redirect('/carrinho')->with('Produto removido do carrinho com sucesso');

    }


    public function limparCarrinho(Request $request,$email)
    {

        Carrinho::where('user_email', $email)->delete();

        return redirect('/carrinho')->with('Produto removido do carrinho com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Carrinho::findOrFail($id)->delete();

        return redirect('carrinho')->with('Produto removido do carrinho com sucesso');
        // dd($carrinho);
    }
}
