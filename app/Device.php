<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * Fillable fields.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'ip', 'port', 'lat', 'lng', 'status'
    ];

    /**
     * Return the device that has the given uid.
     * @param $uid
     * @return mixed
     */
    public static function findByUid($uid)
    {
        return self::where('uid', $uid)->get()->first();
    }

    /**
     * Update the value of the status to true
     * So the app can start listening the images
     * that the phone server is sending.
     */
    public function startStreaming()
    {
        $this->status = true;
        $this->save();
    }

    /**
     * Update the status to false, so we are not
     * going to keep the connection to this device.
     */
    public function stopStreaming()
    {
        $this->status = false;
        $this->save();
    }
}
