<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Runner\validate;

class QuoteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('quote.list', ["quotes" => Quotation::with('customer')->get()]);
    }

    /**
     * Display a listing of the resource.
     */
    public function success()
    {
        return view('quote.success');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productid' => 'required',
            'bedrijfsnaam' => 'required',
            'straat' => 'required',
            'huisnummer' => 'required',
            'postcode' => 'required',
            'stad' => 'required',
            'telefoonnummer' => 'required',
            'email' => 'required',
            'amount' => 'required'
        ]);
        $quote = new Quotation();
        $quote->customer_id = Auth::id();
        $quote->products_id = $validatedData['productid'];
        $quote->companyname = $validatedData['bedrijfsnaam'];
        $quote->street = $validatedData['straat'];
        $quote->number = $validatedData['huisnummer'];
        $quote->postalcode = $validatedData['postcode'];
        $quote->city = $validatedData['stad'];
        $quote->phonenumber = $validatedData['telefoonnummer'];
        $quote->email = $validatedData['email'];
        $quote->amount = $validatedData['amount'];
        $quote->save();
        return redirect(route('quote.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //TODO: Fetch products from database
        $title = "";
        if ($id == 1) {
            $title = "Machine Bit Deluxe";
        } else if ($id == 2) {
            $title = "Machine Bit Light";
        } else if ($id == 3) {
            $title = "Machine Groot";
        }
        return view("quote.create", ["title" => $title, "id" => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quote = Quotation::where('id', $id)->firstOrFail();
        return view("quote.edit", ["quote" => $quote]);
    }
}
