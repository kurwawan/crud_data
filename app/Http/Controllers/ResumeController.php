<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari_keyword = $request->get('cari_keyword');
        // ngambil seluruh data
        $resumes = Resume::all();

        if ($cari_keyword) {
            $resumes = Resume::where("name", "LIKE", "%$cari_keyword%")->get();
        }
        return view('resume.index', compact('resumes'));
        // return view('resume.index', ['resumes'=>$resumes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resume.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:50',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns'
        ]);

        $resume = new Resume([
            'name' => $request->input('nama_lengkap'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('alamat')
        ]);

        // $resume = new Resume;
        // $resume->name = $request->input('nama_lengkap');
        // $resume->phone = $request->input('no_hp');
        // $resume->email = $request>-input('email');
        // $resume->address = $request->input('alamat');
        $resume->save();
        return redirect('/')->with('success', 'Data Berhasil di Simpan');      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resume = Resume::find($id);
        return view('resume.edit', compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:50',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns'
        ]);

        $resume = Resume::find($id);
        $resume->name = $request->input('nama_lengkap');
        $resume->phone = $request->input('phone');
        $resume->email = $request->input('email');
        $resume->address = $request->input('alamat');        
        $resume->save();
        return redirect('/')->with('updatesuccess', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resume = Resume::find($id);
        $resume->delete();
        return redirect('/')->with('success', 'Data Berhasil di Hapus');
    }

    public function pdf() {
        $resumes = Resume::all();

        // $data['judul'] = "Dafta List";
        $pdf = \PDF::loadView('resume.pdf', ['resumes'=>$resumes]);

        // ngambil seluruh data
        
        // return view('resume.index', compact('resumes'));
        return $pdf->download('laporan.pdf');
    }
}
