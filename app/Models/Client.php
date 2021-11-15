<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class Client extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['name', 'email', 'fone', 'city','uf'];

    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }


    public function onlyNumbers(string $value): string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }

    public function setFoneAttribute($value)
    {
        $this->attributes['fone'] = $this->onlyNumbers($value);
    }
}
