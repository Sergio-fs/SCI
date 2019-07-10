<?php

namespace App\Http\Controllers; 

use App\Cedula;
use Carbon\Carbon;
use Codedge\Fpdf\Facades\Fpdf;
//use Setasign\Tfpdf\Facades\Tfpdf;
use App\Http\Requests\CedulaRequest;


class CedulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cedulas = Cedula::whereRaw('extract(month from fechaRep) = ?', [Carbon::now()->month])->paginate(15);
        return view('fichas.cedulas.index', ['cedulas' => $cedulas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fichas.cedulas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CedulaRequest $request)
    {
        $imageName = $request->get('numeroCed').$request->get('apellidoPat').$request->get('apellidoMat').".".request()->foto->getClientOriginalExtension();
        
        //$request->merge(['archivo' => strval($imageName)]);
        //return $request; 
        //Cedula::create($request->all());

        Cedula::create([
            'fechaDes' => $request->get('fechaDes'),
            'fechaRep' => $request->get('fechaRep'),
            'edad' => $request->get('edad'),
            'estatura' => $request->get('estatura'),
            'peso' => $request->get('peso'),
            'apellidoPat' => $request->get('apellidoPat'),
            'apellidoMat' => $request->get('apellidoMat'),
            'nombres' => $request->get('nombres'),
            'mediaFil' => $request->get('mediaFil'),
            'vestimenta' => $request->get('vestimenta'),
            'señasPar' => $request->get('señasPar'),
            'ultimoAvi' => $request->get('ultimoAvi'),
            'numeroCed' => $request->get('numeroCed'),
            'nombreArch' => $imageName
            ]);
        request()->foto->move(public_path('images'), $imageName);
        return redirect()->route('cedula.index')->withStatus(__('Cedula registrada correctamente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('fichas.cedulas.edit', compact('user'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cedula = Cedula::find($id);
        $cedula->delete();
        return redirect()->route('cedula.index')->withStatus(__('Ceduña eliminada correctamente'));
    }

    /**
     * Genera reporte pdf de una cedula registrada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response, PDF file
     */
    public function pdf($id)
    {  
        $cedula = Cedula::find($id); 
        $pathFile = storage_path(). '/recipe.pdf';
        Fpdf::AddPage('L', array(110,210));
        Fpdf::Image("images/cedula.jpg",0,0,210,110);
        Fpdf::Image("images/".$cedula->nombreArch,7,8.5,51.5, 68);
        Fpdf::SetFont('Arial','B',8);
        Fpdf::Text(180, 6, utf8_decode (ucwords(date("d/m/Y", strtotime($cedula->fechaDes)))));
        Fpdf::Text(180, 9.7, utf8_decode (ucwords(date("d/m/Y", strtotime($cedula->fechaDes)))));
        Fpdf::Text(180, 13.5, utf8_decode ($cedula->numeroCed));
        Fpdf::SetFont('Arial','B',17);
        Fpdf::Text(87.5, 23, utf8_decode (ucwords($cedula->nombres)." ".ucwords($cedula->apellidoPat)." ".ucwords($cedula->apellidoMat)));
        Fpdf::SetFont('Arial','B',8);
        Fpdf::Text(84, 29, utf8_decode(ucwords($cedula->edad)." años"));
        Fpdf::Text(115, 29, ucwords($cedula->estatura)." m");
        Fpdf::Text(140, 29, ucwords($cedula->peso)." kg");
        Fpdf::setY(37);
        Fpdf::Cell(64.2);
        Fpdf::MultiCell(126,2.6,utf8_decode($cedula->mediaFil),0,2,'');
        Fpdf::setY(53);
        Fpdf::Cell(64.2);
        Fpdf::MultiCell(126,2.6,utf8_decode("Vestimenta: ".$cedula->vestimenta),0,2,'');
        Fpdf::setY(66.1);
        Fpdf::Cell(64.2);
        Fpdf::MultiCell(126,2.6,utf8_decode($cedula->señasPar),0,2,'');
        Fpdf::setY(80.4);
        Fpdf::Cell(64.2);
        Fpdf::MultiCell(126,2.6,utf8_decode($cedula->ultimoAvi),0,2,'');
        Fpdf::Output('F', $pathFile);
        $headers = ['Content-Type' => 'application/pdf'];
        return response()->file($pathFile, $headers);
    }
}
