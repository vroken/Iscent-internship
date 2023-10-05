
@extends('layouts.app')
@section('content')
    <div class="login-right">
        <div class="login-right-wrap">
            <h1>Register Account</h1>
            <p class="account-subtitle">Silahkan regristasi terlebih dahulu</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Lengkap <span class="login-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                </div>
                <div class="form-group">
                    <label>Email <span class="login-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon <span class="login-danger">*</span></label>
                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number">
                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                </div>
                <div class="form-group calendar-icon">
                    <label>Tanggal Lahir<span class="login-danger">*</span></label>
                    <input class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text" placeholder="DD-MM-YYYY" value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap <span class="login-danger">*</span></label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter address" value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- insert defaults --}}
                {{-- <input type="hidden" class="image" name="image" value="photo_defaults.jpg"> --}}
                <div class="form-group local-forms">
                    <label>Jenis Kelamin <span class="login-danger">*</span></label>
                    <select class="form-control select  @error('gender') is-invalid @enderror" name="gender">
                        <option selected disabled>Pilih Jenis Kelamin</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? "selected" :"Perempuan"}}>Perempuan</option>
                        <option value="Laki-Laki" {{ old('gender') == 'Laki-Laki' ? "selected" :""}}>Laki-Laki</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Password <span class="login-danger">*</span></label>
                    <input type="password" class="form-control pass-input  @error('password') is-invalid @enderror" name="password">
                    <span class="profile-views feather-eye toggle-password"></span>
                </div>
                <div class="form-group">
                    <label>Confirm password <span class="login-danger">*</span></label>
                    <input type="password" class="form-control pass-confirm @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                    <span class="profile-views feather-eye reg-toggle-password"></span>
                </div>
                <div class=" dont-have">Already Registered? <a href="{{ route('login') }}">Login</a></div>
                <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
