<?php

namespace App\Http\Controllers;

use App\Report;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return reports list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();

        return $this->showAll($reports);

        //return $this->successResponse($reports);
    }

    /**
     * Create an instance of Report
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|in:' . Report::REPORTE_URGENTE . ',' . Report::REPORTE_REGULAR,
            'reportType_id' => 'required|in:' . Report::REPORTE_PREVENTIVO . ',' . Report::REPORTE_CORRECTIVO . ',' . Report::REPORTE_PREDICTIVO,
        ];

        $this->validate($request, $rules);

        $Report = Report::create($request->all());

        return $this->successResponse($Report, Response::HTTP_CREATED);
    }

    /**
     * Return an specific Report
     * @return Illuminate\Http\Response
     */
    public function show($Report)
    {
        $Report = Report::findOrFail($Report);

        return $this->successResponse($Report);
    }

    /**
     * Update the information of an existing Report
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $Report)
    {
        $rules = [
            'name' => 'max:255',
            'description' => 'max:255',
            'status' => 'required|in:' . Report::REPORTE_CANCELADO . ',' . Report::REPORTE_REGULAR . ',' . Report::REPORTE_URGENTE . ',' . Report::REPORTE_ARCHIVADO . ',' . Report::REPORTE_ATENDIDO,
            'reportType_id' => 'required|in:' . Report::REPORTE_PREVENTIVO . ',' . Report::REPORTE_CORRECTIVO . ',' . Report::REPORTE_PREDICTIVO,
        ];

        $this->validate($request, $rules);

        $Report = Report::findOrFail($Report);

        if($Report->esCancelado())
        {
            return $this->errorResponse('El reporte ha sido cancelado y no puede ser modificado', 409);
        }

        if($Report->esArchivado())
        {
            return $this->errorResponse('El reporte ha sido archivado y no puede ser modificado', 409);
        }

        if($Report->essolucionado())
        {
            return $this->errorResponse('El reporte ha sido atendido y no puede ser modificado', 409);
        }

        $Report->fill($request->all());



        if ($Report->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $Report->save();

        return $this->successResponse($Report);
    }

    /**
     * Removes an existing Report
     * @return Illuminate\Http\Response
     */
    public function destroy($report)
    {
        $Report = Report::findOrFail($report);

        $Report->delete();

        return $this->successResponse($Report);
    }
}
