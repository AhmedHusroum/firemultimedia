<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\LeaseContract;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        $leaseContracts = LeaseContract::all();

        return view('finances.index', [
            'companies' => $companies,
            'leaseContracts' => $leaseContracts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'bkr_checked' => 'nullable', // Verwijder 'required' en gebruik 'nullable'
        ]);
    
        $company = Company::findOrFail($id);
    
        // Aangepaste logica om 'on' of 'off' in te stellen op 1 of 0
        $company->bkr_checked = $request->has('bkr_checked') ? 1 : 0;
    
        $company->save();

        return redirect()->route('finances.index')->with('success', 'Post updated successfully');
    }

}
