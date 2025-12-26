@extends('layouts.app-template')

@push('styles')
    <!-- Poppins font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
    <!-- Top headers -->
    @include('components.top-header')
    @include('components.header')

    <!-- Department Section -->
    <section id="wcd-department"
             class="max-w-7xl mx-auto px-4 py-12 font-poppins scrollbar-thin scrollbar-thumb-{{ $department_json->ref_color }}-300 scrollbar-track-slate-100">
        <!-- Header Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-{{ $department_json->ref_color }}-600 to-{{ $department_json->ref_gradient_color }}-700 text-white px-6 py-8">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center space-x-6 mb-4 md:mb-0">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-child text-3xl text-{{ $department_json->ref_color }}-600"></i>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold">{{ $department_json->department_name }}</h1>
                            <p class="text-{{ $department_json->ref_color }}-200">Government of West Bengal</p>
                        </div>
                    </div>

                    <div class="bg-white bg-opacity-20 rounded-lg px-6 py-3 text-center space-y-1">
                        <div class="text-2xl font-bold">{{ $department_json->tagline->line1 }}</div>
                        <div class="text-{{ $department_json->ref_color }}-100">{{ $department_json->tagline->line2 }}</div>
                        <div class="text-{{ $department_json->ref_color }}-200 text-sm">{{ $department_json->tagline->line3 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Applied -->
            <div class="rounded-lg p-4 text-center bg-gradient-to-br from-{{ $department_json->ref_color }}-50 to-{{ $department_json->ref_color }}-100 border border-{{ $department_json->ref_color }}-200 shadow-md">
                <div class="text-2xl font-bold text-{{ $department_json->ref_color }}-600" data-count="{{ $ben_count_all }}">0</div>
                <div class="text-gray-600 text-sm">Applied Beneficiaries</div>
            </div>

            <!-- Approved -->
            <div class="rounded-lg p-4 text-center bg-gradient-to-br from-{{ $department_json->ref_color }}-50 to-{{ $department_json->ref_color }}-100 border border-{{ $department_json->ref_color }}-200 shadow-md">
                <div class="text-2xl font-bold text-{{ $department_json->ref_color }}-600" data-count="{{ $ben_count_approved }}">0</div>
                <div class="text-gray-600 text-sm">Approved Beneficiaries</div>
            </div>

            <!-- Schemes -->
            <div class="rounded-lg p-4 text-center bg-gradient-to-br from-{{ $department_json->ref_color }}-50 to-{{ $department_json->ref_color }}-100 border border-{{ $department_json->ref_color }}-200 shadow-md">
                <div class="text-2xl font-bold text-{{ $department_json->ref_color }}-600" data-count="{{ $onboard_scheme_count }}">0</div>
                <div class="text-gray-600 text-sm">Schemes</div>
            </div>

            <!-- Monthly Disbursement (money type) -->
            <div class="rounded-lg p-4 text-center bg-gradient-to-br from-{{ $department_json->ref_color }}-50 to-{{ $department_json->ref_color }}-100 border border-{{ $department_json->ref_color }}-200 shadow-md">
                <div class="text-2xl font-bold text-{{ $department_json->ref_color }}-600" data-count="{{ $total_disbrusment }}" data-type="money">0</div>
                <div class="text-gray-600 text-sm">Monthly Disbursement</div>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left column -->
            <div class="lg:col-span-2 space-y-6">

                <!-- About -->
                <div class="bg-white rounded-lg p-6 border-l-4 border-{{ $department_json->ref_color }}-500 hover:-translate-y-1 hover:shadow-xl transition-all">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-{{ $department_json->ref_color }}-600 mr-2"></i>
                        About the Department
                    </h2>
                    <p class="text-gray-600 mb-4">{{ $department_json->long }}</p>

                    <div class="bg-{{ $department_json->ref_color }}-50 border border-{{ $department_json->ref_color }}-200 rounded-lg p-4">
                        <h3 class="font-semibold text-{{ $department_json->ref_color }}-800 mb-2">Vision & Mission:</h3>
                        <ul class="text-{{ $department_json->ref_color }}-700 space-y-2">
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-bullseye text-{{ $department_json->ref_color }}-600 mt-1"></i>
                                <div>
                                    <strong>{{ $department_json->about->vision_mission[0]->title }}:</strong>
                                    <span class="text-gray-700"> {{ $department_json->about->vision_mission[0]->text }}</span>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-flag text-{{ $department_json->ref_color }}-600 mt-1"></i>
                                <div>
                                    <strong>{{ $department_json->about->vision_mission[1]->title }}:</strong>
                                    <span class="text-gray-700"> {{ $department_json->about->vision_mission[1]->text }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Key Functions -->
                <div class="bg-white rounded-lg p-6 border-l-4 border-{{ $department_json->ref_color }}-500 hover:-translate-y-1 hover:shadow-xl transition-all">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-tasks text-{{ $department_json->ref_color }}-600 mr-2"></i>
                        Key Functions & Responsibilities
                    </h2>

                    <div class="space-y-4">
                        @foreach($department_json->key_functions as $key_func)
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center bg-gradient-to-br from-{{ $department_json->ref_color }}-300 to-{{ $department_json->ref_color }}-100 text-{{ $department_json->ref_color }}-700">
                                    <i class="fas {{ $key_func->icon }}"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $key_func->title }}</h3>
                                    <p class="text-gray-600">{{ $key_func->text }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Major Initiatives -->
                <div class="bg-white rounded-lg p-6 border-l-4 border-{{ $department_json->ref_color }}-500 hover:-translate-y-1 hover:shadow-xl transition-all">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-star text-{{ $department_json->ref_color }}-600 mr-2"></i>
                        Major Initiatives & Achievements
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($department_json->major_initiatives as $major)
                            <div class="bg-{{ $department_json->ref_gradient_color }}-50 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <i class="fas {{ $major->icon }} text-{{ $department_json->ref_gradient_color }}-600 mr-2"></i>
                                    <h3 class="font-semibold text-{{ $department_json->ref_gradient_color }}-800">{{ $major->name }}</h3>
                                </div>
                                <p class="text-{{ $department_json->ref_gradient_color }}-700 text-sm">{{ $major->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right column -->
            <div class="space-y-6">

                <!-- Flagship schemes -->
                <div class="bg-white rounded-lg p-6 border-l-4 border-{{ $department_json->ref_color }}-500 hover:-translate-y-1 hover:shadow-xl transition-all">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-trophy text-{{ $department_json->ref_color }}-600 mr-2"></i>
                        Flagship Schemes
                    </h2>

                    <div class="space-y-4">
                        @foreach($department_json->flagship_schemes as $flag)
                            <div class="pl-4 border-l-4 border-{{ $flag->color }}-500">
                                <h3 class="font-semibold text-gray-800">{{ $flag->name }}</h3>
                                <p class="text-gray-600 text-sm">{{ $flag->description }}</p>
                            </div>
                        @endforeach
                    </div>

                    <button id="viewAllSchemes" class="w-full mt-4 bg-{{ $department_json->ref_color }}-600 hover:bg-{{ $department_json->ref_color }}-700 text-white py-2 rounded-lg font-semibold transition">
                        <i class="fas fa-list mr-2"></i>View All Schemes
                    </button>
                </div>

                <!-- Organizational structure -->
                <div class="bg-white rounded-lg p-6 border-l-4 border-{{ $department_json->ref_color }}-500 hover:-translate-y-1 hover:shadow-xl transition-all">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-sitemap text-{{ $department_json->ref_color }}-600 mr-2"></i>
                        Organizational Structure
                    </h2>

                    <ul class="space-y-2 text-gray-600">
                        @foreach($department_json->orgnizational_structure as $org)
                            <li class="flex items-center space-x-2">
                                <i class="fas {{ $org->icon }} text-{{ $department_json->ref_color }}-500"></i>
                                <span class="text-gray-700">{{ $org->title }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact -->
                <div class="rounded-lg p-6 border border-{{ $department_json->ref_color }}-200 bg-{{ $department_json->ref_color }}-50 shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-address-card text-{{ $department_json->ref_color }}-600 mr-2"></i>
                        Contact Information
                    </h2>

                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-{{ $department_json->ref_color }}-600 mt-1"></i>
                            <div>
                                <div class="font-semibold">Head Office</div>
                                <div class="text-{{ $department_json->ref_color }}-700 text-sm">{{ $department_json->contact->address }}</div>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <i class="fas fa-phone text-{{ $department_json->ref_color }}-600 mt-1"></i>
                            <div>
                                <div class="font-semibold">Helpline</div>
                                @foreach($department_json->contact->helplines as $help)
                                    <div class="text-{{ $department_json->ref_color }}-700">{{ $help }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <i class="fas fa-envelope text-{{ $department_json->ref_color }}-600 mt-1"></i>
                            <div>
                                <div class="font-semibold">Email</div>
                                <div class="text-{{ $department_json->ref_color }}-700 text-sm">{{ $department_json->contact->email }}</div>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <i class="fas fa-globe text-{{ $department_json->ref_color }}-600 mt-1"></i>
                            <div>
                                <div class="font-semibold">Website</div>
                                <div class="text-{{ $department_json->ref_color }}-700 text-sm">{{ $department_json->contact->website }}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal (hidden by default) -->
        <div id="schemesModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[1000]">
            <div class="bg-white rounded-xl shadow-2xl max-w-6xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="sticky top-0 bg-gradient-to-r from-{{ $department_json->ref_color }}-600 to-{{ $department_json->ref_gradient_color }}-700 text-white px-6 py-4 flex justify-between items-center">
                    <h2 class="text-2xl font-bold">All Government Schemes</h2>
                    <button id="closeModal" class="text-white hover:text-{{ $department_json->ref_color }}-200 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="p-6">
                    <div class="grid gap-6 [grid-template-columns:repeat(auto-fill,minmax(300px,1fr))]">
                        <!-- Example Scheme Cards (use dynamic data similarly) -->
                        <div class="bg-{{ $department_json->ref_color }}-50 border border-{{ $department_json->ref_color }}-200 rounded-lg p-4">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-{{ $department_json->ref_color }}-600 rounded-full flex items-center justify-center text-white mr-3">
                                    <i class="fas fa-female"></i>
                                </div>
                                <h3 class="font-bold text-{{ $department_json->ref_color }}-800 text-lg">Lakshmir Bhandar</h3>
                            </div>
                            <p class="text-{{ $department_json->ref_color }}-700 text-sm mb-3">Monthly financial assistance of ₹500-₹1000 to women heads of families</p>
                            <div class="flex justify-between text-xs text-{{ $department_json->ref_color }}-600">
                                <span><i class="fas fa-rupee-sign mr-1"></i>₹500-1000/month</span>
                                <span><i class="fas fa-users mr-1"></i>Women</span>
                            </div>
                        </div>

                        <!-- Other sample cards (you can loop real data here) -->
                        @foreach($department_json->all_schemes ?? [] as $s)
                            <div class="bg-{{ $s->color ?? $department_json->ref_color }}-50 border border-{{ $s->color ?? $department_json->ref_color }}-200 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <div class="w-10 h-10 bg-{{ $s->color ?? $department_json->ref_color }}-600 rounded-full flex items-center justify-center text-white mr-3">
                                        <i class="fas {{ $s->icon ?? 'fa-circle' }}"></i>
                                    </div>
                                    <h3 class="font-bold text-{{ $s->color ?? $department_json->ref_color }}-800 text-lg">{{ $s->name }}</h3>
                                </div>
                                <p class="text-{{ $s->color ?? $department_json->ref_color }}-700 text-sm mb-3">{{ $s->description ?? '' }}</p>
                                <div class="flex justify-between text-xs text-{{ $s->color ?? $department_json->ref_color }}-600">
                                    <span>{{ $s->benefit ?? '' }}</span>
                                    <span>{{ $s->target_group ?? '' }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    @include('layouts.footer')
@endsection

@push('scripts')
<script>
    // Format numbers in Indian style with compact suffixes
    function formatCountCompact(num) {
        if (num >= 10000000) return (num / 10000000).toFixed(1).replace(/\.0$/, "") + "Cr";
        if (num >= 100000) return (num / 100000).toFixed(1).replace(/\.0$/, "") + "L";
        if (num >= 1000) return (num / 1000).toFixed(1).replace(/\.0$/, "") + "K";
        return num.toLocaleString('en-IN');
    }

    // Format money specifically (adds ₹ prefix)
    function formatMoneyCompact(num) {
        if (num >= 10000000) return "₹" + (num / 10000000).toFixed(1).replace(/\.0$/, "") + "Cr";
        if (num >= 100000) return "₹" + (num / 100000).toFixed(1).replace(/\.0$/, "") + "L";
        if (num >= 1000) return "₹" + (num / 1000).toFixed(1).replace(/\.0$/, "") + "K";
        return "₹" + num.toLocaleString('en-IN');
    }

    // Generic animate function safe for large numbers
    function animateCountElement(el, target, opts = {}) {
        const isMoney = !!opts.money;
        const duration = opts.duration || 1800; // ms
        let start = 0;
        // handle target 0 or NaN
        target = parseInt(target) || 0;
        if (target === 0) {
            el.textContent = isMoney ? formatMoneyCompact(0) : formatCountCompact(0);
            return;
        }

        // choose steps count (not too many updates if target huge)
        const steps = Math.min(60, Math.max(20, Math.floor(duration / 50)));
        const increment = Math.ceil(target / steps);
        const stepTime = Math.max(10, Math.floor(duration / steps));

        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                clearInterval(timer);
                el.textContent = isMoney ? formatMoneyCompact(target) : formatCountCompact(target);
                return;
            }
            el.textContent = isMoney ? formatMoneyCompact(start) : formatCountCompact(start);
        }, stepTime);
    }

    document.addEventListener('DOMContentLoaded', () => {
        // animate all data-count elements
        document.querySelectorAll('[data-count]').forEach(el => {
            const target = el.getAttribute('data-count');
            const type = el.getAttribute('data-type') || 'count';
            if (type === 'money') {
                animateCountElement(el, target, { money: true });
            } else {
                animateCountElement(el, target, { money: false });
            }
        });

        // Modal open/close
        const modal = document.getElementById('schemesModal');
        const openBtn = document.getElementById('viewAllSchemes');
        const closeBtn = document.getElementById('closeModal');

        if (openBtn && modal) {
            openBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                // lock body scroll
                document.documentElement.style.overflow = 'hidden';
            });
        }
        if (closeBtn && modal) {
            closeBtn.addEventListener('click', () => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                document.documentElement.style.overflow = '';
            });
        }
        // Close modal on backdrop click
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                    document.documentElement.style.overflow = '';
                }
            });
        }
    });
</script>
@endpush
