<?php

namespace App\Http\Controllers;


use App\Device;
use App\Http\Requests\DeviceRequest;

class DeviceController extends Controller
{

    /**
     * Initalize the streaming.
     *
     * @param \App\Http\Requests\DeviceRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(DeviceRequest $request)
    {
        $device = Device::findByUid($request->uid);
        if (!$device) {
            $device = Device::create($request->all());
        }
        $device->startStreaming();
        return response('Start streaming', 200);
    }

    /**
     * Stop the streaming.
     *
     * @param \App\Http\Requests\DeviceRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(DeviceRequest $request)
    {
        $device = Device::findByUid($request->uid);
        if ($device) {
            $device->stopStreaming($device);
        }
        return response('Stop streaming', 200);
    }

}
