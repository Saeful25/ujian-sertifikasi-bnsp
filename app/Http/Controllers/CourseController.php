<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\kursus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $course;
    public function __construct()
    {
        $this->course = new Course();
    }
    public function history(Request $request)
    {
        //
        // $search = $request->get("search");
        // $batas = 5;
        // $data = DB::table('pinjam')->simplePaginate($batas);
        // $no = $batas * ($data->currentPage() - 1);
        $course = Course::all();
        $kursus = kursus::all();
        $brg = DB::table('course')->simplePaginate(4);
        return view('course.history', compact('kursus', 'course','brg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $kursus = kursus::all();
        return view('course.create', compact('kursus'));
    }
    public function dashboard()
    {
        //
        $user = User::all();
        return view('dashboard',compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'nama' => 'required',
            'no_telpon' => 'required|min:10|max:12',
            'asal_sekolah' => 'required|min:3|max:20',
            'jurusan' => 'required|max:250',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
           

        ];
        $messages = [
            'required' => ':attribute gak boleh kosong ',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
            'max' => ' jumlah :attribute terlalu banyak',
            'min' => 'jumlah :attribute terlalu terlalu sedikit',
        ];
        $this->validate($request, $rules, $messages);
        $this->course->nama = $request->nama;
        $this->course->no_telpon = $request->no_telpon;
        $this->course->asal_sekolah = $request->asal_sekolah;
        $this->course->jurusan = $request->jurusan;
        $this->course->alamat = $request->alamat;
        $this->course->tgl_lahir = $request->tgl_lahir;
        $this->course->kursus_id = $request->kursus;


        $this->course->save();
        Alert::success('Successpull', 'Data Berhasil di Tambahkan');
        return redirect()->route('course');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request ,$id)
    {
        //
        $kursus = kursus::all();
        $data = Course::findOrFail($id);
        return view('course.detail', compact('data', 'kursus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        $kursus = kursus::all();
        $data = Course::findOrFail($id);
        return view('course.edit', compact('data', 'kursus'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $course)
    {
        //
        $update = Course::findOrFail($course);
        $update->nama = $request->nama;
        $update->no_telpon = $request->no_telpon;
        $update->asal_sekolah = $request->asal_sekolah;
        $update->jurusan = $request->jurusan;
        $update->alamat = $request->alamat;
        $update->tgl_lahir = $request->tgl_lahir;
        $update->kursus_id = $request->kursus;
        
        if ($update->isDirty()) {
            $rules = [
                'nama' => 'required',
                'no_telpon' => 'required|min:10|max:12',
                'asal_sekolah' => 'required|min:3|max:20',
                'jurusan' => 'required|max:250',
                'alamat' => 'required|max:255',
                'tgl_lahir' => 'required',
                'kursus' => 'required',
               
    
            ];
            $messages = [
                'required' => ':attribute gak boleh kosong ',
                'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
                'max' => ' jumlah :attribute terlalu banyak',
                'min' => 'jumlah :attribute terlalu terlalu sedikit',
            ];
            $this->validate($request, $rules, $messages);
            $update->nama = $request->nama;
            $update->no_telpon = $request->no_telpon;
            $update->asal_sekolah = $request->asal_sekolah;
            $update->jurusan = $request->jurusan;
            $update->alamat = $request->alamat;
            $update->tgl_lahir = $request->tgl_lahir;
            $update->kursus_id = $request->kursus;
            $update->save();
            Alert::success('Successpull', 'Data Berhasil di Update');
            return redirect()->route('course');
        } else {
            $update->save();
            Alert::warning('Why??', 'Data tidak di Ubah');
            return redirect()->route('course');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $course)
    {
        //
        $data = Course::findOrFail($course);
        $data->delete();
        Alert::success('Successpull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('course');
    }
}
