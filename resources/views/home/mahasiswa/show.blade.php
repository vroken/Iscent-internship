
@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            
                        <li class="breadcrumb-item active">Data {{ $mahasiswa->user ? $mahasiswa->user->name : 'No user' }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between mb-4">
                                            <span>Personal Details</span>
                                            <a class="edit-link" data-bs-toggle="modal"
                                                href="#edit_personal_details"><i
                                                    class="far fa-edit me-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Nama Lengkap : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->user ? $mahasiswa->user->name : 'No user' }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Email : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->user ? $mahasiswa->user->email : 'No email' }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">No Telpon : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->user->phone_number }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Jenis Kelamin : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->user->gender }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Alamat : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->user ? $mahasiswa->user->address : 'No Address' }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Tanggal Lahir : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->user ? $mahasiswa->user->date_of_birth : 'Tidak Terisi' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between mb-4">
                                            <span>Detail Pendaftaran</span>
                                            <a class="edit-link" data-bs-toggle="modal"
                                                href="#edit_personal_details"><i
                                                    class="far fa-edit me-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Status Mahasiswa : </p>
                                                
                                            <p class="col-sm-9">{{ $mahasiswa->status_mahasiswa }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Jenis Magang : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->jenis_magang }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Pendidikan : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->jenjang_pendidikan }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Jenjang Pendidikan : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->universitas }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Jurusan : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->jurusan }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Mulai Magang : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->internship_start_date }} s/d {{ $mahasiswa->internship_end_date }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Tema Magang : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->tema }}</p>
                                        </div>
                                        <div class="row mb-3">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Surat Pengantar : </p>
                                            <a class="col-sm-9" href="{{ Storage::url($mahasiswa->surat_pengantar) }}" target="_blank">Download PDF</a>
                                        </div>
                                        <div class="row mb-3">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Proposal : </p>
                                            <a class="col-sm-9" href="{{ Storage::url($mahasiswa->proposal) }}" target="_blank">Download PDF</a>
                                        </div>
                                        <div class="row mb-3">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Transkip : </p>
                                            <a class="col-sm-9" href="{{ Storage::url($mahasiswa->transkip) }}" target="_blank">Download PDF</a>
                                        </div>
                                        <div class="row mb-3">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Curiculum Vitae (CV) : </p>
                                            <a class="col-sm-9" href="{{ Storage::url($mahasiswa->cv) }}" target="_blank">Download PDF</a>
                                        </div>
                                        <div class="row mb-3">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Sertifikat : </p>
                                            <a class="col-sm-9" href="{{ Storage::url($mahasiswa->sertifikat) }}" target="_blank">Download PDF</a>
                                        </div>
                                        <div class="row mb-3">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Foto : </p>
                                            <a class="col-sm-9" href="{{ Storage::url($mahasiswa->foto) }}" target="_blank">Download PDF</a>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Lokasi Magang : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->lokasi_magang }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 ">Role Magang : </p>
                                            <p class="col-sm-9">{{ $mahasiswa->role_magang }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="{{ route('change/password') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}">
                                                @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}">
                                                @error('new_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" value="{{ old('new_confirm_password') }}">
                                                @error('new_confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
