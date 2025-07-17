<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Presensi</h1>

    <form id="presensiForm" method="POST" action="{{ route('attendances.store') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
        <button type="submit">Check In</button>
    </form>

    <h2>Daftar Presensi</h2>
    <ul>
        @foreach ($attendance as $item)
            <li>{{ $item->user->name }} - Check In: {{ $item->check_in }}</li>
        @endforeach
    </ul>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        document.getElementById("latitude").value = position.coords.latitude;
                        document.getElementById("longitude").value = position.coords.longitude;
                    },
                    function (error) {
                        alert("Gagal mendeteksi lokasi. Aktifkan izin lokasi di browser.");
                    }
                );
            } else {
                alert("Browser kamu tidak mendukung fitur lokasi.");
            }

            document.getElementById("presensiForm").addEventListener("submit", function (e) {
                const lat = document.getElementById("latitude").value;
                const lng = document.getElementById("longitude").value;

                if (!lat || !lng) {
                    e.preventDefault();
                    alert("Lokasi belum terdeteksi. Silakan aktifkan GPS.");
                }
            });
        });
    </script>
</body>
</html>
