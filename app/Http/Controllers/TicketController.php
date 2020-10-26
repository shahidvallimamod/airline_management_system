<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $data = Ticket::all();
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
            'from_airport' => 'exists:airports,id'
        ],[
            'from_airport.exists' => 'فرودگاه انتخاب شده نیست',
        ]);

        Ticket::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tickets.index')->with(['success' => 'ایرلاین با موفقیت ایجاد شد']);
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
