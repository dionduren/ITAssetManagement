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
        <div class="col-span-12 2xl:col-span-9">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex h-10 items-center">
                    <h2 class="mr-5 truncate text-lg font-medium">General Report - Juli</h2>
                    <a class="ml-auto flex items-center text-primary" href="">
                        <x-base.lucide class="mr-3 h-4 w-4" icon="RefreshCcw" /> Reload Data
                    </a>
                </div>
                <div class="mt-5 grid grid-cols-12 gap-6">
                    <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                        <div @class([
                            'relative zoom-in',
                            "before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']",
                        ])>
                            <div class="box p-5">
                                <div class="flex">
                                    <x-base.lucide class="h-[28px] w-[28px] text-primary" icon="Ticket" />
                                    <div class="ml-auto">
                                        <x-base.tippy
                                            class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                            as="div" content="33% Higher than last month">
                                            33%
                                            <x-base.lucide class="ml-0.5 h-4 w-4" icon="ChevronUp" />
                                        </x-base.tippy>
                                    </div>
                                </div>
                                <div class="mt-6 text-3xl font-medium leading-8">6.710</div>
                                <div class="mt-1 text-base text-slate-500">Tiket Masuk</div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                        <div @class([
                            'relative zoom-in',
                            "before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']",
                        ])>
                            <div class="box p-5">
                                <div class="flex">
                                    <x-base.lucide class="h-[28px] w-[28px] text-pending" icon="BookmarkCheck" />
                                    <div class="ml-auto">
                                        <x-base.tippy
                                            class="flex cursor-pointer items-center rounded-full bg-danger py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                            as="div" content="2% Lower than last month">
                                            2%
                                            <x-base.lucide class="ml-0.5 h-4 w-4" icon="ChevronDown" />
                                        </x-base.tippy>
                                    </div>
                                </div>
                                <div class="mt-6 text-3xl font-medium leading-8">3.721</div>
                                <div class="mt-1 text-base text-slate-500">Solved Ticket</div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                        <div @class([
                            'relative zoom-in',
                            "before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']",
                        ])>
                            <div class="box p-5">
                                <div class="flex">
                                    <x-base.lucide class="h-[28px] w-[28px] text-warning" icon="AlarmClock" />
                                    <div class="ml-auto">
                                        <x-base.tippy
                                            class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                            as="div" content="12% Higher than last month">
                                            12%
                                            <x-base.lucide class="ml-0.5 h-4 w-4" icon="ChevronUp" />
                                        </x-base.tippy>
                                    </div>
                                </div>
                                <div class="mt-6 text-3xl font-medium leading-8">6 H 23 M</div>
                                <div class="mt-1 text-base text-slate-500">
                                    Average Resolution Time
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                        <div @class([
                            'relative zoom-in',
                            "before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']",
                        ])>
                            <div class="box p-5">
                                <div class="flex">
                                    <x-base.lucide class="h-[28px] w-[28px] text-success" icon="User" />
                                    <div class="ml-auto">
                                        <x-base.tippy
                                            class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                            as="div" content="22% Higher than last month">
                                            55.45%
                                            <x-base.lucide class="ml-0.5 h-4 w-4" icon="ChevronUp" />
                                        </x-base.tippy>
                                    </div>
                                </div>
                                <div class="mt-6 text-3xl font-medium leading-8">87.52 %</div>
                                <div class="mt-1 text-base text-slate-500">
                                    Overall SLA Compliance Rate
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Detail Ticket Report -->
            <div class="col-span-12 mt-8 lg:col-span-6">
                <x-base.preview-component class="intro-y box">
                    <div
                        class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                        <h2 class="mr-auto text-base font-medium">
                            Detail Total Tiket
                        </h2>
                        <x-base.form-switch class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto">
                            <x-base.form-switch.label htmlFor="detail-total-tiket">
                                Show example code
                            </x-base.form-switch.label>
                            <x-base.form-switch.input class="ml-3 mr-0" id="detail-total-tiket" type="checkbox" />
                        </x-base.form-switch>
                    </div>
                    <div class="p-5">
                        <x-base.preview>
                            <x-vertical-bar-chart height="h-[400px]" />
                        </x-base.preview>
                        <x-base.source>
                            <x-base.highlight>
                                <x-vertical-bar-chart height="h-[400px]" />
                            </x-base.highlight>
                        </x-base.source>
                    </div>
                </x-base.preview-component>
            </div>
            <!-- END: Detail Ticket Report -->
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <!-- BEGIN: Transactions -->
            <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12 2xl:mt-8">
                <div class="intro-x flex h-10 items-center">
                    <h2 class="mr-5 truncate text-lg font-medium">Jumlah Tiket</h2>
                </div>
                <div class="mt-5">
                    @foreach (array_slice($fakers, 0, 2) as $index => $faker)
                        <div class="intro-x">
                            <div class="box zoom-in mb-3 flex items-center px-5 py-3">
                                <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                    {{-- <img src="{{ Vite::asset($faker['photos'][0]) }}"
                                        alt="Midone - Tailwind Admin Dashboard Template" /> --}}
                                    <img src="{{ $imageUrls[$index] }}" alt="{{ $companyNames[$index] }}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">{{ $companyNames[$index] }}</div>
                                    <div class="mt-0.5 text-xs text-slate-500">
                                        {{ $faker['dates'][0] }}
                                    </div>
                                </div>
                                <div @class([
                                    'text-success' => $faker['true_false'][0],
                                    'text-danger' => !$faker['true_false'][0],
                                ])>
                                    {{ $faker['true_false'][0] ? '+' : '-' }}{{ $faker['totals'][0] }} Tiket
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <a class="intro-x block w-full rounded-md border border-dotted border-slate-400 py-3 text-center text-slate-500 dark:border-darkmode-300"
                        href="">
                        View More
                    </a>
                </div>
            </div>
            <!-- END: Transactions -->
        </div>
    </div>
@endsection
