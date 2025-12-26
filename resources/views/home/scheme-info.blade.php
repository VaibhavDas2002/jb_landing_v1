@extends('layouts.app-template')
@push('styles')
    <style>
        .link-hover-effect {
            position: relative;
            transition: all 0.3s ease;
        }

        .link-hover-effect::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #f59e0b;
            transition: width 0.3s ease;
        }

        .link-hover-effect:hover::after {
            width: 100%;
        }

        .contact-icon {
            display: inline-block;
            width: 24px;
            text-align: center;
            margin-right: 8px;
            color: #f59e0b;
        }

        .copyright {
            position: relative;
        }

        .copyright::before {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 1px;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.3),
                    transparent);
        }



        .scheme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
@endpush
@section('content')
    <!-- Main Header -->
    @include('components.top-header')

    <!-- Main Header -->
    @include('components.header')

    <!-- Old Age Pension Scheme Section -->
    <section id="pension-scheme" class="max-w-7xl mx-auto px-4 py-12">
        <!-- Scheme Header with Department Logo -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <div
                class="bg-gradient-to-r from-{{$scheme_json->ref_color}}-700 to-{{$scheme_json->ref_color}}-800 text-white px-6 py-8">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center mb-4 md:mb-0">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mr-4 shadow-lg">
                            <i class="fas {{ $scheme_json->icon }} text-{{$scheme_json->ref_color}}-700 text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold">{{ $scheme_info->scheme_name }}</h1>
                            <p class="text-{{$scheme_json->ref_color}}-100">{{ $department->f_name }}</p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg px-4 py-2 text-center">
                        <div class="text-2xl font-bold">₹{{ $scheme_json->money }}/month</div>
                        <div class="text-{{$scheme_json->ref_color}}-100 text-sm">Financial Assistance</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <div class="text-2xl font-bold text-{{$scheme_json->ref_color}}-600">
                    {{ $scheme_json->quick_stats->eligibility_age }}
                </div>
                <div class="text-gray-600 text-sm">Eligibility Age</div>
            </div>
            @if(in_array($scheme_id, [1, 3, 19]))
                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                    <div class="text-2xl font-bold text-{{$scheme_json->ref_color}}-600">
                        {{ $scheme_json->quick_stats->eligibility_caste }}
                    </div>
                    <div class="text-gray-600 text-sm">Eligibility Caste</div>
                </div>
            @elseif ($scheme_id == 2)
                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                    <div class="text-2xl font-bold text-{{$scheme_json->ref_color}}-600">
                        {{ $scheme_json->quick_stats->eligibility_criteria }}
                    </div>
                    <div class="text-gray-600 text-sm">Eligibility Criteria</div>
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                    <div class="text-2xl font-bold text-{{$scheme_json->ref_color}}-600"></div>
                    <div class="text-gray-600 text-sm">Direct Transfer</div>
                </div>
            @endif
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <div id="beneficiariesCounter" class="text-2xl font-bold text-{{$scheme_json->ref_color}}-600"
                    data-target="{{ $ben_count }}">
                    0
                </div>
                <div class="text-gray-600 text-sm">Beneficiaries</div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <div id="allocationCounter" class="text-2xl font-bold text-{{$scheme_json->ref_color}}-600"
                    data-target="{{ $scheme_json->quick_stats->allocation }}">
                    0
                </div>
                <div class="text-gray-600 text-sm">Monthly Allocation</div>
            </div>

        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Scheme Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- About Scheme -->
                <div
                    class="scheme-card bg-white rounded-lg shadow-md p-6 
                                                                border-l-4 border-{{$scheme_json->ref_color}}-600 
                                                                transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-{{$scheme_json->ref_color}}-600 mr-2"></i>
                        About the Scheme
                    </h2>
                    <p class="text-gray-600 mb-4">
                        {{ $scheme_json->about->long }}

                    </p>
                    <div
                        class="bg-{{$scheme_json->ref_color}}-50 border border-{{$scheme_json->ref_color}}-200 rounded-lg p-4">
                        <h3 class="font-semibold text-{{$scheme_json->ref_color}}-800 mb-2">Key Highlights:</h3>
                        <ul class="text-{{$scheme_json->ref_color}}-700 space-y-1">

                            @foreach ($scheme_json->key_highlight as $key)
                                <li class="flex items-center"><i
                                        class="fas fa-check-circle mr-2 text-{{$scheme_json->ref_color}}-600"></i> {{ $key }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Eligibility Criteria -->
                <div
                    class="scheme-card bg-white rounded-lg shadow-md p-6 
                                                                border-l-4 border-{{$scheme_json->ref_color}}-600 
                                                                transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-clipboard-check text-{{$scheme_json->ref_color}}-600 mr-2"></i>
                        Eligibility Criteria
                    </h2>
                    <div class="space-y-4">

                        @foreach ($scheme_json->eligibility->eligibility_criteria->key as $criteria)
                            <div class="flex items-start">
                                <div
                                    class="benefit-icon w-8 h-8 rounded-full flex items-center justify-center text-white mr-3 mt-1
                                                                            bg-gradient-to-br from-{{$scheme_json->ref_color}}-500 to-{{$scheme_json->ref_color}}-700">
                                    <i class="{{ $criteria->icon }} text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $criteria->title }}</h3>
                                    <p class="text-gray-600">{{ $criteria->description }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Benefits -->
                <div
                    class="scheme-card bg-white rounded-lg shadow-md p-6 
                                                                border-l-4 border-{{$scheme_json->ref_color}}-600 
                                                                transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-gift text-{{$scheme_json->ref_color}}-600 mr-2"></i>
                        Scheme Benefits
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        @foreach ($scheme_json->benefits as $scheme_ben)
                            <div class="bg-{{$scheme_json->ref_color}}-50 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <i class="{{ $scheme_ben->icon }} text-{{$scheme_json->ref_color}}-600 mr-2"></i>
                                    <h3 class="font-semibold text-{{$scheme_json->ref_color}}-800">{{ $scheme_ben->title }}</h3>
                                </div>
                                <p class="text-{{$scheme_json->ref_color}}-700 text-sm">{{ $scheme_ben->description }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <!-- Right Column - Application Process -->
            <div class="space-y-6">
                <!-- Application Process -->
                <div
                    class="scheme-card bg-white rounded-lg shadow-md p-6 
                                                                border-l-4 border-{{$scheme_json->ref_color}}-600 
                                                                transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-alt text-{{$scheme_json->ref_color}}-600 mr-2"></i>
                        Application Process
                    </h2>
                    <div class="space-y-4">
                        <div class="space-y-4">
                            @foreach($scheme_json->workflow->steps as $criteria)
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-{{$scheme_json->ref_color}}-100 rounded-full flex items-center justify-center text-{{$scheme_json->ref_color}}-700 font-bold mr-3 mt-1">
                                        {{$criteria->rank}}
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">{{$criteria->name}}</h3>
                                        <p class="text-gray-600 text-sm">
                                            {{$criteria->description}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="mt-6">
                        <button
                            class="w-full bg-{{$scheme_json->ref_color}}-600 hover:bg-{{$scheme_json->ref_color}}-700 text-white py-3 rounded-lg font-semibold transition-colors">
                            <i class="fas fa-download mr-2"></i>Download Application Form
                        </button>
                    </div>
                </div>

                <!-- Required Documents -->
                <div
                    class="scheme-card bg-white rounded-lg shadow-md p-6 
                                                                border-l-4 border-{{$scheme_json->ref_color}}-600 
                                                                transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-contract text-{{$scheme_json->ref_color}}-600 mr-2"></i>
                        Required Documents
                    </h2>
                    <ul class="space-y-2 text-gray-600">
                        @foreach ($scheme_json->required->documents as $doc)
                            <li class="flex items-center"><i class="fas fa-check text-{{$scheme_json->ref_color}}-500 mr-2"></i>
                                {{ $doc }}
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.footer')
@endsection
@push('scripts')
    <script>
        // Indian Compact Format (K+, L+, Cr+)
        function formatIndianCompact(num) {
            if (num >= 10000000) {
                return (num / 10000000).toFixed(1).replace(/\.0$/, "") + "Cr+";
            } else if (num >= 100000) {
                return (num / 100000).toFixed(1).replace(/\.0$/, "") + "L+";
            } else if (num >= 1000) {
                return (num / 1000).toFixed(1).replace(/\.0$/, "") + "K+";
            }
            return num;
        }

        function animateCounter(id, target) {
            let $el = $("#" + id);
            let start = 0;

            const duration = 1800;
            const stepTime = Math.max(10, duration / target);

            let timer = setInterval(() => {
                start += Math.ceil(target / (duration / stepTime));

                if (start >= target) {
                    $el.text(formatIndianCompact(target));
                    clearInterval(timer);
                } else {
                    $el.text(formatIndianCompact(start));
                }
            }, stepTime);
        }

        // RUN ON PAGE LOAD
        $(document).ready(function () {
            let $el = $("#beneficiariesCounter");
            animateCounter("beneficiariesCounter", parseInt($el.data("target")));
        });
    </script>

    <script>
        // Money Format with ₹ symbol
        function formatIndianMoney(num) {
            if (num >= 10000000) {
                return "₹" + (num / 10000000).toFixed(1).replace(/\.0$/, "") + "Cr+";
            } else if (num >= 100000) {
                return "₹" + (num / 100000).toFixed(1).replace(/\.0$/, "") + "L+";
            } else if (num >= 1000) {
                return "₹" + (num / 1000).toFixed(1).replace(/\.0$/, "") + "K+";
            }
            return "₹" + num.toLocaleString("en-IN");
        }

        function animateMoneyCounter(id, target) {
            let $el = $("#" + id);
            let start = 0;

            const duration = 2000;
            const stepTime = Math.max(10, duration / target);

            let timer = setInterval(() => {
                start += Math.ceil(target / (duration / stepTime));

                if (start >= target) {
                    $el.text(formatIndianMoney(target));
                    clearInterval(timer);
                } else {
                    $el.text(formatIndianMoney(start));
                }
            }, stepTime);
        }

        // RUN ON PAGE LOAD
        $(document).ready(function () {
            let $el = $("#allocationCounter");
            animateMoneyCounter("allocationCounter", parseInt($el.data("target")));
        });
    </script>
@endpush