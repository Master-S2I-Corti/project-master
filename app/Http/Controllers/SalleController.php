<?php
namespace App\Http\Controllers;
use App\Salle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class SalleController extends Controller
{


    public function liste() {
        $affich=Salle::all();
        return view('salles')->with(compact('affich','affich'));
    }

    public function index() {
        $listes=Salle::all();



        if(Auth::user()->admin)
            {   

                $admin=1;
            }
       else
           {

                $admin=0;
           }

        return view('salleAdmin')->with(compact('admin','listes'));
    }


    public function gestion() {

        return view("salleGestion");
    }

    public function add() {
        return view("salleAjout");
    }

    

    public function store(Request $request)
    {
             
       
        $salle= new Salle();
        $salle->num_salle= $request['num'];
        $salle->location= $request['location'];
        $salle->capacite= $request['capacite'];
        $salle->nbmachine= $request['nbmachine'];
        $salle->type= $request['type'];
        $salle->logiciel= $request['logiciel'];
        //$salle->save();
        // var_dump($request['logiciel[]']);
        // DIE();

        $data = DB::table('Salle')->where('num_salle', $request['num'])->get(); // récupère toutes les données de la table salle 


        if(isset($data[0]->id_salle) && isset($data[0]->num_salle)) //teste si l'id et le num de la salle existent déjà
        {
            $upd=DB::update('UPDATE Salle SET location="'.$request['location'].'" ,capacite="'.$request['capacite'].'",nbmachine="'.$request['nbmachine'].'",type="'.$request['type'].'",logiciel="'.$request['logiciel'].'" WHERE num_salle='.$request['num'].'');
        }else 
        {
            
                $salle->save();
            
        }
        

        return redirect('/gestion/salles');

    }


public function edit($id)
    {
        $data = DB::table('Salle')->where('id_salle', $id)->get();

       return view("salleAjout")->with('data',$data);
    }

public function delete($id)
    {   
       Salle::where('id_salle', '=', $id)->delete();
       return redirect('/gestion/salles');
    }


public function groupStore(Request $request)
    {

      
      $de=$request['de'];
      $a=$request['a'];
      While($de<=$a)
      {
        $sal= new Salle();
        $sal->num_salle= $de;
        $sal->location= $request['location'];
        $sal->capacite= $request['capacite'];
        $sal->nbmachine= $request['nbmachine'];
        $sal->type= $request['type'];
        $sal->logiciel= $request['logiciel'];

         $sal->save();


        $de++;
    }

return redirect('/gestion/salles');
}

public function search(Request $request)
{
    $array_request=$request->all();

    $search= $array_request['search'];

    echo $search;

    $data=DB::select("SELECT * FROM Salle  WHERE num_salle LIKE '%$search%'");
    foreach ($data as $row) {
        echo '<tr>
                 
                <td>'.$row->num_salle.'</td>
                <td>'.$row->location.'</td>
                <td>'.$row->capacite.'</td>
                <td>'.$row->nbmachine.'</td>
                <td>'.$row->type.'</td>
                 <td>'.$row->logiciel.'</td>
                <td><a href="';  echo url("/gestion/salles/edt/{$row->id_salle}"); echo '"><i class="fa fa-lg fa-pencil-square-o" style="color:black;"></i></a></td>
                <td><a href="';  echo url("/gestion/salles/del/{$row->id_salle}"); echo '"><i class="fa fa-lg fa-trash-o" style="color:red;"></i></a></td>
              </tr>';
    }
   

}

public function searchEns(Request $request)
{
    $array_request=$request->all();

    $searched= $array_request['searched'];

    echo $searched;

    $data=DB::select("SELECT * FROM Salle  WHERE num_salle LIKE '%$searched%'");
    foreach ($data as $row) {
        echo '<tr>
                 
                <td>'.$row->num_salle.'</td>
                <td>'.$row->location.'</td>
                <td>'.$row->capacite.'</td>
                <td>'.$row->nbmachine.'</td>
                <td>'.$row->type.'</td>
                <td>'.$row->logiciel.'</td>
              </tr>';
    }
   

}
}