<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use Datatables;

// use App\Http\Requests\StoreKamarRequest;
// use App\Http\Requests\UpdateKamarRequest;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamars = Kamar::orderBy('created_at', 'DESC')->get();
        return view('admin.kamar',compact('kamars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambahkamar');
    }

    public function tambahkamar()
    {
        return view('admin.tambahkamar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipekamar' => 'required',
            'jmlkamar' => 'required',
            'hargakamar' => 'required',
            'gambar' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,zip|max:2048',
        ]);
        $image= time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $image);
       
        $post = new Kamar;
        $post->tipe_kamar = $request->tipekamar;
        $post->jml_kamar = $request->jmlkamar;
        $post->harga = $request->hargakamar;
        $post->gambar = $image;
        $post->save();
                     
        return redirect()->route('kamar.index')
                          ->with('success','Kamar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
       
        return view('admin.editkamar',compact('kamar'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKamarRequest  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if ($request->hasFile('gambar')){
            $request->validate([
                'tipekamar' => 'required',
                'jmlkamar' => 'required',
                'hargakamar' => 'required',
                'gambar' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,zip|max:2048',
            ]);
    
        $image= time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $image);
    
        $kamar = Kamar::findOrFail($id);
    
        $kamar->tipe_kamar = $request->tipekamar;
        $kamar->jml_kamar = $request->jmlkamar;
        $kamar->harga = $request->hargakamar;
        $kamar->gambar = $image;
        $kamar->save();

        }else {
            $kamar = Kamar::findOrFail($id);
    
            $kamar->tipe_kamar = $request->tipekamar;
            $kamar->jml_kamar = $request->jmlkamar;
            $kamar->harga = $request->hargakamar;
            $kamar->gambar = $kamar->gambar;
            $kamar->save();
        }

        return redirect()->route('kamar.index')->with('succes','Data kamar Berhasil di Hapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('succes','Data kamar Berhasil di Hapus');
    }
}
