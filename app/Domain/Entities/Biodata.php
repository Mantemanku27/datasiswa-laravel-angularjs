<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Biodata
 * @package App\Domain\Entities
 */
class Biodata extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'nama', 'nis', 'tanggal_lahir', 'jk', 'alamat',
    ];

}
