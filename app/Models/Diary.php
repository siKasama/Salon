<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Diary extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['client_id', 'service_id', 'date', 'hour', 'status', 'observations'];

    public function getCreatedAtAttribute($value): string
    {
        return $this->dateToBr($value);
    }

    /**
     * @param $value
     * @return string
     * @throws \Exception
     */
    public function getDateBrAttribute(): string
    {
        $date = $this->attributes['date'];

        return $this->dateToBr($date);
    }

    /**
     * @param $value
     * @return string
     * @throws \Exception
     */
    public function getDateToHtmlAttribute($value): string
    {
       return (new Carbon($this->attributes['date']))->format('Y-m-d\TH:i');
    }

  

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @param $value
     * @return string
     * @throws \Exception
     */
    public function dateToBr($value): string
    {
        return (new \DateTime($value))->format('d/m/Y H:i:s');
    }


}
