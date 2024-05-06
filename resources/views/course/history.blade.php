{{-- Halaman untuk menampilkan history peminjaman barang --}}
@extends('master.app')
@section('breadcumb')
<div class="row py-5">
    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
        <h1 class="display-4 text-white animated zoomIn">Pelatihan</h1>
        <a href="{{url('/dashboard')}}" class="h5 text-white">Home</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="#" class="h5 text-white">History</a>
    </div>
</div>
@endsection
@section('konten')
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-12">
                    
                    <div class="row g-5">
                        <div class="col-md-12">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed table-hover text-nowrap mb-0">
                                      <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>username</th>
                                            <th>No Telpon</th>
                                            <th>Asal Sekolah</th>
                                            <th>Jurusan</th>
                                            <th>Tangga lahir</th>
                                            <th>Kursus</th>
                                            <th>Alamat</th>
                                            <th></th>
                                        </tr>
                                      </thead>
                                        <tbody>
                                            <?php
                                            $no = 1
                                            ?>
                                            @foreach ($course as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->no_telpon }}</td>
                                                    <td>{{ $item->asal_sekolah }}</td>
                                                    <td>{{ $item->jurusan }}</td>
                                                    <td>{{ $item->tgl_lahir}}</td>
                                                    <td>{{ $item->kursus->nama_kursus}}</td>
                                                    <td>{{ $item->alamat}}</td>
                                                    <td>
                                                        <a href="{{route('course.detail', $item->id)}}" 
                                                            class="btn icon btn-warning ms-2" 
                                                            ><i class="bi bi-eye"></i> </a>
                                                        <a href="{{route('course.edit', $item->id)}}" 
                                                            class="btn icon btn-info ms-2" 
                                                            ><i class="bi bi-pencil"></i> </a>
                                                        <a href="{{ route('course.destroy', $item->id) }}"
                                                            class="btn icon btn-danger ms-3">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <br>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-3">
                                {{-- <span>{{ $data->withQueryString()->links() }}</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog list End -->

              
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection