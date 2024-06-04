<?php


namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    public function index(){
        $rendez_vous = RendezVous::all();
        return view('index',['rendez_vous' => $rendez_vous]);
    }
    public function create(){
        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('create',compact('patients','medecins'));
    }
    public function enregistrer(Request $request){
        $data = $request->validate([
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
        ]);
        $patient = Patient::find($request['patient_id']);
        $medecin = Medecin::find($request['medecin_id']);
        $rendez_vous = new RendezVous;
        $rendez_vous->date  = $data['date'];
        $rendez_vous->heure = $data['heure'];
        $rendez_vous->patient()->associate($patient);
        $rendez_vous->medecin()->associate($medecin);
        $rendez_vous->save();
        return redirect('/rendez-vous');
    }
    public function destroy($id){
        $rendez_vous = RendezVous::find($id);
        $rendez_vous->delete();
        return redirect('/rendez-vous');
    }
}
