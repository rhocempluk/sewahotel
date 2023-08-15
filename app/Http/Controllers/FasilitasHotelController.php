<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use Datatables;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fashos = FasilitasHotel::orderBy('created_at', 'DESC')->get();
        return view('admin.fasilitashotel',compact('fashos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.tambahfasilitashotel');
        //dd($tipekmr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFasilitasKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fasilitas' => 'required',
            'gambar' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,zip|max:2048',
        ]);
        $image= time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $image);
       
        $post = new FasilitasHotel;
        $post->nama_fasilitas = $request->fasilitas;
        $post->gambar = $image;
        $post->save();
                     
        return redirect()->route('fasilitashotel.index')
                          ->with('success','Fasilitas Hotel created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasHotel $fasilitashotel)
    {
        return view('admin.editfasilitashotel',compact('fasilitashotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasKamarRequest  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('gambar')){
            $request->validate([
                'fasilitas' => 'required',
                'gambar' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,zip|max:2048',
            ]);
    
        $image= time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $image);
    
        $hotel = FasilitasHotel::findOrFail($id);
    
        $hotel->nama_fasilitas = $request->fasilitas;
        $hotel->gambar = $image;
        $hotel->save();

        }else {
        $hotel = FasilitasHotel::findOrFail($id);
    
        $hotel->nama_fasilitas = $request->fasilitas;
        $hotel->gambar = $hotel->gambar;
        $hotel->save();
        }

        return redirect()->route('fasilitashotel.index')->with('succes','Data Fasilitas Hotel Berhasil di Hapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasHotel $fasilitashotel)
    {
        $fasilitashotel->delete();
        return redirect()->route('fasilitashotel.index')->with('succes','Data kamar Berhasil di Hapus');
    }
}
