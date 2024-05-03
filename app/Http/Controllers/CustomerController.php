<?php

namespace App\Http\Controllers;

use App\Mail\AccountDeleteRequest;
use App\Mail\ContractTerminatedConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerRegistration;
use App\Models\Company;
use App\Models\InstallInvoice;
use App\Models\Invoice;
use App\Models\LeaseContract;
use App\Models\MalfunctionRequest;
use App\Models\Product;
use App\Models\ProductInvoice;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CustomerController extends Controller
{
    public function index()
    {        
        return view('customers.index');
    }

    public function invoices()
    {
        $customer = auth()->user(); // Haal de ingelogde gebruiker op
        $invoices = InstallInvoice::all();
        $productInvoices = ProductInvoice::all();
        
        return view('customers.invoices')->with(['invoices' => $invoices, 'productInvoices' => $productInvoices, 'customer' => $customer]);
    }

    public function lease_contracts()
    {
        // Haal de ingelogde klant op
        $customer = auth()->user(); // Dit veronderstelt dat de klant is ingelogd
    
        // Haal de leasecontracten op die behoren tot de ingelogde klant
        $leaseContracts = LeaseContract::where('customer_id', $customer->id)->get();

    
        // Geef de gegevens door aan de view
        return view('customers.lease_contracts', ['leaseContracts' => $leaseContracts]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email|unique:users',
            'street' => 'required',
            'houseNumber' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'phonenumber' => 'required',
            // Add other fields if needed
        ]);
    
        // Create a new customer
        $customer = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'Customer',
        ]);
    
        // Create a new company and associate it with the user
        $company = Company::create([
            'company_name' => $request->input('company_name'),
            'street' => $request->input('street'),
            'house_Number' => $request->input('houseNumber'),
            'zipcode' => $request->input('zipcode'),
            'city' => $request->input('city'),
            'phonenumber' => $request->input('phonenumber'),
            // Add other fields if needed
        ]);
    
        // Associate the company with the user
        $customer->company()->associate($company);
        $customer->save();
    
        $token = Str::random(40);
    
        DB::table('password_reset_tokens')->insert([
            'email' => $request->input('email'),
            'token' => Hash::make($token),
            'created_at' => now(),
        ]);
    
        // Send registration email and save token in the password_resets table
        $resetUrl = route('password.reset', ['token' => $token]);
        Mail::to($customer->email)->send(new CustomerRegistration($customer, $resetUrl, $token));
    
        return "Klant geregistreerd en e-mail verstuurd.";
    }
    

    public function accountDeleteRequest()
    {
        // Veronderstel dat je de ingelogde klant ophaalt
        $customer = auth()->user();

        // Veronderstel dat je de sales medewerker ophaalt (bijvoorbeeld de eerste gebruiker met de rol 'Sales')
        $salesEmployee = User::where('role', 'Sales')->first();

        // Hier kun je de logica toevoegen om de accountDeleteUrl in te stellen, afhankelijk van jouw implementatie
        $accountDeleteUrl = 'customers.account-delete-confirm'; // Vervang dit met jouw eigen logica

        // Stuur het account delete verzoek naar de sales medewerker
        Mail::to($salesEmployee->email)->send(new AccountDeleteRequest($customer, $accountDeleteUrl, $salesEmployee));

        return "Verzoek aangevraagd";
    }

    public function malfunction_request()
    {
        $products = Product::all();
        return view('customers.malfunction_request')->with([
            'products' => $products
        ]);
    }

    public function malfunction_request_store(Request $request)
    {
        // Haal de ingelogde klant op
        $customer = auth()->user();
    
        // Controleer of de klant is gekoppeld aan een bedrijf
        if ($customer->company_id) {
            // Haal het bedrijf van de klant op
            $company = Company::find($customer->company_id);
    
            // Controleer of het bedrijf bestaat
            if ($company) {
                // Maak de storingsaanvraag aan
                $malfunction = MalfunctionRequest::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'comments' => $request->input('comments'),
                    'customer_id' => $customer->id,
                    'company_id' => $company->id,
                ]);
    
                // Haal het bestaande product op basis van het geselecteerde product_id in het formulier
                $product = Product::find($request->input('product_id'));
    
                // Voeg het product toe aan de storingsaanvraag
                $malfunction->products()->attach($product->id);
    
                // Voer verdere logica uit, indien nodig
    
                return "Storingsaanvraag aangemaakt";
            } else {
                return "Fout: Het bedrijf van de klant kon niet worden gevonden.";
            }
        } else {
            return "Fout: De klant is niet gekoppeld aan een bedrijf.";
        }
    }
    
    
       

    public function showAccountDeleteConfirmation()
    {
        return view('customers.account-delete-confirmation');
    }

    public function accountDelete(Request $request)
    {
        // Haal de klant op basis van de ingelogde gebruiker
        $customer = auth()->user();
    
        // Vind en verwijder alle contracten van deze klant
        LeaseContract::where('customer_id', $customer->id)->delete();
    
        // Voer verdere logica uit, zoals het versturen van een bevestigingsmail, etc.
        Mail::to($customer->email)->send(new ContractTerminatedConfirmation($customer));
    
        return "Contracten beëindigd";
    }


    public function show_invoice($id)
    {
        $invoice = InstallInvoice::findOrFail($id);
        $product = Product::findOrFail($id);
        $customer = auth()->user(); // Haal de ingelogde gebruiker op
        $productInvoice = ProductInvoice::where('id', $id)->first();
        
        // Haal alle gekoppelde contracten van de ingelogde klant op
        $contracts = LeaseContract::where('customer_id', $customer->id)->get();
        $companies = Company::where('user_id', $customer->id)->get();
        
        return view('customers.show_invoice')->with([
            'invoice' => $invoice,
            'productInvoice' => $productInvoice,
            'customer' => $customer,
            'contracts' => $contracts,
            'product' => $product,
            'companies' => $companies
        ]);
    }
    
    
    public function show_lease_contract($id)
    {
        $contract = LeaseContract::findOrFail($id);
        $company = Company::findOrFail($id);
        $customer = auth()->user(); // Haal de ingelogde gebruiker op
        $products = $contract->products; // Gebruik de relatie om producten op te halen

        // dd($products);
    
        return view('customers.show_lease_contract')->with([
            'contract' => $contract,
            'customer' => $customer,
            'company' => $company,
            'products' => $products,
        ]);
    }
    
    
    

    
}
