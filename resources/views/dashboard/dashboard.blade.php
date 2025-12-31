@extends('layouts.dashboard')

@section('header_title', '| Dashboard')
@section('header_description', 'One Unbrella Scheme | Department of Finance | Government of West Bengal')


@push('styles')
    <!-- Optional: Add this CSS for subtle animations -->
    <style>
        @keyframes subtle-glow {

            0%,
            100% {
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }

            50% {
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }
        }

        .stat-card:hover {
            animation: subtle-glow 2s ease-in-out infinite;
        }
    </style>
@endpush
@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Total Approved (Till Date) -->
        <div
            class="stat-card rounded-2xl p-6 shadow-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1 tracking-wide">
                        Total Approved (Till Date)
                    </p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">
                        9,84,562
                    </h3>
                </div>
                <div
                    class="w-14 h-14 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-green-200">
                    <i class="fas fa-check-circle text-white text-2xl"></i>
                </div>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <div class="flex items-center gap-2 text-sm">
                    <span
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-gradient-to-r from-green-50 to-emerald-50 text-green-700 text-xs font-semibold border border-green-100">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                        <i class="fas fa-shield-check text-green-600"></i>
                        Verified & Approved
                    </span>
                </div>
            </div>
        </div>

        <!-- Total Application Applied (Till Date) -->
        <div
            class="stat-card rounded-2xl p-6 shadow-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1 tracking-wide">
                        Total Applications Applied (Till Date)
                    </p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">
                        12,45,908
                    </h3>
                </div>
                <div
                    class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-200">
                    <i class="fas fa-file-alt text-white text-2xl"></i>
                </div>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <div class="flex items-center gap-2 text-sm">
                    <span
                        class="text-blue-600 font-semibold flex items-center gap-2 px-3 py-1.5 rounded-full bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100">
                        <i class="fas fa-layer-group text-blue-500"></i>
                        Cumulative count
                        <span class="text-blue-400 ml-1">•</span>
                        <span class="text-xs font-normal text-blue-500">All time</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Total DBT Transfer (Current Month) -->
        <div
            class="stat-card rounded-2xl p-6 shadow-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1 tracking-wide">
                        Total DBT Transfer (Current Month)
                    </p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">
                        ₹356.40 Cr
                    </h3>
                </div>
                <div
                    class="w-14 h-14 rounded-xl bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center shadow-lg shadow-orange-200">
                    <i class="fas fa-rupee-sign text-white text-2xl"></i>
                </div>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <div class="flex items-center gap-2 text-sm">
                    <span
                        class="text-orange-600 font-semibold flex items-center gap-2 px-3 py-1.5 rounded-full bg-gradient-to-r from-orange-50 to-amber-50 border border-orange-100">
                        <div class="relative">
                            <i class="fas fa-calendar-alt text-orange-500"></i>
                            <span class="absolute -top-1 -right-1 w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                        </div>
                        Current month
                        <span class="text-orange-400 ml-1">•</span>
                        <span class="text-xs font-normal text-orange-500">Active</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Total DBT Transfer (Current Financial Year) -->
        <div
            class="stat-card rounded-2xl p-6 shadow-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1 tracking-wide">
                        Total DBT Transfer (Current FY)
                    </p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">
                        ₹4,258.75 Cr
                    </h3>
                </div>
                <div
                    class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-500 to-fuchsia-600 flex items-center justify-center shadow-lg shadow-purple-200">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <div class="flex items-center gap-2 text-sm">
                    <span
                        class="text-purple-600 font-semibold flex items-center gap-2 px-3 py-1.5 rounded-full bg-gradient-to-r from-purple-50 to-fuchsia-50 border border-purple-100">
                        <i class="fas fa-calendar-check text-purple-500"></i>
                        Financial year total
                        <span class="text-purple-400 ml-1">•</span>
                        <span class="text-xs font-normal text-purple-500">FY 2023-24</span>
                    </span>
                </div>
            </div>
        </div>

    </div>




    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
        <!-- Scheme Applications Chart -->
        <div class="chart-container">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">
                        Scheme-wise Applications
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Cumulative performance
                    </p>
                </div>

                <select id="schemeFilter"
                    class="py-2 px-3 pe-9 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="all">All Time</option>
                    <option value="30">Last 30 Days</option>
                    <option value="90">Last 90 Days</option>
                </select>

            </div>

            <div id="applicationsChart" style="height: 350px;"></div>
        </div>


        <!-- District-wise Beneficiaries -->
        <div class="chart-container">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">
                        District Distribution
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Top 10 districts by Approved beneficiaries
                    </p>
                </div>
                <button
                    class="py-2 px-3 inline-flex items-center gap-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50">
                    <i class="fas fa-map-marker-alt"></i>
                    View Map
                </button>
            </div>

            <div id="districtChart" style="height: 350px;"></div>
        </div>


        <!-- Monthly Trends -->
        <div class="chart-container">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Monthly Application Trends</h3>
                    <p class="text-sm text-gray-500 mt-1">Year 2024 overview</p>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <i class="fas fa-info-circle"></i>
                    Avg: 82,450/month
                </div>
            </div>
            <div id="trendsChart" style="height: 350px;"></div>
        </div>

        <!-- Scheme Categories -->
        <div class="chart-container">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Category Distribution</h3>
                    <p class="text-sm text-gray-500 mt-1">Schemes by category</p>
                </div>
                <span class="text-sm text-gray-500">5 Categories</span>
            </div>
            <div id="categoryChart" style="height: 350px;"></div>
        </div>
    </div>

    <!-- All 13 Schemes Section -->
    <div class="mt-6">
        <div class="glass-effect rounded-2xl shadow-xl p-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">All 13 Government Schemes</h2>
                    <p class="text-gray-600 mt-1">Explore and apply for welfare schemes</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <input type="text"
                            class="py-2.5 px-4 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Search schemes...">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                    <button
                        class="py-2.5 px-4 inline-flex items-center gap-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50">
                        <i class="fas fa-filter"></i>
                        Filter
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Lakshmir Bhandar -->
                <div class="scheme-card rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-start mb-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center shadow-lg">
                            <i class="fas fa-female text-white text-xl"></i>
                        </div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                            Active
                        </span>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Lakshmir Bhandar</h4>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">Monthly financial assistance for women heads of
                        households in West Bengal</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-users text-purple-500"></i>
                                Beneficiaries
                            </span>
                            <span class="font-semibold text-gray-700">2.1M</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-rupee-sign text-green-500"></i>
                                Amount
                            </span>
                            <span class="font-semibold text-gray-700">₹1000/month</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1.5">
                            Check Eligibility
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <button
                            class="ml-auto py-2 px-4 inline-flex items-center gap-2 text-xs font-semibold rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-lg transition-all">
                            <i class="fas fa-paper-plane"></i>
                            Apply Now
                        </button>
                    </div>
                </div>

                <!-- Kanyashree Prakalpa -->
                <div class="scheme-card rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-start mb-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                            Active
                        </span>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Kanyashree Prakalpa</h4>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">Conditional cash transfer scheme for girls to
                        continue education and delay marriage</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-users text-purple-500"></i>
                                Beneficiaries
                            </span>
                            <span class="font-semibold text-gray-700">1.8M</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-rupee-sign text-green-500"></i>
                                Amount
                            </span>
                            <span class="font-semibold text-gray-700">₹750-25000</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1.5">
                            Check Eligibility
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <button
                            class="ml-auto py-2 px-4 inline-flex items-center gap-2 text-xs font-semibold rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-lg transition-all">
                            <i class="fas fa-paper-plane"></i>
                            Apply Now
                        </button>
                    </div>
                </div>

                <!-- Krishak Bandhu -->
                <div class="scheme-card rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-start mb-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-lg">
                            <i class="fas fa-tractor text-white text-xl"></i>
                        </div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                            Active
                        </span>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Krishak Bandhu</h4>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">Income support and life insurance for farmers
                        cultivating land in West Bengal</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-users text-purple-500"></i>
                                Beneficiaries
                            </span>
                            <span class="font-semibold text-gray-700">850K</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-rupee-sign text-green-500"></i>
                                Amount
                            </span>
                            <span class="font-semibold text-gray-700">₹10000/year</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1.5">
                            Check Eligibility
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <button
                            class="ml-auto py-2 px-4 inline-flex items-center gap-2 text-xs font-semibold rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-lg transition-all">
                            <i class="fas fa-paper-plane"></i>
                            Apply Now
                        </button>
                    </div>
                </div>

                <!-- Swasthya Sathi -->
                <div class="scheme-card rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-start mb-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center shadow-lg">
                            <i class="fas fa-user-md text-white text-xl"></i>
                        </div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                            Active
                        </span>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Swasthya Sathi</h4>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">Health insurance scheme providing cashless treatment
                        at empanelled hospitals</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-users text-purple-500"></i>
                                Beneficiaries
                            </span>
                            <span class="font-semibold text-gray-700">3.5M</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-rupee-sign text-green-500"></i>
                                Coverage
                            </span>
                            <span class="font-semibold text-gray-700">₹5 Lakh/year</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1.5">
                            Check Eligibility
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <button
                            class="ml-auto py-2 px-4 inline-flex items-center gap-2 text-xs font-semibold rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-lg transition-all">
                            <i class="fas fa-paper-plane"></i>
                            Apply Now
                        </button>
                    </div>
                </div>

                <!-- Rupashree Prakalpa -->
                <div class="scheme-card rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-start mb-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center shadow-lg">
                            <i class="fas fa-gift text-white text-xl"></i>
                        </div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                            Active
                        </span>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Rupashree Prakalpa</h4>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">One-time financial assistance for marriage of adult
                        daughters from economically weaker sections</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-users text-purple-500"></i>
                                Beneficiaries
                            </span>
                            <span class="font-semibold text-gray-700">650K</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-rupee-sign text-green-500"></i>
                                Amount
                            </span>
                            <span class="font-semibold text-gray-700">₹25000</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1.5">
                            Check Eligibility
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <button
                            class="ml-auto py-2 px-4 inline-flex items-center gap-2 text-xs font-semibold rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-lg transition-all">
                            <i class="fas fa-paper-plane"></i>
                            Apply Now
                        </button>
                    </div>
                </div>

                <!-- Sabuj Sathi -->
                <div class="scheme-card rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-start mb-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br from-lime-500 to-green-600 flex items-center justify-center shadow-lg">
                            <i class="fas fa-bicycle text-white text-xl"></i>
                        </div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                            Active
                        </span>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Sabuj Sathi</h4>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">Free bicycles to students of class IX-XII to
                        encourage education and reduce dropout</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-users text-purple-500"></i>
                                Beneficiaries
                            </span>
                            <span class="font-semibold text-gray-700">1.2M</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-gift text-green-500"></i>
                                Benefit
                            </span>
                            <span class="font-semibold text-gray-700">Free Bicycle</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1.5">
                            Check Eligibility
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <button
                            class="ml-auto py-2 px-4 inline-flex items-center gap-2 text-xs font-semibold rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-lg transition-all">
                            <i class="fas fa-paper-plane"></i>
                            Apply Now
                        </button>
                    </div>
                </div>

                <!-- Show More Card -->
                <div
                    class="scheme-card rounded-2xl p-6 shadow-lg border-2 border-dashed border-gray-300 bg-gray-50 flex items-center justify-center cursor-pointer hover:border-blue-400 hover:bg-blue-50">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-plus text-white text-2xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mb-2">View 7 More Schemes</h4>
                        <p class="text-gray-600 text-sm mb-4">Explore additional welfare programs</p>
                        <button
                            class="py-2 px-4 inline-flex items-center gap-2 text-sm font-semibold rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-lg transition-all">
                            View All
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-6 glass-effect rounded-2xl shadow-xl p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Quick Actions</h3>
                <p class="text-gray-600">Access important features quickly</p>
            </div>
            <button
                class="mt-4 md:mt-0 py-3 px-6 inline-flex items-center gap-2 font-semibold rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-xl transition-all">
                <i class="fas fa-plus"></i>
                New Application
            </button>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="bg-white rounded-xl p-6 text-center hover:shadow-xl transition-all group">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-search text-blue-600 text-2xl"></i>
                </div>
                <p class="font-semibold text-gray-800">Scheme Finder</p>
                <p class="text-xs text-gray-500 mt-1">Find best scheme</p>
            </a>

            <a href="#" class="bg-white rounded-xl p-6 text-center hover:shadow-xl transition-all group">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-clipboard-check text-green-600 text-2xl"></i>
                </div>
                <p class="font-semibold text-gray-800">Eligibility Test</p>
                <p class="text-xs text-gray-500 mt-1">Check qualification</p>
            </a>

            <a href="#" class="bg-white rounded-xl p-6 text-center hover:shadow-xl transition-all group">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-file-invoice-dollar text-purple-600 text-2xl"></i>
                </div>
                <p class="font-semibold text-gray-800">Track Status</p>
                <p class="text-xs text-gray-500 mt-1">Monitor application</p>
            </a>

            <a href="#" class="bg-white rounded-xl p-6 text-center hover:shadow-xl transition-all group">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-orange-100 to-orange-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-headset text-orange-600 text-2xl"></i>
                </div>
                <p class="font-semibold text-gray-800">Help Center</p>
                <p class="text-xs text-gray-500 mt-1">Get support</p>
            </a>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        $(document).ready(function () {

            loadSchemeWiseApplications('all');

            $('#schemeFilter').on('change', function () {
                let days = $(this).val();
                loadSchemeWiseApplications(days);
            });

            function loadSchemeWiseApplications(days) {

                $.ajax({
                    url: "{{ route('dashboard.schemeWiseApplications') }}",
                    method: "GET",
                    data: { days: days },
                    dataType: "json",
                    success: function (response) {

                        Highcharts.chart('applicationsChart', {
                            chart: {
                                type: 'column',
                                backgroundColor: 'transparent'
                            },
                            title: { text: null },
                            xAxis: {
                                categories: response.categories,
                                labels: {
                                    rotation: -45,
                                    style: { fontSize: '11px' }
                                }
                            },
                            yAxis: {
                                title: { text: 'Applications' }
                            },
                            legend: { enabled: false },
                            plotOptions: {
                                column: {
                                    borderRadius: 8,
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [{
                                name: 'Applications',
                                data: response.data,
                                colorByPoint: true,
                                colors: [
                                    '#ec4899', '#3b82f6', '#10b981',
                                    '#14b8a6', '#a855f7', '#84cc16',
                                    '#f97316', '#0ea5e9', '#6366f1'
                                ]
                            }],
                            credits: { enabled: false }
                        });
                    }
                });
            }


            loadDistrictWiseBeneficiaries();

            function loadDistrictWiseBeneficiaries() {

                $.ajax({
                    url: "{{ route('dashboard.districtWiseBeneficiaries') }}",
                    type: "GET",
                    dataType: "json",
                    success: function (response) {

                        Highcharts.chart('districtChart', {
                            chart: {
                                type: 'bar',
                                backgroundColor: 'transparent'
                            },
                            title: { text: null },
                            xAxis: {
                                categories: response.categories,
                                title: { text: null }
                            },
                            yAxis: {
                                title: {
                                    text: 'Beneficiaries'
                                }
                            },
                            legend: { enabled: false },
                            plotOptions: {
                                bar: {
                                    borderRadius: 6,
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [{
                                name: 'Beneficiaries',
                                data: response.data,
                                color: {
                                    linearGradient: {
                                        x1: 0, y1: 0,
                                        x2: 1, y2: 0
                                    },
                                    stops: [
                                        [0, '#667eea'],
                                        [1, '#764ba2']
                                    ]
                                }
                            }],
                            credits: { enabled: false }
                        });
                    },
                    error: function () {
                        alert('Failed to load district-wise beneficiary data');
                    }
                });
            }


        });
    </script>





    <script>
        // Remove type="module" and use the global Highcharts that's already loaded by app.js
        document.addEventListener('DOMContentLoaded', function () {
            // Ensure Highcharts is loaded
            if (typeof Highcharts === 'undefined') {
                console.error('Highcharts is not loaded!');
                return;
            }

            // Monthly Trends Chart
            Highcharts.chart('trendsChart', {
                chart: {
                    type: 'areaspline',
                    backgroundColor: 'transparent'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Applications (in thousands)'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    areaspline: {
                        fillColor: {
                            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                            stops: [
                                [0, 'rgba(102, 126, 234, 0.3)'],
                                [1, 'rgba(102, 126, 234, 0.0)']
                            ]
                        },
                        lineWidth: 3,
                        marker: {
                            enabled: true,
                            radius: 5
                        }
                    }
                },
                series: [{
                    name: 'Applications',
                    data: [72, 68, 78, 85, 92, 88, 95, 102, 98, 105, 110, 115],
                    color: '#667eea'
                }],
                credits: {
                    enabled: false
                }
            });

            // Category Distribution Chart
            Highcharts.chart('categoryChart', {
                chart: {
                    type: 'pie',
                    backgroundColor: 'transparent'
                },
                title: {
                    text: null
                },
                plotOptions: {
                    pie: {
                        innerSize: '60%',
                        depth: 45,
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f}%',
                            style: {
                                fontSize: '12px'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Schemes',
                    data: [
                        { name: 'Women Welfare', y: 30.8, color: '#ec4899' },
                        { name: 'Student Schemes', y: 23.1, color: '#3b82f6' },
                        { name: 'Social Security', y: 15.4, color: '#ef4444' },
                        { name: 'Agriculture', y: 15.4, color: '#10b981' },
                        { name: 'Health & Medical', y: 15.3, color: '#14b8a6' }
                    ]
                }],
                credits: {
                    enabled: false
                }
            });
        });
    </script>
@endpush