pp<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/pdfjs-dist@2.11.337/build/pdf_viewer.css">
<script src="https://unpkg.com/pdfjs-dist@2.11.337/build/pdf_viewer.js"></script>



@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Edit User</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="time-table.html">Users</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/usulan/{{ $update->id }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                                {{-- <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Edit Personal User</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nama Lengkap <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" value="{{ $update->user->name }}">
                                            <input type="hidden" class="form-control" name="user_id" value="{{ $update->user->user_id }}">
                                            @error('name')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('email')is-invalid @enderror" name="email" value="{{ $update->user->email }}">
                                            @error('email')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Phone Number <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('phone_number')is-invalid @enderror" name="phone_number" value="{{ $update->user->phone_number }}">
                                            @error('phone_number')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Jenis Kelamin <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('gender')is-invalid @enderror" name="gender">
                                                <option disabled>Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki" {{ $update->user->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                <option value="Perempuan" {{ $update->user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('gender')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Alamat<span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('address')is-invalid @enderror" name="address" value="{{ $update->user->address }}">
                                            @error('address')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Status Magang<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('status')is-invalid @enderror" name="status">
                                                <option disabled>Select Status</option>
                                                <option value="Active" {{ $update->user->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Disable" {{ $update->user->status == 'Disable' ? 'selected' : '' }}>Disable</option>
                                                <option value="Inactive" {{ $update->user->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Profile <span class="login-danger">*</span></label>
                                            <img src="{{ Storage::url($update->foto) }}" alt="..." class="img-thumbnail img-preview img-fluid col-sm-7">
                                            <input type="file" class="form-control @error('foto')is-invalid @enderror" id="image" name="foto" value="{{ $update->user }}" onchange="previewImage()">
                                            @error('foto')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Edit Detail Pendaftaran</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Status Mahasiswa <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('status_mahasiswa')is-invalid @enderror" name="status_mahasiswa">
                                                <option disabled>Select Status</option>
                                                <option value="Kuliah" {{ $update->status_mahasiswa == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                                                <option value="Lulus Kuliah" {{ $update->status_mahasiswa == 'Lulus Kuliah' ? 'selected' : '' }}>Lulus Kuliah</option>
                                            </select>
                                            @error('status_mahasiswa')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Jenis Magang <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('jenis_magang')is-invalid @enderror" name="jenis_magang">
                                                <option disabled>Pilih Jenis Magang</option>
                                                <option value="Reguler" {{ $update->jenis_magang == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                                <option value="Non Reguler" {{ $update->jenis_magang == 'Non Reguler' ? 'selected' : '' }}>Non Reguler</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Jenjang Pendidikan<span class="login-danger @error('jenjang_pendidikan')is-invalid @enderror">*</span></label>
                                            <select class="form-control select" name="jenjang_pendidikan">
                                                <option disabled>Pilih Jenjang Pendidikan</option>
                                                <option value="D1" {{ $update->jenjang_pendidikan == 'D1' ? 'selected' : '' }}>D1</option>
                                                <option value="D2" {{ $update->jenjang_pendidikan == 'D2' ? 'selected' : '' }}>D2</option>
                                                <option value="D3" {{ $update->jenjang_pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                                                <option value="D4" {{ $update->jenjang_pendidikan == 'D4' ? 'selected' : '' }}>D4</option>
                                                <option value="S1" {{ $update->jenjang_pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2" {{ $update->jenjang_pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3" {{ $update->jenjang_pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                            @error('jenjang_pendidikan')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Jenis Universitas<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('universitas')is-invalid @enderror" name="universitas">
                                                <option disabled>Pilih Jenis Universitas</option>
                                                <option value="Dalam Negeri" {{ $update->universitas == 'Dalam Negeri' ? 'selected' : '' }}>Dalam Negeri</option>
                                                <option value="Luar Negeri" {{ $update->universitas == 'Luar Negeri' ? 'selected' : '' }}>Luar Negeri</option>
                                            </select>
                                            @error('universitas')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Jurusan <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('jurusan')is-invalid @enderror" name="jurusan" value="{{ $update->jurusan }}">
                                            @error('jurusan')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Tema <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('tema')is-invalid @enderror" name="tema" value="{{ $update->tema }}">
                                            @error('tema')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Tanggal Mulai Magang<span class="login-danger">*</span></label>
                                            <div class = "col-12">  
                                                <div class="row">
                                                    <input class="form-control @error('internship_start_date')is-invalid @enderror" type = "date" name = "internship_start_date" value="{{ $update->internship_start_date }}">  
                                                    @error('internship_start_date')
                                                        <small class="invalid-feedback">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Tanggal Akhir Magang<span class="login-danger">*</span></label>
                                            <div class = "col-12">  
                                                <div class = "row">  
                                                   <input class="form-control @error('internship_end_date')is-invalid @enderror" type = "date" name = "internship_end_date" value="{{ $update->internship_end_date }}">  
                                                   @error('internship_end_date')
                                                    <small class="invalid-feedback">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                </div>  
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <input type="hidden" name="oldFile" value="{{ $update->surat_pengantar }}">
                                            <label>File Surat Pengantar <span class="login-danger">*</span></label>
                                            <input type="file" class="form-control @error('surat_pengantar')is-invalid @enderror" name="surat_pengantar" value="{{ $update->surat_pengantar }}">
                                            @if ($update->surat_pengantar)
                                                <span class="text-success">File Tersedia</span>
                                            @else
                                                <span class="login-danger">File Tidak Tersedia</span>
                                            @endif
                                            @error('surat_pengantar')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <input type="hidden" name="oldFile" value="{{ $update->proposal }}">
                                            <label>File Proposal <span class="login-danger">*</span></label>
                                            <input type="file" class="form-control @error('proposal')is-invalid @enderror" name="proposal" value="{{ $update->proposal }}">
                                            @if ($update->proposal)
                                                <span class="text-success">File Tersedia</span>
                                            @else
                                                <span class="login-danger">File Tidak Tersedia</span>
                                            @endif
                                            @error('proposal')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <input type="hidden" name="oldFile" value="{{ $update->transkip }}">
                                            <label>File Transkip Nilai <span class="login-danger">*</span></label>
                                            <input type="file" class="form-control @error('transkip')is-invalid @enderror" name="transkip" value="{{ $update->transkip }}">
                                            @if ($update->transkip)
                                                <span class="text-success">File Tersedia</span>
                                            @else
                                                <span class="login-danger">File Tidak Tersedia</span>
                                            @endif
                                            @error('transkip')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <input type="hidden" name="oldFile" value="{{ $update->cv }}">
                                            <label>File Curiculum Vitae (CV) <span class="login-danger">*</span></label>
                                            <input type="file" class="form-control @error('cv')is-invalid @enderror" name="cv" value="{{ $update->cv }}">
                                            @if ($update->cv)
                                                <span class="text-success">File Tersedia</span>
                                            @else
                                                <span class="login-danger">File Tidak Tersedia</span>
                                            @endif
                                            @error('cv')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <input type="hidden" name="oldFile" value="{{ $update->sertifikat }}">
                                            <label>File Sertifikat <span class="login-danger">*</span></label>
                                            <input type="file" class="form-control @error('sertifikat')is-invalid @enderror" name="sertifikat" value="{{ $update->sertifikat }}">
                                            @if ($update->sertifikat)
                                                <span class="text-success">File Tersedia</span>
                                            @else
                                                <span class="login-danger">File Tidak Tersedia</span>
                                            @endif
                                            @error('sertifikat')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Lokasi Magang<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('lokasi_magang')is-invalid @enderror" name="lokasi_magang">
                                                <option disabled>Pilih Lokasi Magang</option>
                                                <option value="Jakarta" {{ $update->lokasi_magang == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                                <option value="Bogor" {{ $update->lokasi_magang == 'Bogor' ? 'selected' : '' }}>Bogor</option>
                                                <option value="Depok" {{ $update->lokasi_magang == 'Depok' ? 'selected' : '' }}>Depok</option>
                                                <option value="Tangerang" {{ $update->lokasi_magang == 'Tangerang' ? 'selected' : '' }}>Tangerang</option>
                                                <option value="Bekasi" {{ $update->lokasi_magang == 'Bekasi' ? 'selected' : '' }}>Bekasi</option>
                                            </select>
                                            @error('lokasi_magang')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Role Magang<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('role_magang')is-invalid @enderror" name="role_magang">
                                                <option disabled>Pilih Role Magang</option>
                                                <option value="Software Engineer" {{ $update->role_magang == 'Software Engineer' ? 'selected' : '' }}>Software Engineer</option>
                                                <option value="Data Science" {{ $update->role_magang == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                                                <option value="Machine Learning" {{ $update->role_magang == 'Machine Learning' ? 'selected' : '' }}>Machine Learning</option>
                                                <option value="Cyber Security" {{ $update->role_magang == 'Cyber Security' ? 'selected' : '' }}>Cyber Security</option>
                                                <option value="Network Engineer" {{ $update->role_magang == 'Network Engineer' ? 'selected' : '' }}>Network Engineer</option>
                                            </select>
                                            @error('role_magang')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <input type="hidden" name="oldImage" value="{{ $update->foto }}">
                                            <label>Profile <span class="login-danger">*</span></label>
                                            <img src="{{ Storage::url($update->foto) }}" alt="..." class="img-thumbnail img-preview img-fluid col-sm-7">
                                            <input type="file" class="form-control @error('foto')is-invalid @enderror" id="image" name="foto" value="{{ $update->user }}" onchange="previewImage()">
                                            @error('foto')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
    <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script>

        function previewImage() {
            const image = document.querySelector('#image');
            const imgpreview = document.querySelector('.img-preview');
    
            imgpreview.style.display = 'block';
    
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
    
            ofReader.onload = (oFREvent) => {
                imgpreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
