<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Mockery\Expectation;
use Mail;
use App\Mail\FacultyMail;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::orderBy('id','ASC')->get();

        return view('facultyCRUD.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facultyCRUD.create');
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
            'nama_fakultas'=>'required',
        ]);

        Faculty::create($request->all());

        return redirect()->route('faculties.index')
        ->with('success','item created successfully');
        
        //Mengirimkan Email
        try {
            $detail=[
                'body'=>$request->nama_fakultas,
            ];
            Mail::to('akbar_hamonangan_lubis@teknokrat.ac.id')->send(new FacultyMail($detail));
            // Redirect Jika Sukses Menyimpan Data
            return redirect()->route('faculties.index')
            ->with('Berhasil!','Item Berhasil Dibuat');

        } catch (Exception $e) {
            return redirect()->route('faculties.index')->with('Berhasil!','Item Berhasil Dibuat Namun Tidak Berhasil dikirim ke Email');

        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Cari Berdasarkan ID
        $faculties = Faculty::find($id);

        // Menampilkan View menyertakan data faculty
        return view('FacultyCRUD.show',compact('faculties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculties = Faculty::find($id);
        
        return view('FacultyCRUD.edit',compact('faculties'));
        
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
            'nama_fakultas' => 'required',
        ]);

        Faculty::find($id) ->update($request->all());

        return redirect()->route('faculties.index')
                        ->with('success','Item Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::find($id)->delete();

        return redirect()->route('faculties.index')
                        ->with('success','Item Deleted Succesfully');
    }
 

}
