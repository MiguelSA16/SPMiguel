<?php



namespace App\Http\Controllers\Incidencia;





use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Incidencias;

use App\Cliente;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade as PDF;





class IncidenciaController extends Controller

{



    public function index(Request $request){

        

       

        $prioridad = $request->get('prioridad');  

        $cliente = $request->get('cliente'); 

        $solucionado = $request->get('solucionado');      

                

        $user = Auth::user();

        

        if($user->role_id == 5){

            

            $incidencias = Incidencias::orderBy('id', 'DESC')

            ->Prioridad($prioridad)

            ->Cliente($cliente)

            ->Solucionado($solucionado)

            ->paginate(10);     



            $clientes = DB::table('incidencias')->select('cliente_id')->groupBy('cliente_id')->get();



            return view('front.operario.incidencias.index', compact('incidencias','clientes','solucionado'));

        }

        

    

        if($user->role_id == 3){

            $incidencias = Incidencias::where('cliente_id',$user->cliente_id)->paginate(10);

            return view('front.cliente.incidencias.index', compact('incidencias'));

        }       

    }

    public function create(){        



        $articulos = DB::table('articulos')

            ->where('baja','0')

            ->orderBy('codigo')

            ->get();

        

        $user = Auth::user();

        if($user->role_id == 3){

            

            return view('front.cliente.incidencias.crear',compact('articulos'));

        }

        if($user->role_id == 5){

            $clientes = Cliente::all();

            

            return view('front.operario.incidencias.crear',compact('articulos','clientes'));

        }       

    }

  

    public function store(Request $request){



        



        $user =  Auth::user();



        //return $user;

        $incidencia = new Incidencias();        



        //DATOS INCIDENCIAS

        //Datos articulo

        $incidencia->users_id = $user->id;

        $incidencia->referencia = $request->get('referencia');

        $incidencia->n_serie = $request->get('n_serie');

        $incidencia->n_unidades = $request->get('n_unidades');   

        $incidencia->realizado_por = 'pendiente';

        /*FECHA => siempre se creara el dia actual */    

        

        

        //Datos incidencia Cliente

        if( $request->get('cliente_id')){

            $incidencia->cliente_id = $request->get('cliente_id');

        }

        else{

            $incidencia->cliente_id = $user->cliente_id;

        }

        $incidencia->fallo = $request->get('fallo');

        $incidencia->tipo = $request->get('tipo');

        $incidencia->descripcion = $request->get('descripcion');       



        //Imagenes

        if($request->hasfile('imagen1')):

            $imagen         = $request->file('imagen1');

            $nombreimagen = $imagen->getClientOriginalName();  

            $imagen->move("images/incidencias",$nombreimagen);         

            $incidencia->imagen1  = $nombreimagen; // asignar el nombre para guardar

        endif;



        if($request->hasfile('imagen2')):

            $imagen2         = $request->file('imagen2');

            $nombreimagen = $imagen2->getClientOriginalName();

            $imagen2->move("images/incidencias",$nombreimagen);         

            $incidencia->imagen2  = $nombreimagen; // asignar el nombre para guardar

            

        endif;

        if($request->hasfile('imagen3')):

            $imagen3        = $request->file('imagen3');

            $nombreimagen = $imagen3->getClientOriginalName();

            $imagen3->move('images/incidencias',$nombreimagen);         

            $incidencia->imagen3  = $nombreimagen; // asignar el nombre para guardar

            

        endif;



        //Datos solucion operario

        $incidencia->fecha_aceptacion = $request->get('fecha_aceptacion');

        $incidencia->fecha_limite = $request->get('fecha_limite');

        $incidencia->prioridad = $request->get('prioridad');

        $incidencia->observaciones = $request->get('observaciones');

        

        //Acciones incidencias

        $incidencia->a_con = $request->get('a_con');

        $incidencia->f_acon = $request->get('f_acon');

        $incidencia->acon_ana = $request->get('acon_ana');

        $incidencia->a_con = $request->get('acon_com');



        $incidencia->a_con = $request->get('a_corr');

        $incidencia->f_acon = $request->get('f_acorr');

        $incidencia->acorr_ana = $request->get('acorr_ana');

        $incidencia->acorr_com = $request->get('acorr_com');

        $incidencia->save();



        //cliente_id

        if($user->role_id==3)

            return redirect('cliente/incidencias');

        if($user->role_id==5)

            return redirect('/operario/incidencias');



    }



    public function show($id){



        $articulos = DB::table('articulos')

                ->where('baja','0')

                ->orderBy('codigo')

                ->get();

        $incidencia = Incidencias::findOrFail($id);



        $user = Auth::user();

        if($user->role_id == 3){

            return view('front.cliente.incidencias.show',compact('incidencia','articulos'));

        }

        if($user->role_id == 5){

            return view('front.operario.incidencias.show',compact('incidencia','articulos'));

        }             

    }



    public function edit($id){        



        $incidencia = Incidencias::findOrFail($id);



        

            

        $clientes = DB::table('clientes')

                ->where('baja','0')

                ->orderBy('nombre')

                ->get();



        $articulos = DB::table('articulos')

            ->where('baja','0')

            ->orderBy('codigo')

            ->get();

            $user = Auth::user();



        if($user->role_id == 3 and $incidencia->prioridad != ''){

            return redirect('cliente/incidencias'); 

        }



        if($user->role_id == 3){

            return view('front.cliente.incidencias.editar',compact('incidencia','articulos','clientes')); 

        }

        if($user->role_id == 5){

            return view('front.operario.incidencias.editar',compact('incidencia','articulos','clientes')); 

        }                         

    }



    public function update(Request $request, $id){

         

       

            $incidencia = Incidencias::findOrFail($id);

    

            $entrada_update = $request->all();

    

            if($request->hasfile('imagen1')):    

                $imagen         = $request->file('imagen1');

                $nombreimagen = $imagen->getClientOriginalName();

                $imagen->move('images/incidencias',$nombreimagen);

                $entrada_update['imagen1'] = $nombreimagen;

            endif;



            if($request->hasfile('imagen2')):    

                $imagen         = $request->file('imagen2');

                $nombreimagen = $imagen->getClientOriginalName();

                $imagen->move('images/incidencias',$nombreimagen);

                $entrada_update['imagen2'] = $nombreimagen;

            endif;



            if($request->hasfile('imagen3')):    

                $imagen         = $request->file('imagen3');

                $nombreimagen = $imagen->getClientOriginalName();

                $imagen->move('images/incidencias',$nombreimagen);

                $entrada_update['imagen3'] = $nombreimagen;

            endif;



            $incidencia->update($entrada_update);



            $user = Auth::user();

            if($user->role_id == 3){

                return redirect('cliente/incidencias'); 

            }

            if($user->role_id == 5){

                return redirect('operario/incidencias'); 

            }     

    }



  

    public function descargar($id){



        $incidencia = Incidencias::findOrFail($id);

       
            

        return view('front.cliente.incidencias.descargar',compact('incidencia')); 

    }



    public function descargarPDF($id){

            

        $incidencia = Incidencias::findOrFail($id);

        

        $user = Auth::user();

        if($user->role_id == 3){

            $pdf = PDF::loadView('front.cliente.incidencias.descargar',compact('incidencia')); 

        }

        if($user->role_id == 5){

            $pdf = PDF::loadView('front.operario.incidencias.descargar',compact('incidencia'));

        }     

        

        return $pdf->download(nombreCliente($incidencia->cliente_id).'-'.$incidencia->created_at.'.pdf');

    }

    public function solucionar($id){

            

        $incidencia = Incidencias::findOrFail($id);



        

        

        return view('front.operario.incidencias.solucionar',compact('incidencia')); 

    } 

      

}

