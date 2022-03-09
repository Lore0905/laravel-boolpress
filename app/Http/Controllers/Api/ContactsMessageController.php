<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;

class ContactsMessageController extends Controller
{
    public function store(Request $request){
        $contacts_form_data = $request->all();
        // dd($contacts_form_data);
        // creo una nuova istanza del model che equivale a creare una nuova riga sul database
        $new_lead = new Lead();
        // utilizzo la funzione fillable per popolare 
        $new_lead->fill($contacts_form_data);

        // senza fillable
        // $new_lead->name_contacts =  $contacts_form_data['name_contacts'];
        // $new_lead->lastname_contacts = $contacts_form_data['lastname_contacts'];
        // $new_lead->email_contact = $contacts_form_data['email_contact'];
        // $new_lead->textarea_contacts = $contacts_form_data['textarea_contacts'];

        $new_lead->save();
    }
}
