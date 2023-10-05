<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


@extends('home.layouts.homes')

@section('main-container')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative d-flex flex-column align-items-center">
    
            <h2>Halaman Pengajuan Magang</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Pengajuan Magang</li>
            </ol>
    
            </div>
        </div><!-- End Breadcrumbs -->

        <section id="services-list" class="services-list">
            <div class="container" data-aos="fade-up">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                      <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                Formulir Pendaftaran
                            </div>
                            <div class="card-body">
                                <h5 class="text-muted">Periode Pendaftaran</h5>
                                <div class="border-bottom border-default"></div>
                                <br>
                                <form method="post" action="/usulan" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group d-flex">
                                        <label for="status_mahasiswa" class="col-sm-2 col-form-label">Status Kemahasiswaan:</label>
                                        <div class="col-sm-9 ">
                                            <div class="form-check form-check-inline @error('status_mahasiswa') is-invalid @enderror">
                                                <input class="form-check-input" type="radio" name="status_mahasiswa" id="inlineRadio1" value="Kuliah" @if(old('status_mahasiswa') == 'Kuliah') checked @endif />
                                                <label class="form-check-label" for="inlineRadio1" class="text-muted">Kuliah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_mahasiswa" id="inlineRadio2" value="Lulus Kuliah" @if(old('status_mahasiswa') == 'Lulus Kuliah') checked @endif />
                                                <label class="form-check-label" for="inlineRadio2" class="text-muted">Lulus Kuliah</label>
                                            </div>
                                            @error('status_mahasiswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>                                     
                                    
                                    <div class="form-group d-flex">
                                        <label for="jenis_magang" class="col-sm-2 col-form-label">Jenis Magang :</label>
                                        <div class="col-sm-9">
                                            <div class="form-check form-check-inline @error('jenis_magang') is-invalid @enderror">
                                                <input class="form-check-input" type="radio" name="jenis_magang" id="inlineRadio3" value="Reguler" @if(old('jenis_magang') == 'Reguler') checked @endif/>
                                                <label class="form-check-label" for="inlineRadio3" class="text-muted">Reguler</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_magang" id="inlineRadio4" value="MoU" @if(old('jenis_magang') == 'MoU (Khusus untuk peserta yang masuk dalam program kerja sama magang)') checked @endif/>
                                                <label class="form-check-label" for="inlineRadio4" class="text-muted">MoU (Khusus untuk peserta yang masuk dalam program kerja sama magang)</label>
                                            </div>
                                            @error('jenis_magang')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group d-flex">
                                        <label for="jenjang_pendidikan" class="col-sm-2 col-form-label">Jenjang Pendidikan : </label>
                                        <div class="col-sm-10">
                                            <select class="form-control form-check-inline @error('jenjang_pendidikan') is-invalid @enderror" id="jenjang_pendidikan" name="jenjang_pendidikan">
                                                <option selected>Pilih Jenjang Pendidikan</option>
                                                <option value="D1" {{ old('jenjang_pendidikan') == 'D1' ? "selected" : "D1"}}>D1</option>
                                                <option value="D2" {{ old('jenjang_pendidikan') == 'D2' ? "selected" : "D2"}}>D2</option>
                                                <option value="D3" {{ old('jenjang_pendidikan') == 'D3' ? "selected" : "D3"}}>D3</option>
                                                <option value="D4" {{ old('jenjang_pendidikan') == 'D4' ? "selected" : "D4"}}>D4</option>
                                                <option value="S1" {{ old('jenjang_pendidikan') == 'S1' ? "selected" : "S1"}}>S1</option>
                                                <option value="S2" {{ old('jenjang_pendidikan') == 'S2' ? "selected" : "S2"}}>S2</option>
                                                <option value="S3" {{ old('jenjang_pendidikan') == 'S3' ? "selected" : "S3"}}>S3</option>
                                            </select>
                                            @error('jenjang_pendidikan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group d-flex">
                                        <label for="universitas" class="col-sm-2 col-form-label">Jenis Universitas : </label>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline @error('universitas') is-invalid @enderror">
                                                <input class="form-check-input" type="radio" name="universitas" id="inlineRadio3" value="Dalam Negeri" @if(old('universitas') == 'Dalam Negeri') checked @endif/>
                                                <label class="form-check-label" for="inlineRadio3" class="text-muted">Dalam Negeri</label>
                                            </div>
                                    
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="universitas" id="inlineRadio4" value="Luar Negeri" @if(old('universitas') == 'Luar Negeri') checked @endif/>
                                                <label class="form-check-label" for="inlineRadio4" class="text-muted">Luar Negeri</label>
                                            </div>
                                            @error('universitas')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label for="jurusan" class="col-sm-2 col-form-label">Program Studi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" placeholder="Program Studi Anda Saat Ini" value="{{ old('jurusan') }}">
                                            @error('jurusan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group d-flex ">
                                        <label for="internship_start_date internship_end_date" class="col-sm-2 col-form-label">Periode Magang :</label>
                                        <div class="col-sm-10 d-flex">
                                            <input type="text" class="form-control @error('internship_start_date') is-invalid @enderror" id="tanggal" name="internship_start_date" placeholder="Tanggal Awal Magang" value="{{ old('internship_start_date') }}">
                                            <p class="mt-4">s/d</p>
                                            <input type="text" class="form-control @error('internship_end_date') is-invalid @enderror" id="tanggal2" name="internship_end_date"  placeholder="Tanggal Akhir Magang" value="{{ old('internship_end_date') }}">
                                        </div>
                                        @error('internship_end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group d-flex">
                                        <label for="tema" class="col-sm-2 col-form-label">Tema Magang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('tema') is-invalid @enderror" id="tema" name="tema" placeholder="Tema Magang Yang Akan Anda Lakukan" value="{{ old('tema') }}">
                                        </div>
                                        @error('tema')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <br><br><br>

                                    <h5 class="text-muted">Unggah Berkas</h5>
                                    <div class="border-bottom border-default"></div>
                                    <br>
                                    <div class="form-group d-flex">
                                        <div class="input-group mb-2 mt-3 d-flex">
                                            <label for="surat_pengantar" class="col-sm-2 col-form-label">Surat Pengantar Perguruan Tinggi : </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control @error('surat_pengantar') is-invalid @enderror" id="surat_pengantar" name="surat_pengantar" value="{{ old('surat_pengantar') }}">
                                            </div>
                                            @error('surat_pengantar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <div class="input-group mb-2 mt-3 d-flex">
                                            <label for="proposal" class="col-sm-2 col-form-label">Proposal Magang : </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control @error('proposal') is-invalid @enderror" id="proposal" name="proposal" value="{{ old('proposal') }}">
                                            </div>
                                            @error('proposal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <div class="input-group mb-2 mt-3 d-flex">
                                            <label for="transkip" class="col-sm-2 col-form-label">Transkip Nilai : </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control @error('transkip') is-invalid @enderror" id="transkip" name="transkip" value="{{ old('transkip') }}">
                                            </div>
                                            @error('transkip')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <div class="input-group mb-2 mt-3 d-flex">
                                            <label for="cv" class="col-sm-2 col-form-label">Curiculum Vitae (CV) : </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" value="{{ old('cv') }}">
                                            </div>
                                            @error('cv')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <div class="input-group mb-2 mt-3 d-flex">
                                            <label for="sertifikat" class="col-sm-2 col-form-label">Sertifikat (Jika ada)</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat">
                                            </div>
                                            @error('sertifikat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group d-flex">
                                        <div class="input-group mb-2 mt-3 d-flex">
                                            <label for="foto" class="col-sm-2 col-form-label">Pas Foto : </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="foto" name="foto">
                                            </div>
                                        </div>
                                    </div>

                                    <br><br><br>

                                    <h5 class="text-muted">Penempatan Magang</h5>
                                    <div class="border-bottom border-default"></div>
                                    <br>

                                    <div class="form-group d-flex">
                                        <label for="lokasi_magang" class="col-sm-2 col-form-label">Lokasi Magang : </label>
                                        <div class="col-sm-10">
                                            <select class="form-control form-check-inline @error('lokasi_magang') is-invalid @enderror" id="lokasi_magang" name="lokasi_magang">
                                                <option selected>Pilih Lokasi Magang</option>
                                                <option>Jakarta</option>
                                                <option>Bogor</option>
                                                <option>Depok</option>
                                                <option>Tangerang</option>
                                                <option>Bekasi</option>
                                            </select>
                                            @error('lokasi_magang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label for="role_magang" class="col-sm-2 col-form-label">Role Magang : </label>
                                        <div class="col-sm-10">
                                            <select class="form-control form-check-inline @error('role_magang') is-invalid @enderror" id="role_magang" name="role_magang">
                                                <option selected>Pilih Role Magang</option>
                                                <option>Software Engineer</option>
                                                <option>Data Science</option>
                                                <option>Machine Learning</option>
                                                <option>Cyber Security</option>
                                                <option>Network Engineer</option>
                                            </select>
                                            @error('role_magang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </section>

    </main>

    <script>
        $(document).ready(function(){
          $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',  // Sesuaikan format tanggal sesuai kebutuhan
            autoclose: true
          });
        });
        $(document).ready(function(){
          $('#tanggal2').datepicker({
            format: 'yyyy-mm-dd',  // Sesuaikan format tanggal sesuai kebutuhan
            autoclose: true
          });
        });
      </script>
      
      
@endsection