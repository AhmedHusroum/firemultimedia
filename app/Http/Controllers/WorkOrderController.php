<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check() && (auth()->user()->role === 'Headmaintenance' || auth()->user()->role === 'Admin')) {
            $workOrders = WorkOrder::all();
            $materials = Material::all();
            $users = User::all();

            return view('maintenance/work_orders.index', compact('workOrders', 'materials'));
        } else {
            return redirect('/noAcces')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (auth()->check() && (auth()->user()->role === 'Headmaintenance' || auth()->user()->role === 'Admin' || auth()->user()->role === 'Maintenance')) {
            $materials = Material::all();
            $users = User::all();

            return view('maintenance/work_orders.create', compact('materials', 'users'));
        } else {


            return redirect('/noAcces')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer het formuliergegevens
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'material' => 'required|exists:materials,id',
            'material_amount.*' => 'required|numeric',
        ]);

        // Creëer een nieuwe werkbon
        $workOrder = new WorkOrder();
        $workOrder->title = $request->input('title');
        $workOrder->description = $request->input('description');
        $workOrder->work_order_date = $request->input('work_order_date'); // Voeg de werk_order_date toe
        $workOrder->user_id = Auth::id();

        // Sla de werkbon op
        $workOrder->save();

        // Loop door de hoeveelheden en sla ze op in de material_workorder-tabel
        foreach ($request->input('material_amount') as $materialId => $material_amount) {
            // Controleer of het materiaal bestaat voordat je het toevoegt aan de material_workorder
            if (Material::find($materialId)) {
                $workOrder->material_amount()->create([
                    'material_id' => $materialId,
                    'material_amount' => $material_amount,
                ]);
            }
        }

        // Verdere logica of redirects hier...

        return redirect()->route('maintenance.index')->with('success', 'Werkbon aangemaakt');;
    }
}
