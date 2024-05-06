@extends('master.app')
@section('breadcumb')
<div class="row py-5">
    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
        <h1 class="display-4 text-white animated zoomIn">Pelatihan</h1>
        <a href="{{url('/dashboard')}}" class="h5 text-white">Home</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="#" class="h5 text-white">Detail</a>
    </div>
</div>
@endsection
@section('konten')
<div class="container-fluid py-5 wow fadeInUp" id="about" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7"> 
                <h5 class="mb-4"> 
                    Nama saya {{$data->nama}}, saya lahir pada tanggal {{$data->tgl_lahir}}  berasal dari {{$data->alamat}} dan lulusan sekolah {{$data->asal_sekolah}} jurusan {{$data->jurusan}}. Saya ingin melanjutkan pendidikan ke jenjang perguruan tinggi dengan mengambil jurusan Ilmu Komputer.
                     Untuk mempersiapkan diri, saya berencana mengikuti kursus digital di bidang {{$data->kursus->nama_kursus}}.</h5>
                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                        style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Silahkan hubungi</h5>
                        <h4 class="text-primary mb-0">{{$data->no_telpon}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
