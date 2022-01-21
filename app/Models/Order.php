<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const DELIVERY = [
        0 => "ежедневная",
        1 => "доставка через день на один день питания",
        2 => "доставка через день на 2 дня питания",
    ];

    const WEEKDAYS = [
        1 => "Пн",
        2 => "Вт",
        3 => "Ср",
        4 => "Чт",
        5 => "Пт",
        6 => "Сб",
        0 => "Вск"
    ];

    protected $fillable = [
        "client_id".
        "ration_name",
        "start_date",
        "end_date",
        "delivery_type",
        "days",
        "comment",
        "create_date"
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getSchedule()
    {
        $result = [];
        $start_date = Carbon::parse($this->start_date);
        $end_date = Carbon::parse($this->end_date);
        if ($this->delivery_type == 0) {
            while ($start_date < $end_date ){
                if (in_array($start_date->dayOfWeek, json_decode($this->days))) {
                    array_push($result, ['date' => $start_date->format("Y-m-d"), 'portions' => 1]);
                }
                $start_date->addDay();
            }
        } elseif ($this->delivery_type == 1) {
            while ($start_date < $end_date ){
                if (in_array($start_date->dayOfWeek, json_decode($this->days))) {
                    array_push($result, ['date' => $start_date->format("Y-m-d"), 'portions' => 1]);
                }
                $start_date->addDays(2);
            }
        } elseif ($this->delivery_type == 2) {
            while ($start_date < $end_date ){
                if (in_array($start_date->dayOfWeek, json_decode($this->days))) {
                    $next_date = $start_date->clone();
                    $next_date->addDay();
                    if (in_array($next_date->dayOfWeek, json_decode($this->days))) {
                        array_push($result, ['date' => $start_date->format("Y-m-d"), 'portions' => 1]);
                    } else {
                        array_push($result, ['date' => $start_date->format("Y-m-d"), 'portions' => 2]);
                    }
                }
                $start_date->addDays(2);
            }
        }
        return $result;
    }
}
