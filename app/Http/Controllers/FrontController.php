<?php
namespace App\Http\Controllers;
use App\Albaranl;
use Illuminate\Http\Request;
use App\Http\Resources\Articulo as AppArticulo;
use App\Articulo;
use App\Familia;
use App\Newsletter;
use App\Mail\NeswletterMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use  Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index(){
        $ofertas = Articulo::selectRaw('* , count("codigo") as art')
            ->where('oferta','SI')
            ->groupBy('grupo')
            ->get();    
            
        $familias = Familia::where('claparent','0')
            ->where('baja_web','FALSO')
            ->orderBy('orden')
            ->get();      

        //return $familias;
        return 
            view('front.index', 
            compact('ofertas','familias'));
    }
    
    public function get_categorias($url_familia){

        //Familia_actual  se usa para el camino de migas y con su Metodo Categoria me devuelve todas sus scategorias. 
        $familia_actual = Familia::where('slug',$url_familia)->first();    
        $ofertas = Articulo::selectRaw('* , count("codigo") as art')
            ->where('oferta','SI')
            ->groupBy('grupo')
            ->get();
        return 
            view('front.familias.categorias',
            compact('familia_actual','ofertas'));        
    }

    public function get_articulos(Request $request, $url_familia){   
        $familia_actual = Familia::where('slug',$url_familia)->first();  
        $articulos = Articulo::selectRaw('* , count("codigo") as art')
            ->color($request->c)
            ->longitud($request->l)
            ->where('familia_id',$familia_actual->id)
            ->where('baja','0')
            ->where('grupo','!=','-')
            ->groupBy('grupo')
            ->paginate(9);  

        $familias = Familia::where("claparent","0")
            ->where('baja_web','FALSO')
            ->get(); 

        $colores = Articulo::where('familia_id',$familia_actual->id)
            ->where('color','!=',null)
            ->where('baja','0')
            ->groupBy('color')
            ->get();      

        $longitudes = Articulo::where('familia_id',$familia_actual->id)
            ->where('longitud','!=',null)
            ->where('baja','0')
            ->groupBy('longitud')
            ->get();   
        
        return 
            view('front.articulos.listar',
            compact('articulos','familia_actual','familias','colores','longitudes'));        
    }

    public function nuestros_productos(){
        $familias = Familia::where("claparent","0")
            ->where('baja_web','FALSO')
            ->orderBy('orden')
            ->get();

        $ofertas = Articulo::selectRaw('* , count("codigo") as art')
            ->where('oferta','SI')
            ->groupBy('grupo')
            ->get();

        return 
            view('front.familias.index',
            compact('familias','ofertas'));
    }

    public function ver_articulo($url_articulo){
        $articulo = new AppArticulo(Articulo::where("slug",$url_articulo)->first());        
        $imagenes = $articulo->imagenes;      
        $longitudes =  Articulo::where("grupo", $articulo->grupo)
            ->where("familia_id", $articulo->familia_id)
            ->where('longitud', '!=', null)
            ->where('baja',0)
            ->groupBy('longitud')
            ->get();     

        $familia_actual = $articulo->familia;   
        $ofertas = Articulo::selectRaw('* , count("codigo") as art')
            ->where('oferta','SI')
            ->groupBy('grupo')
            ->get();         

        $porciones = explode(".", $articulo->grupo);
        $buscar_color = $porciones[0].'.'.$porciones[1].'.L.';

        $anchos = Articulo::where("longitud",$articulo->longitud)
            ->where("familia_id", $articulo->familia_id)
            ->where('ancho', '!=', null)
            ->groupBy('ancho')
            ->get(); 

        $colores = Articulo::selectRaw('* , count("codigo") as t_color')
            ->where("grupo","LIKE", $buscar_color.'%')
            ->where("familia_id", $articulo->familia_id)
            ->where('color', '!=', null)
            ->where('baja',0)
            ->groupBy('grupo')
            ->get();
            
        $id= $articulo->id;
        $art_relacionados = Albaranl::join('articulos', 'articulos.id', '=', 'albaranl.claart')
            ->select('articulos.imagen', 'articulos.nombre','articulos.slug','articulos.familia_id','articulos.grupo','albaranl.claart')
            ->selectRaw('count("albaranl.claart") as t_claart')
            ->whereIn('albaranl.claalb', function($query) use ($id){            
                    $query->select('claalb')
                    ->from('albaranl')
                    ->where('claart', $id);
                })
                ->where('claart','!=', $id)
                ->where('familia_id','!=','80315')
                ->where('baja',0)
                ->groupBy('articulos.grupo')
                ->orderBy('t_claart','desc')
                ->get();            

        $fecha_actual = Carbon::now()->format('Y-m-d');  
        $fecha_inicio = Carbon::now()->subMonths(12)->format('Y-m-d');

        $consumo = DB::table('movalm')
        ->select('claart',
            DB::raw('ABS(SUM(cantidad)) as cons_12_mes'),
            DB::raw('ABS(round(SUM(cantidad)/12)) as cons_med_mes'),
            DB::raw('ABS((round(SUM(cantidad)/12)*6)) as avisar'),
            DB::raw('ABS((round(SUM(cantidad)/12)*5)) as pedir')
        )

        ->where('fecha', '<=', $fecha_actual)
        ->where('fecha', '>=', $fecha_inicio)
        ->where('cantidad','<',0)
        ->where('claart', $id)
        ->groupBy('claart')
        ->get();

        return 
            view('front.articulos.ver',
            compact('imagenes','articulo','art_relacionados','familia_actual','ofertas','longitudes','colores','anchos','consumo'));
    }

    public function cambio(){
        $articulos=Articulo::all();
        return 
            view('front.articulos.cambio', 
            compact('articulos'));
    }

    public function buscar(Request $request){
        $familias = Familia::where("claparent","0")
            ->where('baja_web','FALSO')
            ->orderBy('orden')
            ->get();    

        $cad_buscada =$request->get('q'); 

        if($cad_buscada == ""){
            $error = "No se envío ningun dato a buscar";
            return 
                view('front.search.index',
                compact('error','cad_buscada','familias'));
        }

        $articulos = Articulo::selectRaw('* , count("codigo") as art')
            ->where('baja','0')  
            ->buscarnombre($request->q)
            ->buscarcodigo($request->q)     
            ->groupBy('grupo')      
            ->paginate(9);  

        return 
            view('front.search.index', 
            compact('articulos','cad_buscada','familias'));        
    }

    //SUSCRIPCION
     public function newsletter(Request $request){      
        $message = request()->validate([
            'email'     => 'required|email',
            'checkbox'  => 'required'
        ],[
            'email.required'    => 'Debes escribir un correo electronico valido',
            'checkbox.required' => 'Debes aceptar el tratamiento de los datos acorde a la política de privacidad.'
        ]);
       
        $clave = '6Ld84mQfAAAAADIADLSHBMigtGECan84r8JXwjCT';
	
        $token = $request['token'];
        $action = $request['action'];
        
        $cu = curl_init();
        curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($cu, CURLOPT_POST, 1);
        curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $clave, 'response' => $token)));
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cu);
        curl_close($cu);
        
        $datos = json_decode($response, true);

        if($datos['success'] == 1 && $datos['score'] >= 0.5){
            if($action == 'validarNewsleter'){
                if(Newsletter::where('email',$request->email)->first()){
                    flash('Ups, ya estabas suscrito a nuestra Newsletter')->error()->important();
                }else{            
                    $newsletter_new = new Newsletter;       
                    $newsletter_new->email = $request->email;      
                    $newsletter_new->confirmado = 'FALSO';       
                    $newsletter_new->save();       
                    Mail::to($request->email)->send(new NeswletterMail($request));          
                    flash('Gracias por suscribirte, en breve recibirá un correo para confirmar tu suscripción ')->success();      
                }        
            } 
        }	
        
        return redirect('/');
    }

    public function confirmar_newletter($email){     
        //$newsletter = Newsletter::where('email',$email)->first();
        if($newsletter = Newsletter::where('email',$email)->first()){
            if($newsletter->confirmado == 'VERDADERO'){     
                flash('Gracias, pero ya habías confirmado tu suscripción ')->warning();
            }else{
                $newsletter->confirmado = 'VERDADERO';
                $newsletter->update();
                flash('Gracias, por confirmar tu suscripción ')->success();
            }
        }else{
            flash('No estas suscrito a nuestra Newsletter, no es posible la confirmación')->error()->important();
        }
        return redirect('/');     
    }


    //CONTACTANOS
    public function contactanos(Request $request){
        $message = request()->validate([
            'nombre'    => 'required',
            'email'     => 'required|email',
            'subject'   => 'required',
            'content'   => 'required|min:3',
            'checkbox'  => 'required'
        ],[
            'nombre.required'   => 'Escribe tu nombre',
            'email.required'    => 'Pon tu Correo Electrónico',
            'subject.required'  => 'Ingresa tú numero de telefono.',
            'content.required'  => 'Escribe un comentario',
            'checkbox.required' => 'Debes aceptar el tratamiento de los datos acorde a la política de privacidad.'
        ]); 

        $clave = '6Ld84mQfAAAAADIADLSHBMigtGECan84r8JXwjCT';

        $token = $request['token'];
        $action = $request['action'];       
               
        $cu = curl_init();
        curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($cu, CURLOPT_POST, 1);
        curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' =>  $clave, 'response' => $token)));
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cu);
        curl_close($cu);
        
        $datos = json_decode($response, true);

        if($datos['success'] == 1 && $datos['score'] >= 0.5){
            if($action == 'validarContactanos'){
                //enviar Email
                Mail::to('daniel@sunprored.es')->queue(new MessageReceived($message));

                //retornar a la misma pagina con mensaje flash
                flash('Tu mensaje, se ha enviado correctamente. ')->success();
            } 
        }	    
        return redirect('/contactanos');    
    }

    public function ofertas(){
        $familias = Familia::where("claparent","0")->where('baja_web','FALSO')->orderBy('orden')->get(); 
        $articulos = Articulo::selectRaw('* , count("codigo") as art')
        ->where('oferta', '=', 'SI')
        ->groupBy('grupo')
        ->paginate(9);  
        return 
            view('front.articulos.ofertas',
            compact('articulos','familias'));
    }
}