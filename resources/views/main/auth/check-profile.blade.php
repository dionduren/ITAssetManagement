@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Dashboard - SLA Terpusat</title>
@endsection

@php
    $imageUrls = [
        'https://www.pupuk-indonesia.com/assets/img/logo.png',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5vGWcW2G0cPhskGkRUKT5nVHWobUnF-F5B2kbc-oSWcuQbS4NLUpIbCnUOqsSwOI5-ww&usqp=CAU',
    ];

    $companyNames = ['Pupuk Indonesia', 'Pupuk Indonesia Utilitas'];
@endphp

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <p>User ID: {{ session('user_id') }}</p>
            <p>User Name: {{ session('user_name') }}</p>
            <p>Username: {{ session('user_username') }}</p>
            <p>Email: {{ session('user_email') }}</p>
        </div>
    </div>
@endsection
