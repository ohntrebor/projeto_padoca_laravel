<?php

namespace App\Http\Controllers;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('email', $_SESSION['email'])->get();

        $pedidos = Pedido::all();
        return view('privado.adm',['titulo' => 'Adm', 'pedidos' => $pedidos, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }


    public function fazerPedido(Request $request)
    {
        $regras =[
            'user_email' => 'email|required|max:60',
            'apelido' => 'required|max:50',
            'cep' => 'required|max:50',
            'endereco' => 'required|max:50',
            'complemento' => 'required|max:50',
            'bairro' => 'required|max:50',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:40',
            'produtos' => 'required|max:70',
            'subtotal' => 'required|max:30',
            'total' => 'required|max:30',
            'frete' => 'required|max:30',
            'cupom' => 'required|max:30',
            'obs' => 'required|max:40',
            'status' => 'max:1',
            'pagamento' => 'required'

        ];

        $feedback = [

            'pagamento.required' => 'Selecione a forma de pagamento para seguir com a compra!',
            'obs.required' => 'Por favor, informe alguma observação!',
            'obs.max' => 'Limite de 40 caracteres para observações!',

        ];

        $request->validate($regras, $feedback);


            Pedido::create($request->all());

            Carrinho::where('user_email', $request->user_email)->delete();

            return redirect()->route('carrinho.index');



    }

    public function attStatusPedidos(Request $request, $id)
    {

        Pedido::where('id', $request->id)->update(['status' => $request->status]);

        // Carrinho::findOrFail($id)->delete();
        if($request->status == 2){
            return Redirect::back()->with('msg',"Pedido #000$request->id recebido!");
        }

        if($request->status == 3){
            return Redirect::back()->with('msg',"Pedido #000$request->id Enviado para Entrega!");
        }

        if($request->status == 4){
            return Redirect::back();
        }


    }


}
