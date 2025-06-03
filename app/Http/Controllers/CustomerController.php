<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use PDF;
class CustomerController extends Controller
{
    // Tampilkan daftar customer
    public function index()
    {
        // Mengurutkan berdasarkan ID terbaru
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('customers.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|unique:customers,nik',
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'email' => 'nullable|email',
            'alamat' => 'nullable|string',
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Data customer berhasil ditambahkan.');
    }

    // Tampilkan detail customer
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // Tampilkan form edit
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Simpan hasil edit
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nik' => 'required|string|unique:customers,nik,' . $customer->id,
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'email' => 'nullable|email',
            'alamat' => 'nullable|string',
        ]);

        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Data customer berhasil diupdate.');
    }

    // Hapus customer
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Data customer berhasil dihapus.');
    }


    public function cetakPDF()
    {
        $customers = Customer::all();
        $pdf = PDF::loadView('pdf.customer', compact('customers'));
        return $pdf->stream('customers.pdf');

    }

}

