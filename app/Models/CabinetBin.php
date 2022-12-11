<?php

namespace App\Models;

class CabinetBin extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'cabinet_bins';
    protected $fillable = [
        'cabinet_row'
    ];

    public function cabinet()
    {
        return $this->belongsTo(\App\Models\Cabinet::class);
    }
}
