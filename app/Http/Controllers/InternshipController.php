<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home.usulan-magang', [
            "magang" => DataMahasiswa::where('mahasiswa_id', auth()->user()->id)->get(),
            'users' => User::where('user_id', auth()->user()->id)->get(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.create-magang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'status_mahasiswa' => 'required',
            'jenis_magang' => 'required',
            'jenjang_pendidikan' => 'required',
            'universitas' => 'required',
            'jurusan' => 'required|max:100',
            'internship_start_date' => 'required|string',
            'internship_end_date' => 'required|string',
            'tema' => 'required|string',
            'surat_pengantar' => 'file|mimes:pdf|max:3050',
            'proposal' => 'file|mimes:pdf|max:3050',
            'transkip' => 'file|mimes:pdf|max:3050',
            'cv' => 'file|mimes:pdf|max:3050',
            'sertifikat' => 'file|mimes:pdf|max:5050',
            'foto' => 'image|file|max:3050',
            'lokasi_magang' => 'required|string',
            'role_magang' => 'required|string',
        ]);

        // Set the user ID to the authenticated user's ID
        // $validateDate['mahasiswa_id'] = auth()->user()->id;

        // Handle file upload for 'foto'
        
        if ($request->file('surat_pengantar')) {
            $validatedData['surat_pengantar'] = $request->file('surat_pengantar')->store('pdfs');
        }

        if ($request->file('proposal')) {
            $validatedData['proposal'] = $request->file('proposal')->store('pdfs');
        }
        
        if ($request->file('transkip')) {
            $validatedData['transkip'] = $request->file('transkip')->store('pdfs');
        }
        
        if ($request->file('cv')) {
            $validatedData['cv'] = $request->file('cv')->store('pdfs');
        }
        
        if ($request->file('sertifikat')) {
            $validatedData['sertifikat'] = $request->file('sertifikat')->store('pdfs');
        }
        
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }
        // Read and store the content of each PDF file
        // $pdfContents = [];
        // foreach (['proposal', 'transkip', 'cv', 'sertifikat'] as $fileKey) {
        //     if ($request->file($fileKey)) {
        //         $pdfContents[$fileKey] = file_get_contents($request->file($fileKey)->getRealPath());
        //     }
        // }

        // $validatedData['pdf_contents'] = $pdfContents;

        $validateDate['mahasiswa_id'] = auth()->user()->id;
        DataMahasiswa::create($validateDate);
        

        // DataMahasiswa::create($validatedData);

            
        $message = Toastr::success('User updated successfully :)','Success');

        return redirect('/usulan')->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function show(DataMahasiswa $internship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataMahasiswa  $internship
     * @return \Illuminate\Http\Response
     */
    public function edit(DataMahasiswa $internship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataMahasiswa  $internship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataMahasiswa $internship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataMahasiswa  $internship
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataMahasiswa $internship)
    {
        //
    }
}
