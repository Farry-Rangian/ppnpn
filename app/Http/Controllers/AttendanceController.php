<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::with('user')->get();
        // print_r($attendance);exit;
        return view('attendances.index', compact('attendance'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        // $userLat = $request->latitude;
        // $userLng = $request->longitude;

        $userLat = 0.5353867646391146;
        $userLng = 123.07489920846776;

        $officeLat = 0.5355092;
        $officeLng = 123.0749472;
        $maxDistanceMeters = 238.4664394;

        $distance = $this->calculateDistance($officeLat, $officeLng, $userLat, $userLng);

        // print_r($distance);exit;

        if ($distance > $maxDistanceMeters) {
            return response()->json([
                'message' => 'Kamu berada di luar area kantor. Jarakmu: ' . round($distance, 2) . ' meter.'
            ], 403);
        }

        // print_r($request->all());exit;
        Attendance::storePresensi($request->all());
        return redirect()->route('attendances.index');
    }

    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371000; // meters

        $lat1Rad = deg2rad($lat1);
        $lat2Rad = deg2rad($lat2);
        $deltaLat = deg2rad($lat2 - $lat1);
        $deltaLng = deg2rad($lng2 - $lng1);

        $a = sin($deltaLat/2) * sin($deltaLat/2) +
             cos($lat1Rad) * cos($lat2Rad) *
             sin($deltaLng/2) * sin($deltaLng/2);
             
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $earthRadius * $c;
    }
}
