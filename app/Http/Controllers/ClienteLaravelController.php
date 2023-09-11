<?php

namespace App\Http\Controllers;

use App\Models\ClienteLaravel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;



class ClienteLaravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $clients = ClienteLaravel::all();//para traer toodo lo que este en la tabla
        $clients = ClienteLaravel::paginate(5);// paginar...numero de filas antes de crear una pagina
        return view('client.index')
            ->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15',
            'due' => 'required|gte:1',
        ]);

        // $request->validate([
        //     'campo' => 'required',
        // ]);

        $client = ClienteLaravel::create($request->only('name','due','comments'));

       Session::flash('mensaje','Registro Creado');


       return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClienteLaravel  $clienteLaravel
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteLaravel $clienteLaravel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClienteLaravel  $clienteLaravel
     * @return \Illuminate\Http\Response
     */

    // funca
    public function edit($id)
    {    
        return view('client.form', ['client' => ClienteLaravel::findOrFail($id)]);
    }


    // edit original
    // public function edit(ClienteLaravel $clienteLaravel){

    //     //original
    //    // return view('client.form')->with('client', $clienteLaravel);
        
    //   // $Client = findOrFail($clienteLaravel);
    //     // return view('client.form',['client'=> ClienteLaravel::findOrFail($clienteLaravel)]);
    //     return view('client.form', ['client' => $clienteLaravel]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClienteLaravel  $clienteLaravel
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, ClienteLaravel $clienteLaravel)
    public function update(Request $request, $id)
    {
        // dd($clienteLaravel);

        $request->validate([
            'name' => 'required|max:20',
            'due' => 'required|gte:1',
        ]);

        // $clienteLaravel->name=$request['name'];
        // $clienteLaravel->due=$request['due'];
        // $clienteLaravel->comments=$request['comments'];
        
        // $clienteLaravel->save();
        $client = ClienteLaravel::findOrFail($id);
        $client->name = $request->input('name');
        $client->due = $request->input('due');
        $client->comments = $request->input('comments');
        $client->save();



       Session::flash('mensaje','Registro Editado');


       return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClienteLaravel  $clienteLaravel
     * @return \Illuminate\Http\Response
     */
    // public function destroy(ClienteLaravel $clienteLaravel)
    public function destroy($id)
    {
        $client = ClienteLaravel::findOrFail($id);
        $client->delete();
        Session::flash('mensaje','Registro Eliminado');


        return redirect()->route('client.index');
    }
}
