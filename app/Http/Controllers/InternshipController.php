<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

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
        
        $surat = $request->file('surat_pengantar')->store('pdfs', 'public');
        $proposal = $request->file('proposal')->store('pdfs', 'public');
        $transkip = $request->file('transkip')->store('pdfs', 'public');
        $cv = $request->file('cv')->store('pdfs', 'public');
        $sertifikat = $request->file('sertifikat')->store('pdfs', 'public');
        $foto = $request->file('foto')->store('image-store', 'public');
        
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }

        $validateDate['mahasiswa_id'] = auth()->user()->id;
        DataMahasiswa::create([
            'mahasiswa_id' => auth()->user()->id,
            'surat_pengantar' => $surat,
            'proposal' => $proposal,
            'transkip' => $transkip,
            'cv' => $cv,
            'sertifikat' => $sertifikat,
            'foto' => $foto,
            'status_mahasiswa' => $request->status_mahasiswa,
            'jenis_magang' => $request->jenis_magang,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
            'internship_start_date' => $request->internship_start_date,
            'internship_end_date' => $request->internship_end_date,
            'tema' => $request->tema,
            'lokasi_magang' => $request->lokasi_magang,
            'role_magang' => $request->role_magang,
        ]);

        // $mahasiswaData = new DataMahasiswa;
        // $mahasiswaData->status_mahasiswa = $request->status_mahasiswa;
        // $mahasiswaData->jenis_magang = $request->jenis_magang;
        // $mahasiswaData->jenjang_pendidikan = $request->jenjang_pendidikan;
        // $mahasiswaData->universitas = $request->universitas;
        // $mahasiswaData->jurusan = $request->jurusan;
        // $mahasiswaData->internship_start_date = $request->internship_start_date;
        // $mahasiswaData->internship_end_date = $request->internship_end_date;
        // $mahasiswaData->tema = $request->tema;
        // $mahasiswaData->lokasi_magang = $request->lokasi_magang;
        // $mahasiswaData->role_magang = $request->role_magang;
        // $mahasiswaData->save();

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
    public function show($id)
    {
        try {
            $student = DataMahasiswa::findOrFail($id);
    
            return view('home.mahasiswa.show', ['mahasiswa' => $student]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle not found exception (e.g., redirect to a 404 page)
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataMahasiswa  $internship
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $student = DataMahasiswa::findOrFail($id);
    
            return view('home.mahasiswa.update', ['update' => $student]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle not found exception (e.g., redirect to a 404 page)
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataMahasiswa  $internship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $internship = DataMahasiswa::find($id);

        // Check if the internship was found
        if (!$internship) {
            // Handle the case where the internship is not found (e.g., show an error message)
            return redirect()->back()->with('error', 'Internship not found.');
        }

        $update = [
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
        ];
        
        $validateDate = $request->validate($update);
        // dd($request->all());
        

        if($request->file('foto')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateDate['foto'] = $request->file('foto')->store('post-images', 'public');
        }

        if($request->file('surat_pengantar')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateDate['surat_pengantar'] = $request->file('surat_pengantar')->store('pdfs', 'public');
        }

        if($request->file('proposal')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateDate['proposal'] = $request->file('proposal')->store('pdfs', 'public');
        }
        if($request->file('transkip')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateDate['transkip'] = $request->file('transkip')->store('pdfs', 'public');
        }
        if($request->file('cv')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateDate['cv'] = $request->file('cv')->store('pdfs', 'public');
        }
        if($request->file('sertifikat')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateDate['sertifikat'] = $request->file('sertifikat')->store('pdfs', 'public');
        }

        // dd($internship->id);
        $validateDate['mahasiswa_id'] = auth()->user()->id;
        $internship->update($validateDate);

        $message = Toastr::success('User updated successfully :)','Success');
        return redirect('/usulan')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataMahasiswa  $internship
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataMahasiswa $internship, Request $request)
    {
        // Find the DataMahasiswa by ID
        // if($internship->foto) {
        //     Storage::delete($internship->foto);
        // }
        // if($internship->surat_pengantar) {
        //     Storage::delete($internship->surat_pengantar);
        // }
        // if($internship->proposal) {
        //     Storage::delete($internship->proposal);
        // }
        // if($internship->transkip) {
        //     Storage::delete($internship->transkip);
        // }
        // if($internship->cv) {
        //     Storage::delete($internship->cv);
        // }
        // if($internship->sertifikat) {
        //     Storage::delete($internship->sertifikat);
        // }

        // DataMahasiswa::destroy($request->id);

        // $message = Toastr::success('User Berhasil Dihapus! :)', 'Success');

        // return redirect('/usulan/view/dashboard')->with($message);

        try {
            if($internship->foto) {
                Storage::delete($internship->foto);
            }
            if($internship->surat_pengantar) {
                Storage::delete($internship->surat_pengantar);
            }
            if($internship->proposal) {
                Storage::delete($internship->proposal);
            }
            if($internship->transkip) {
                Storage::delete($internship->transkip);
            }
            if($internship->cv) {
                Storage::delete($internship->cv);
            }
            if($internship->sertifikat) {
                Storage::delete($internship->sertifikat);
            }

            DataMahasiswa::destroy($internship->id);

            Toastr::success('Deleted record successfully :)', 'Success');
            return redirect()->back();
        } catch(\Exception $e) {
            Toastr::error('Deleted record fail :)','Error');
            return redirect()->back();
        }
    }

    public function viewDashboard()
    {
        $users = User::all();
        $students = DataMahasiswa::all();

        return view('home.mahasiswa.list-mahasiswa', compact('users', 'students'));
    }

    public function downloadFile($id, $fileType) {
        $dataMahasiswa = DataMahasiswa::findOrFail($id);

        // Determine the file path based on the file type
        switch ($fileType) {
            case 'surat-pengantar':
                $filePath = $dataMahasiswa->surat_pengantar;
                break;

            case 'proposal':
                $filePath = $dataMahasiswa->proposal;
                break;

            case 'transkip':
                $filePath = $dataMahasiswa->transkip;
                break;

            case 'cv':
                $filePath = $dataMahasiswa->cv;
                break;

            case 'sertifikat':
                $filePath = $dataMahasiswa->sertifikat;
                break;

            // Add cases for other file types (e.g., transkip, cv, sertifikat)

            default:
                abort(404); // Handle unknown file types
        }

        return response()->download(storage_path("app/public/{$filePath}"));
    }
}
