<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $data['tickets'] = Ticket::with(['airline','fromAirport','toAirport'])->orderByDesc('id')->paginate(2);

        return view('tickets.index', compact('data'));
    }

    public function create()
    {
        $data['airports'] = Airport::all();
        $data['airlines'] = Airline::all();

        return view('tickets.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_airport' => 'required|exists:airports,id',
            'to_airport' => 'required|exists:airports,id',
            'airplane_model' => 'required'
        ],[
            'from_airport.exists' => 'فرودگاه انتخاب شده نیست',
        ]);

        Ticket::create([
            'airline_id' => $request->airline_id,
            'from_airport' => $request->from_airport,
            'to_airport' => $request->to_airport,
            'airplane_model' => $request->airplane_model,
            'flight_number' => $request->flight_number,
            'available_seat' => $request->available_seat,
        ]);

        return redirect()->route('tickets.index')->with(['success' => 'پرواز با موفقیت ایجاد شد']);
    }

    public function show($id)
    {
        $data = Ticket::FindOrFail($id);
        return view('tickets.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Ticket::findOrFail($id);
        return view('tickets.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:airlines,name,'.$id,
        ],[
            'name.required' => 'نام ایرلاین نباید خالی باشد',
            'name.unique' => 'نام ایرلاین تکراری است'
        ]);

        $data = Ticket::findOrFail($id);

        $data->update([
            'name' => $request->name
        ]);

        return redirect()->route('tickets.index')->with(['success' => 'ایرلاین با موفقیت ویرایش شد']);
    }

    public function destroy($id)
    {
        $data = Ticket::findOrFail($id);
        $data->delete();
        return redirect()->route('tickets.index')->with(['success' => 'ایرلاین با موفقیت حذف شد']);
    }
}
