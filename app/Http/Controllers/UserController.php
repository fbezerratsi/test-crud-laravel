<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
//use App\Http\Controllers\View

class UserController extends Controller
{

    private $objUser;

    public function __construct()
    {
        $this->objUser = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->objUser->paginate(5);
        return view('index', ["users" => $user]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->validate($request, [
            'cpf' => 'required|cpf'
        ]);
        $cad = $this->objUser->create([
            'nome'=> $request->nome,
            'cpf'=> $request->cpf,
            'data_nascimento'=> $request->data_nascimento,
            'sexo'=> $request->sexo,
            'altura'=> $request->altura,
        ]);
        if ($cad) {
            return redirect('users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->objUser->find($id);
        return view('show', ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->objUser->find($id);

        return view('create', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->validate($request, [
            'cpf' => 'required|cpf'
        ]);
        $this->objUser->where(['id'=>$id])->update([
            'nome'=> $request->nome,
            'cpf'=> $request->cpf,
            'data_nascimento'=> $request->data_nascimento,
            'sexo'=> $request->sexo,
            'altura'=> $request->altura,
        ]);
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objUser->destroy($id);
        return($del) ? "Sim" : "Não";
    }
}
