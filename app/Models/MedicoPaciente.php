<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicoPaciente extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'medico_paciente';
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'medico_id',
        'paciente_id'
    ];

    
    /**
     * Relationships
     */

    public function paciente(){

        return $this->hasOne(Pacientes::class, 'id', 'paciente_id');
    }

    public function medico(){

        return $this->hasOne(Medicos::class, 'id', 'medico_id');
    }
}
