<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Cabinet extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cabinet';

    protected $fillable = [
        'description', 'rows'
    ];

    public function bins() {
        return $this->hasMany(CabinetBin::class);
    }
}
