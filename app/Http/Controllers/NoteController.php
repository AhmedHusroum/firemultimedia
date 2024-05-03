<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;


use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // ...

    public function index()
    {
        $users = User::whereIn('role', ['user', 'customer'])->with('company', 'notes')->get();
    
        return view('notes.index', compact('users'));
    }
    



    public function create()
{
    $users = User::whereIn('role', ['user', 'customer'])->get();

    return view('notes.create', compact('users'));
}



    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required',
            'company_id' => 'nullable|exists:companies,id',
            'author_id' => 'required|exists:users,id', 
        ]);
        
        // ...
        
        $company_id = $request->input('company_id');
        $author_id = $request->input('author_id');
        
        $note = new Note([
            'note' => $request->input('note'),
            'date' => now(),
            'company_id' => $company_id,
            'author_id' => $author_id,
        ]);
        
        $note->save();
        
        return redirect()->route('notes.index');
        
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }
    
    


    public function update(Request $request, Note $note)
    {
        $request->validate([
            'note' => 'required',
        ]);

        $note->update([
            'note' => $request->input('note'),
        ]);

        return redirect()->route('notes.show', $note);
    }

    public function userNotes(User $user)
    {           
        $companies = Company::all();
        $notes = $user->notes;

        return view('notes.user_notes', compact('user', 'companies', 'notes'));
    }
    
    public function destroy(Note $note)
    {
        $note->delete();
        
        return redirect()->back()->with('success', 'Notitie succesvol verwijderd.');
    }


        public function editCompany(Company $company)
    {
        return view('notes.editCompany', compact('company'));
    }

    public function updateCompany(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'phonenumber' => 'required',
            // Voeg hier andere validatieregels toe
        ]);

        $company->update($request->all());
        $user = $company->user;

        return redirect()->route('user.notes', ['user' => $user->id])->with('success', 'Bedrijfsinformatie succesvol gewijzigd.');
    }

    public function userCompanies(User $user)
    {
        // Gebruik de relatie op de User-entiteit om de bedrijven op te halen
        $companies = $user->companies;
        $notes = $user->notes;
    
        return view('notes.user_notes', compact('user', 'companies', 'notes'));
    }
    


    


}
    

