@extends('layouts.app')
@section('content')
   <div class="overflow-x-auto w-auto px-64">
       <h1 class="text-3xl mb-4">Onderhoudsafspraken</h1>
       <table class="table">
           <thead>
               <tr>
                   <th class="border py-2 px-4">ID</th>
                   <th class="border py-2 px-4">Opmerking</th>
                   <th class="border py-2 px-4">Bedrijf</th>
                   <th class="border py-2 px-4">Categorie</th>
                   <th class="border py-2 px-4">Type onderhoud</th>
                   <th class="border py-2 px-4">Datum toegevoegd</th>
               </tr>
           </thead>
           <tbody>
               @foreach($maintenanceAppointments as $appointment)
                   <tr>
                       <td class="border py-2 px-4">{{ $appointment->id }}</td>
                       <td class="border py-2 px-4">{{ $appointment->remark }}</td>
                       <td class="border py-2 px-4">{{ $appointment->company->name }}</td>
                       <td class="border py-2 px-4">{{ $appointment->product_category->name }}</td>
                       <td class="border py-2 px-4">{{ $appointment->maintenance_type }}</td>
                       <td class="border py-2 px-4">{{ $appointment->date_added }}</td>
                   </tr>
               @endforeach
           </tbody>
       </table>

       <h1 class="text-3xl mt-8 mb-4">Storingsaanvragen</h1>
       <table class="table">
           <thead>
               <tr>
                   <th class="border py-2 px-4">Titel</th>
                   <th class="border py-2 px-4">Beschrijving</th>
                   <th class="border py-2 px-4">Opmerkingen</th>
                   <th class="border py-2 px-4">Klant</th>
                   <th class="border py-2 px-4">Bedrijf</th>
               </tr>
           </thead>
           <tbody>
               @foreach($malfunctionRequests as $malfunctionRequest)
                   <tr>
                       <td class="border py-2 px-4">{{ $malfunctionRequest->title }}</td>
                       <td class="border py-2 px-4">{{ $malfunctionRequest->description }}</td>
                       <td class="border py-2 px-4">{{ $malfunctionRequest->comments }}</td>
                       <td class="border py-2 px-4">{{ optional($malfunctionRequest->user)->name }}</td>
                       <td class="border py-2 px-4">{{ optional($malfunctionRequest->company)->company_name }}</td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>
@endsection
