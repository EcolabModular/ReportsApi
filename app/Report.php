<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{


    const REPORTE_URGENTE = 'urgente';
    const REPORTE_REGULAR = 'regular';
    const REPORTE_ARCHIVADO = 'archivado';
    const REPORTE_CANCELADO = 'cancelado';
    const REPORTE_ATENDIDO = 'atendido';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'reportType_id',
    ];

    public function esSolucionado()
    {
        return $this->status == Report::REPORTE_ATENDIDO;
    }

    public function esCancelado()
    {
        return $this->status == Report::REPORTE_CANCELADO;
    }

    public function esUrgente()
    {
        return $this->status == Report::REPORTE_URGENTE;
    }

    public function esArchivado()
    {
        return $this->status == Report::REPORTE_ARCHIVADO;
    }

    public function esRegular()
    {
        return $this->status == Report::REPORTE_REGULAR;
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
