<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

/**
 * Die Klasse PersonController
 */
class PersonController extends Controller
{
    /**
	 * Holt alle Person-Objekte
	 *
	 * return Person
	 */
	public function index()
    {
        return Person::all();
    }
    
    /**
	 * Holt ein Person-Objekt Anhand des ID
	 *
	 * return json
	 */
    public function show($id)
    {
    	$person = Person::find($id);
    	
        return response()->json($person, 200);
    }

	/**
	 * Speichert ein Person-Objekt
	 *
	 * return json
	 */
    public function create($firstname, $lastname, $description)
    {
		if(!is_numeric($firstname) AND is_string($lastname) AND is_string($description)){
			
			$person = new Person();
			$person->firstname = $firstname;
			$person->lastname = $lastname;
			$person->description = $description;
			$person->save();
			
			return response()->json($person, 200);
		}else{
			return 'Fehler in der create Methode';
		}
    }
    
    /**
	 * Bearbeitet ein Person-Objekt
	 *
	 * return json
	 */
    public function update($id, $firstname, $lastname, $description)
    {
		if(is_numeric($id) AND is_string($firstname) AND is_string($lastname) AND is_string($description)){
			
			$person = Person::find($id);
			if(!empty($person)){
				$person->firstname = $firstname;
				$person->lastname = $lastname;
				$person->description = $description;
				$person->update();
			
				return response()->json($person, 200);
			}else{
				return 'Die Person existiert nicht';
			}
			
		}else{
			return 'Fehler in der update Methode';
		}
    }

	/**
	 * Löscht ein Person-Objekt
	 *
	 * return json
	 */
    public function delete($id, $confirm)
    {
        if(is_numeric($id) AND is_string($confirm)){
        	
        	$person = Person::find($id);
			if(!empty($person AND $confirm == 'true') ){
				
				$person->delete();
			
				return response()->json($person, 200);
			}else{
				return 'Die Person konnte nicht gelöscht werden';
			}
		}else{
			return 'Fehler in der delete Methode';
		}
    }
}
