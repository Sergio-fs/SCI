<?php

namespace App\Http\Controllers; 

use App\Cedula;
use Carbon\Carbon;
use Codedge\Fpdf\Facades\Fpdf;
//use Imagick;
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

        $cedulas = Cedula::whereRaw('extract(month from fechaRep) = ?', [Carbon::now()->month])->paginate(30);
        $conteoMensual =  $cedulas->count();
        $conteoDiario =  Cedula::whereRaw('extract(day from fechaRep) = ?', [Carbon::now()->day])->count();
        return view('fichas.cedulas.index', ['cedulas' => $cedulas, 'conteoDiario' => $conteoDiario, 'conteoMensual' => $conteoMensual]);
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
        $cedula = new Cedula;
        $cedula->fechaDes = $request->get('fechaDes');
        $cedula->fechaRep = $request->get('fechaRep');
        $cedula->edad = $request->get('edad');
        $cedula->estatura = $request->get('estatura');
        $cedula->peso = $request->get('peso');
        $cedula->apellidoPat = $request->get('apellidoPat');
        $cedula->apellidoMat = $request->get('apellidoMat');
        $cedula->nombres = $request->get('nombres');
        $cedula->mediaFil = $request->get('mediaFil');
        $cedula->vestimenta = $request->get('vestimenta');
        $cedula->señasPar = $request->get('señasPar');
        $cedula->ultimoAvi = $request->get('ultimoAvi');
        $cedula->numeroCed = $request->get('numeroCed');
        $cedula->nombreArch = $imageName;
        $cedula->municipio_id = $request->get('municipio');     
        if ($cedula->municipio_id != null) {
            $cedula->region_id = $cedula->municipio->region_id;
        }else{
            $cedula->region_id = $request->get('region');
        }
        $cedula->save();
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
        $cedula = Cedula::find($id);
        return view('fichas.cedulas.show', ['cedula' => $cedula]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cedula = Cedula::find($id);
        return view('fichas.cedulas.edit', ['cedula' => $cedula]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CedulaRequest $request, $id)
    {
        $cedula = Cedula::find($id);
        $cedula->fill ($request->all())->save();
        return redirect()->route('cedula.show', $id)->withStatus(__('Cedula actualizada correctamente'));
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
     * Marcar cedula como localizada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function localizar($id)
    {
        $cedula = Cedula::find($id);
        $cedula->localizada = true;
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
        Fpdf::Text(87.5, 23, utf8_decode (ucwords($cedula->nombres." ".$cedula->apellidoPat." ".$cedula->apellidoMat)));
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
        //Lee PDF pendiente a instalar expencion imagik
        //Imagick::readImage(storage_path(). '/recipe.pdf');
        // Escribe imagen
        //return Imagick::writeImages('converted_page_one.jpg');
        return response()->file($pathFile, $headers);
    }
}
