<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use Carbon\Carbon;

class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = jadwal::all();

        $jadwals = $jadwals->map(function ($jadwal) {
            // Format tanggal menjadi d-m-Y
            $jadwal->tanggal = Carbon::createFromFormat('Y-m-d', $jadwal->tanggal)->format('d-m-Y');
            return $jadwal;
        });
        $buses = ['MASARTO', 'MASBOGIE', 'SHAYNA', 'NAJWA', 'JULIAN', 'KARTIKA', 'ABIYOSO'];
        return view('index', compact('jadwals', 'buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
