<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "Homepage" }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <x-header />
    <main class="container mx-auto flex-grow p-4 mt-4">
        {{-- Display alert message --}}
        @if (session('success'))
            <x-alert id="success-alert" duration="1000" type="success" message="{{ session('success') }}" />
        @endif
        @if (session('error'))
            <x-alert id="error-alert" type="error" duration="1000" message="{{ session('error') }}" />
        @endif
        {{$slot}}
    </main>
    <x-footer />
</body>

</html>