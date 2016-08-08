<?php

namespace App\Http\Controllers;


use App\Device;
use Illuminate\Http\Request;

class DeviceGPSController extends Controller
{

    /**
     * Update the GPS of the smartphone.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'uid' => 'required|exists:devices,uid',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $device = Device::findByUid($request->uid);

        $device->lat = $request->lat;
        $device->lng = $request->lng;
        $device->save();
        return response('GPS Updated', 200);
    }
}
