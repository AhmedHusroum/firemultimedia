<?php

namespace App\Http\Controllers;

use App\Models\InstallInvoice;
use App\Models\Product;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvoiceMail;
use App\Models\Invoice;
use App\Models\ProductInvoice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoice.list', ["invoices" => InstallInvoice::with('customer')->with('quotation')->with('finance')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quoteid' => 'required',
            'bedrijfsnaam' => 'required',
            'straat' => 'required',
            'huisnummer' => 'required',
            'postcode' => 'required',
            'stad' => 'required',
            'telefoonnummer' => 'required',
            'email' => 'required',
            'prodname' => 'required',
            'prodinstallcost' => 'required',
            'note' => 'nullable',
            'amount' => 'required'
            
        ]);
        $quote = Quotation::where('id', $validatedData['quoteid'])->firstOrFail();
        $quote->companyname = $validatedData['bedrijfsnaam'];
        $quote->street = $validatedData['straat'];
        $quote->number = $validatedData['huisnummer'];
        $quote->postalcode = $validatedData['postcode'];
        $quote->city = $validatedData['stad'];
        $quote->phonenumber = $validatedData['telefoonnummer'];
        $quote->email = $validatedData['email'];
        $quote->amount = $validatedData['amount'];

        $invoice = new InstallInvoice();
        $invoice->quotation_id = $quote->id;
        $invoice->customer_id = $quote->customer_id;
        $invoice->finance_id = Auth::user()->id;
        $invoice->install_cost = $validatedData['prodinstallcost'];
        $invoice->info = $validatedData['note'];
        $invoice->date = Carbon::now();

        $customer = User::find($quote->customer_id);
        if ($customer && $customer->company) {
            $invoice->company_id = $customer->company->id;
        } else {
            // Handel de situatie af waarin de klant of het bedrijf niet bestaat
            dd('Klant of bedrijf bestaat niet.');
        }
        $invoice->save();

        // Calculate the subtotal based on the price of the product in custom_products
        $productInvoice = new ProductInvoice(); // Defineer eerst $productInvoice
        $productInvoice->product_id = $quote->products_id;
        $product = Product::find($quote->products_id); // Definieer $product voordat je het gebruikt
        $productInvoice->subtotal = $product->price * $validatedData['amount'];
        $productInvoice->custom_invoice_id = $invoice->id;
        $productInvoice->save();

        

        return redirect(route('invoice.edit', $invoice->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Quotation::where('id', $id)->firstOrFail();
        return view('invoice.create', ['quote' => $invoice, 'product' => Product::where('id', $invoice->products_id)->firstOrFail()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = InstallInvoice::with('customer')->with('quotation')->with('finance')->where('id', $id)->firstOrFail();
        Mail::send(new InvoiceMail($invoice));
        return view('invoice.show', ["invoice" => $invoice]);
    }



    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Niet betaald,Betaald',
        ]);
    
        $invoice = InstallInvoice::findOrFail($id);
        $invoice->status = $request->input('status');
        $invoice->save();
    
        return redirect()->back()->with('success', 'Status succesvol bijgewerkt.');
    }


}
