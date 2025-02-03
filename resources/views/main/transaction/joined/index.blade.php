@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Tabulator - SAITAMA - Laptop List</title>
@endsection

@section('subcontent')
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">Employee Laptop List</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <x-base.button class="mr-2 shadow-md" variant="primary">
                Add New Employee
            </x-base.button>
        </div>
    </div>

    <!-- BEGIN: Table Data -->
    <div class="intro-y box mt-5 p-5">
        <div class="scrollbar-hidden overflow-x-auto">
            <div class="mt-5" id="tabulator"></div>
        </div>
    </div>
    <!-- END: Table Data -->

    <script>
        window.tableData = @json($mergedData);
    </script>
@endsection

@pushOnce('styles')
    @vite('resources/css/vendors/tabulator.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendors/tabulator.js')
    @vite('resources/js/vendors/lucide.js')
    @vite('resources/js/vendors/xlsx.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/pages/transaction/join.js')
@endPushOnce
