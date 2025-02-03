@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>User Directory - SAITAMA</title>
@endsection

@section('subcontent')
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">User Directory</h2>
    </div>

    <!-- BEGIN: User Table -->
    <div class="intro-y box mt-5 p-5">
        <div class="scrollbar-hidden overflow-x-auto">
            <div class="mt-5" id="tabulator-user"></div>
        </div>
    </div>
    <!-- END: User Table -->

    <script>
        window.userData = @json($userData);
    </script>
@endsection

@pushOnce('styles')
    @vite('resources/css/vendors/tabulator.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendors/tabulator.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/pages/transaction/user.js')
@endPushOnce
