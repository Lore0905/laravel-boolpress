<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;

class ContactsMessageController extends Controller
{
    public function store(Request $request){
        $contacts_form_data = $request->all();
        // creo una nuova istanza del model che equivale a creare una nuova riga sul database
        $new_lead = new Lead();
        // utilizzo la funzione fillable per popolare 
        $new_lead->fillable($contacts_form_data);
        $new_lead->save();
    }
}
