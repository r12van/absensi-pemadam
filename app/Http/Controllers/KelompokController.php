<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\JadwalPiket;
use App\Models\Absensi;

class KelompokController extends Controller
{
    private function getNextPiket($currentPiket)
    {
        $pikets = ['A', 'B', 'C']; // List of possible 'piket' values
        $currentIndex = array_search($currentPiket, $pikets);

        // Get the next 'piket' value in the array
        $nextIndex = ($currentIndex + 1) % count($pikets);
        return $pikets[$nextIndex];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the current date
        $currentDate = now()->toDateString();

        // Get the corresponding 'piket' value from 'jadwal_piket' table based on the current date
        $jadwalPiket = JadwalPiket::where('tanggal', $currentDate)->first();

        if (!$jadwalPiket) {
            // If there is no corresponding 'piket' value for the current date, handle accordingly (e.g., show an error message).
            return 'No schedule found for the current date.';
        }

        // Get the 'piket' value for the current date
        $piketHadir = $jadwalPiket->piket;
        $piketCadangan = $this->getNextPiket($piketHadir);
        $piketLepas = $this->getNextPiket($piketCadangan);

        // Get the list of 'Anggota' based on the 'piket' values
        $anggotaHadir = Anggota::where('group_piket', $piketHadir)->get();
        $anggotaCadangan = Anggota::where('group_piket', $piketCadangan)->get();
        $anggotaLepas = Anggota::where('group_piket', $piketLepas)->get();

        // Get the list of 'Absensi' for the current date
        $absensi = Absensi::where('tanggal', $currentDate)->exists();

        $piketGroups = [
            'Piket Hadir' => $piketHadir,
            'Cadangan Piket' => $piketCadangan,
            'Lepas Piket' => $piketLepas,
        ];

        return view('kelompok.index', compact('currentDate', 'anggotaHadir', 'anggotaCadangan', 'anggotaLepas', 'absensi', 'piketGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        $request->validate([
            'anggota_id.*' => 'required|exists:anggota,id',
            'tanggal' => 'required|date',
            'status.*' => 'required|in:Piket Hadir,Cadangan Piket,Lepas Piket,Tidak Hadir',
            'keterangan.*' => 'nullable|string',
        ]);

        $data = [];
        foreach ($request->input('anggota_id') as $index => $anggotaId) {
            $status = $request->input('status')[$index];
            $keterangan = $status === 'Tidak Hadir' ? $request->input('keterangan')[$index] : null;

            $data[] = [
                'anggota_id' => $anggotaId,
                'tanggal' => $request->tanggal,
                'status' => $status,
                'keterangan' => $keterangan,
            ];
        }

        Absensi::insert($data);

        return redirect()->route('kelompok.index')->with('success', 'Attendance data saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
