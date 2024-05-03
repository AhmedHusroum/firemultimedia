<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Category;
use App\Models\Company;
use App\Models\Maintenance;
use App\Models\MaintenanceErrorPlanned;
use App\Models\MalfunctionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    public function index()
    {

        $maintenanceAppointments = Maintenance::with(['company', 'product_category', 'ticket'])->get();

        if (auth()->check() && (auth()->user()->role === 'Headmaintenance' || auth()->user()->role === 'Admin' || auth()->user()->role === 'Maintenance')) {

            return view('maintenance.index', compact('maintenanceAppointments'));
        } else {
            return redirect('/noAcces')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }
    }


    public function headmaintenance()
    {

        $maintenanceAppointments = Maintenance::with(['company', 'product_category', 'ticket'])->get();
        $malfunctionRequests = MalfunctionRequest::all();

        if (auth()->check() && (auth()->user()->role === 'Headmaintenance' || auth()->user()->role === 'Admin')) {

            return view('maintenance.headmaintenance', compact('maintenanceAppointments', 'malfunctionRequests'));
        } else {
            return redirect('/noAcces')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }
    }

    public function fullcalander()
    {
        // Controleer of de gebruiker is ingelogd
        if (auth()->check()) {
            // Haal de rol van de ingelogde gebruiker op
            $userRole = auth()->user()->role;

            // Als de gebruiker een 'Admin' of 'Headmaintenance' is, haal dan alle afspraken op
            if ($userRole === 'Admin' || $userRole === 'Headmaintenance') {
                $maintenanceAppointments = Maintenance::all();
            } else {
                // Haal de ID van de ingelogde gebruiker op
                $userId = auth()->id();

                // Haal de afspraken op die aan de ingelogde gebruiker zijn toegewezen
                $maintenanceAppointments = Maintenance::where('assigned', $userId)->get();
            }

            // Geef de afspraken weer op de fullcalendar-pagina
            return view('maintenance.fullcalendar', compact('maintenanceAppointments'));
        } else {
            // Redirect naar inlogpagina als de gebruiker niet is ingelogd
            return redirect('/login');
        }
    }

    public function show(string $id)
    {
        $maintenanceAppointment = Maintenance::findOrFail($id);

        return view('maintenance.show')->with('maintenanceAppointment', $maintenanceAppointment);
    }

    public function create()
    {
        $companies = Company::all();
        $categories = Category::all();
        $users = User::all();
        $maintenanceTypes = ['storingsaanvragen', 'routinematige_bezoeken']; // Aan te vullen met de daadwerkelijke onderhoudstypen

        return view('maintenance.create', compact('companies', 'categories', 'maintenanceTypes', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'remark' => 'required',
            'company_id' => 'required|exists:companies,id',
            'product_category_id' => 'required|exists:product_categories,id',
            'maintenance_type' => 'required|in:storingsaanvragen,routinematige_bezoeken',
            'assigned' => 'required',
        ]);

        $validatedData['date_added'] = now();


        // dd($validatedData);

        Maintenance::create($validatedData);

        return redirect()->route('maintenance.fullcalendar')->with('success', 'Onderhoudsafspraak succesvol toegevoegd.');
    }

    public function edit($id)
    {
        $maintenanceAppointment = Maintenance::findOrFail($id);
        $companies = Company::all();
        $categories = Category::all();
        $users = User::all();
        $maintenanceTypes = ['storingsaanvragen', 'routinematige_bezoeken'];

        return view('maintenance.edit')->with([
            'maintenanceAppointment' => $maintenanceAppointment,
            'companies' => $companies,
            'categories' => $categories,
            'users' => $users,
            'maintenanceTypes' => $maintenanceTypes,
        ]);
    }


    public function update(Request $request, $id)
    {
        $maintenanceAppointment = Maintenance::findOrFail($id);

        // Valideer en sla de bewerkte gegevens op
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'remark' => 'required',
            'company_id' => 'required|exists:companies,id',
            'product_category_id' => 'required|exists:product_categories,id',
            'maintenance_type' => 'required|in:storingsaanvragen,routinematige_bezoeken',
            'assigned' => 'required',
            // Voeg hier andere gevalideerde velden toe
        ]);

        // Update de afspraak met de nieuwe gegevens
        $maintenanceAppointment->update($validatedData);

        // Redirect terug naar de detailpagina na bewerken
        return redirect()->route('maintenance.show', $maintenanceAppointment->id);
    }

    public function destroy($id)
    {
        $maintenanceAppointment = Maintenance::findOrFail($id);
        $maintenanceAppointment->delete();

        return redirect()->route('maintenance.fullcalendar')->with('success', 'Afspraak succesvol verwijderd');
    }
}
