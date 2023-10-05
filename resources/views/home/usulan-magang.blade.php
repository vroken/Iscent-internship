@extends('home.layouts.homes')

@section('main-container')
{!! Toastr::message() !!}

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('home/assets/img/services-header.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center">
    
            <h2>List Usulan Magang</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Usulan Magang</li>
            </ol>
    
            </div>
        </div><!-- End Breadcrumbs -->

        <section id="services-list" class="services-list">
            <div class="container" data-aos="fade-up">
                <div class="">
                    <a href="/usulan/create" _ngcontent-c30="" class="btn btn-outline-primary" color="warn" style="margin-bottom:12px" type="submit" fdprocessedid="74ynz"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>  Daftar Magang 
                    </a>
                
                    <table _ngcontent-c30="" mdbtable="" class="table">
                        <thead _ngcontent-c30="">
                            <tr >
                                <th >Id Magang </th>
                                <th >Tanggal Pengajuan </th>
                                <th >Tema Magang </th>
                                <th >Periode Magang </th>
                                <th >Status</th>
                                <th >Aksi</th>
                            </tr>
                        </thead><!----><!---->
                        @foreach ($magang as $intern)
                        <tbody _ngcontent-c30="" class="ng-star-inserted">
                                <td>
                                    {{-- @if ($intern->)
                                        {{  }}
                                    @else
                                        <img src="https://source.unsplash.com/featured/" class="card-img-top" alt="" style="width: fill; height: 300px; object-fit: cover;">
                                    @endif --}}
                                    Belum Tergenerate
                                </td>
                                <td>{{ $intern->created_at->diffForHumans() }}</td>
                                <td>{{ $intern->tema }}</td>
                                <td>{{ $intern->internship_start_date }} s/d {{ $intern->internship_end_date }}</td>
                                <td>
                                    @foreach ($users as $key=>$stat)
                                    <div class="edit-delete-btn">
                                        @if ($stat->status === 'Active')
                                            <a class="text-success">{{ $stat->status }}</a>
                                        @elseif ($stat->status === 'Inactive')
                                            <a class="text-warning">{{ $stat->status }}</a>
                                        @elseif ($stat->status === 'Disable')
                                            <a class="text-danger" >{{ $stat->status }}</a>
                                        @endif
                                    </div>
                                    @endforeach
                                </td>
                                <td>
                                    {{-- <div class="actions">
                                        <a href="{{ url('/usulan/edit/'.$stat->user_id) }}"class="btn btn-sm bg-danger-light">
                                            <i class="feather-edit"></i>
                                        </a>
                                        @if (Session::get('role_name') === 'Super Admin')
                                        <a class="btn btn-sm bg-danger-light user_delete" data-bs-toggle="modal" data-bs-target="#deleteUser">
                                            <i class="feather-trash-2 me-1"></i>
                                        </a>
                                        @endif
                                    </div> --}}
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>
@endsection