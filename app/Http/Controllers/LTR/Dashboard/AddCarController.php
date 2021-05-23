<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Particular;
use App\Models\User;
use Auth, Validator;

class AddCarController extends Controller
{
    public function show(Request $request)
    {   
        // dd(Auth::user()->canAddCar(), Auth::user()->cars->where('visible', '=', 1)->count(), Auth::user()->cars->count()); 
        return view('LTR.dashboard.add_car');
    }

    public function admin_show(Request $request, $slug)
    {   
        $garage = User::find($slug);
        $context = [
            'garage' => $garage,
        ];
        return view('LTR.dashboard.add_car', $context);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // adding car with token
        if ($request->exists('token_form')) {

            // validation rules
            $validator = Validator::make($request->all(), [
                'car_token' => [
                    'required'
                ],
            ]);

            // check if the validation fails
            if ($validator->fails()) {
                return response()->json($validator->messages());
            }

            // if validated
            $car = Car::where('token' ,'=', $request->car_token)->first();
            // check if there is a car with the submitted token
            if ($car) {
                $response = array();
                
                if ($car->user_id) { // check if the car has already a user
                    $response = ['error'=> 'Vous ne pouvez pas ajouter cette voiture!'];
                } else {
                    $particular_owner = Particular::where('id', '=', $car->particular_id)->first();
                    $particular_owner->car_id = null;
                    $particular_owner->save();
                    $car->particular_id = null; // removing relationship with particular
                    $car->user_id = $user->id; //assigning to user
                    $car->created_at = now(); // to be shown on top of the list of "my cars"
                    if ($user->canAddCar()) { // check if user can add more visible cars
                        $car->save();
                        $response = ['success'=> 'Voiture ajoutée avec succés.'];
                    } else {
                        $car->visible = 0;
                        $car->save();
                        $response = ['limit'=> 'La voiture a ete ajoutee et mise en pause'];
                    }
                }

                return response()->json($response);
            } else {
                return response()->json(['error'=>'Aucune voiture trouvée avec le code entré.']);
            }
        }

        // adding new car
        if ($request->exists('new_car_form')) {
            $response = array();

            // validation rules
            $max_images = $user->pack->prise_des_photos_des_voitures;
            // image validation
            $img_validator = Validator::make($request->all(), [
                'images.*' => "mimes:jpeg,png,jpg,gif,svg", // all files should be of image type
                'images' => "max:$max_images", // user can't upload more than what the pack provides
            ]);
            // other fields validation
            $validator = Validator::make($request->all(), [
                'images' => "required",
                'marque' => 'required',
                'input_modele' => 'required_without:select_modele',
                'select_modele' => 'required_without:input_modele',
                'version' => 'required',
                'prix' => 'required',
                'carburant' => 'required',
                'boite_de_vitesse' => 'required',
                'annee_mise_en_circulation' => 'required',
                'dedouane' => 'required',
                'kilometrage' => 'required',
                'couleur' => 'required',
                'carrosserie' => 'required',
                'portes' => 'required',
                'puissance_fiscale' => 'required',
                'premiere_main' => 'required',
                'garantie' => 'required',
                'options' => 'required',
            ]);

            // check if the img_validation fails
            if ($img_validator->fails()) {
                $message = 'Vous ne pouvez pas ajouter plus de '.$max_images.' IMAGES.';
                return response()->json(['error'=> $message]);
            }

            // check if the validation fails
            if ($validator->fails()) {
                return response()->json(['error'=>'Assurez-vous de remplir tous les champs.']);
            }
            
            // if validated
            $car = new Car;
            // images upload
            $all_images = [];
            foreach ($request->file('images') as $file) {
                $imageName = time().$file->getClientOriginalName();  
                $file->move(public_path('images/uploads'), $imageName);
                array_push($all_images, $imageName);
            }
            $car->images = serialize($all_images);
            if (str_contains($request->marque, '_')) {
                $marque = str_replace ('_', ' ', $request->marque);
            } else {
                $marque=$request->marque;
            }
            $car->marque = $marque;
            if ($request->input_modele) {
                $car->modele = $request->input_modele ;
            } else {
                $car->modele = $request->select_modele ;
            }
            $car->version = $request->version ;
            $car->prix = $request->prix ;
            $car->carburant = $request->carburant ;
            $car->boite_de_vitesse = $request->boite_de_vitesse ;
            $car->annee_mise_en_circulation = $request->annee_mise_en_circulation ;
            $car->dedouane = $request->dedouane ;
            $car->kilometrage = $request->kilometrage ;
            $car->couleur = $request->couleur ;
            $car->carrosserie = $request->carrosserie ;
            $car->portes = $request->portes ;
            $car->puissance_fiscale = $request->puissance_fiscale ;
            $car->premiere_main = $request->premiere_main ;
            $car->garantie = $request->garantie ;
            $car->options = serialize(explode(',', $request->options)) ;
            // $car->options = serialize($request->options) ;
            $car->user_id = $user->id;
            if ($user->canAddCar()) { // check if user can add more visible cars
                $car->save();
                $response = ['success'=> 'Voiture ajoutée avec succés.'];
            } else {
                $car->visible = 0;
                $car->save();
                $response = ['limit'=> 'La voiture a ete ajoutee et mise en pause'];
            }
            return response()->json($response);
        }

    }

    public function admin_store(Request $request, $slug)
    {
        $user = User::find($slug);
        // adding car with token
        if ($request->exists('token_form')) {

            // validation rules
            $validator = Validator::make($request->all(), [
                'car_token' => [
                    'required'
                ],
            ]);

            // check if the validation fails
            if ($validator->fails()) {
                return response()->json($validator->messages());
            }

            // if validated
            $car = Car::where('token' ,'=', $request->car_token)->first();
            // check if there is a car with the submitted token
            if ($car) {
                $response = array();
                
                if ($car->user_id) { // check if the car has already a user
                    $response = ['error'=> 'Vous ne pouvez pas ajouter cette voiture!'];
                } else {
                    $particular_owner = Particular::where('id', '=', $car->particular_id)->first();
                    $particular_owner->car_id = null;
                    $particular_owner->save();
                    $car->particular_id = null; // removing relationship with particular
                    $car->user_id = $user->id; //assigning to user
                    $car->created_at = now(); // to be shown on top of the list of "my cars"
                    if ($user->canAddCar()) { // check if user can add more visible cars
                        $car->save();
                        $response = ['success'=> 'Voiture ajoutée avec succés.'];
                    } else {
                        $car->visible = 0;
                        $car->save();
                        $response = ['limit'=> 'La voiture a ete ajoutee et mise en pause'];
                    }
                }

                return response()->json($response);
            } else {
                return response()->json(['error'=>'Aucune voiture trouvée avec le code entré.']);
            }
        }

        // adding new car
        if ($request->exists('new_car_form')) {
            $response = array();

            // validation rules
            $max_images = $user->pack->prise_des_photos_des_voitures;
            // image validation
            $img_validator = Validator::make($request->all(), [
                'images.*' => "mimes:jpeg,png,jpg,gif,svg", // all files should be of image type
                'images' => "max:$max_images", // user can't upload more than what the pack provides
            ]);
            // other fields validation
            $validator = Validator::make($request->all(), [
                'images' => "required",
                'marque' => 'required',
                'input_modele' => 'required_without:select_modele',
                'select_modele' => 'required_without:input_modele',
                'version' => 'required',
                'prix' => 'required',
                'carburant' => 'required',
                'boite_de_vitesse' => 'required',
                'annee_mise_en_circulation' => 'required',
                'dedouane' => 'required',
                'kilometrage' => 'required',
                'couleur' => 'required',
                'carrosserie' => 'required',
                'portes' => 'required',
                'puissance_fiscale' => 'required',
                'premiere_main' => 'required',
                'garantie' => 'required',
                'options' => 'required',
            ]);

            // check if the img_validation fails
            if ($img_validator->fails()) {
                $message = 'Vous ne pouvez pas ajouter plus de '.$max_images.' IMAGES.';
                return response()->json(['error'=> $message]);
            }

            // check if the validation fails
            if ($validator->fails()) {
                return response()->json(['error'=>'Assurez-vous de remplir tous les champs.']);
            }
            
            // if validated
            $car = new Car;
            // images upload
            $all_images = [];
            foreach ($request->file('images') as $file) {
                $imageName = time().$file->getClientOriginalName();  
                $file->move(public_path('images/uploads'), $imageName);
                array_push($all_images, $imageName);
            }
            $car->images = serialize($all_images);
            if (str_contains($request->marque, '_')) {
                $marque = str_replace ('_', ' ', $request->marque);
            } else {
                $marque=$request->marque;
            }
            $car->marque = $marque;
            if ($request->input_modele) {
                $car->modele = $request->input_modele ;
            } else {
                $car->modele = $request->select_modele ;
            }
            $car->version = $request->version ;
            $car->prix = $request->prix ;
            $car->carburant = $request->carburant ;
            $car->boite_de_vitesse = $request->boite_de_vitesse ;
            $car->annee_mise_en_circulation = $request->annee_mise_en_circulation ;
            $car->dedouane = $request->dedouane ;
            $car->kilometrage = $request->kilometrage ;
            $car->couleur = $request->couleur ;
            $car->carrosserie = $request->carrosserie ;
            $car->portes = $request->portes ;
            $car->puissance_fiscale = $request->puissance_fiscale ;
            $car->premiere_main = $request->premiere_main ;
            $car->garantie = $request->garantie ;
            $car->options = serialize(explode(',', $request->options)) ;
            // $car->options = serialize($request->options) ;
            $car->user_id = $user->id;
            if ($user->canAddCar()) { // check if user can add more visible cars
                $car->save();
                $response = ['success'=> 'Voiture ajoutée avec succés.'];
            } else {
                $car->visible = 0;
                $car->save();
                $response = ['limit'=> 'La voiture a ete ajoutee et mise en pause'];
            }
            return response()->json($response);
        }
    }
}
