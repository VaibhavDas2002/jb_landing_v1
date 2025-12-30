<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $schemes = [
            [
                'name' => 'Lakshmir Bhandar',
                'description' => 'Monthly financial assistance for women heads of households',
                'icon' => 'fas fa-female',
                'color' => 'bg-gradient-to-br from-pink-500 to-rose-600',
                'beneficiaries' => '2.1M',
                'amount' => '₹1000/month',
                'category' => 'Women Welfare'
            ],
            [
                'name' => 'Kanyashree Prakalpa',
                'description' => 'Conditional cash transfer scheme for girls education',
                'icon' => 'fas fa-graduation-cap',
                'color' => 'bg-gradient-to-br from-blue-500 to-indigo-600',
                'beneficiaries' => '1.8M',
                'amount' => '₹750-25000',
                'category' => 'Student Schemes'
            ],
            [
                'name' => 'Krishak Bandhu',
                'description' => 'Income support and life insurance for farmers',
                'icon' => 'fas fa-tractor',
                'color' => 'bg-gradient-to-br from-green-500 to-emerald-600',
                'beneficiaries' => '850K',
                'amount' => '₹10000/year',
                'category' => 'Agriculture'
            ],
            [
                'name' => 'Swasthya Sathi',
                'description' => 'Health insurance with cashless treatment facility',
                'icon' => 'fas fa-user-md',
                'color' => 'bg-gradient-to-br from-teal-500 to-cyan-600',
                'beneficiaries' => '3.5M',
                'amount' => '₹5 Lakh/year',
                'category' => 'Health & Medical'
            ],
            [
                'name' => 'Rupashree Prakalpa',
                'description' => 'One-time financial assistance for marriage',
                'icon' => 'fas fa-gift',
                'color' => 'bg-gradient-to-br from-purple-500 to-pink-600',
                'beneficiaries' => '650K',
                'amount' => '₹25000',
                'category' => 'Women Welfare'
            ],
            [
                'name' => 'Sabuj Sathi',
                'description' => 'Free bicycles to students of class IX-XII',
                'icon' => 'fas fa-bicycle',
                'color' => 'bg-gradient-to-br from-lime-500 to-green-600',
                'beneficiaries' => '1.2M',
                'amount' => 'Free Bicycle',
                'category' => 'Student Schemes'
            ],
            [
                'name' => 'Taruner Swapna',
                'description' => 'Interest-free loans for unemployed youth',
                'icon' => 'fas fa-user-tie',
                'color' => 'bg-gradient-to-br from-indigo-500 to-blue-600',
                'beneficiaries' => '425K',
                'amount' => '₹2 Lakh',
                'category' => 'Social Security'
            ],
            [
                'name' => 'Gitanjali Pension Scheme',
                'description' => 'Monthly pension for senior citizens',
                'icon' => 'fas fa-user-friends',
                'color' => 'bg-gradient-to-br from-orange-500 to-red-600',
                'beneficiaries' => '780K',
                'amount' => '₹1000/month',
                'category' => 'Social Security'
            ],
            [
                'name' => 'Aikyashree',
                'description' => 'Financial assistance for minority students',
                'icon' => 'fas fa-book-reader',
                'color' => 'bg-gradient-to-br from-cyan-500 to-blue-600',
                'beneficiaries' => '550K',
                'amount' => '₹1500-5000',
                'category' => 'Student Schemes'
            ],
            [
                'name' => 'Joy Bangla Pension Scheme',
                'description' => 'Pension for widows and destitute women',
                'icon' => 'fas fa-hand-holding-heart',
                'color' => 'bg-gradient-to-br from-rose-500 to-pink-600',
                'beneficiaries' => '325K',
                'amount' => '₹1000/month',
                'category' => 'Women Welfare'
            ],
            [
                'name' => 'Jai Johar',
                'description' => 'Financial support for tribal community',
                'icon' => 'fas fa-users',
                'color' => 'bg-gradient-to-br from-amber-500 to-orange-600',
                'beneficiaries' => '180K',
                'amount' => '₹2500/year',
                'category' => 'Social Security'
            ],
            [
                'name' => 'Manabik Pension Scheme',
                'description' => 'Monthly pension for persons with disabilities',
                'icon' => 'fas fa-wheelchair',
                'color' => 'bg-gradient-to-br from-violet-500 to-purple-600',
                'beneficiaries' => '290K',
                'amount' => '₹1000/month',
                'category' => 'Social Security'
            ],
            [
                'name' => 'Bangla Awas Yojana',
                'description' => 'Housing assistance for rural families',
                'icon' => 'fas fa-home',
                'color' => 'bg-gradient-to-br from-sky-500 to-blue-600',
                'beneficiaries' => '520K',
                'amount' => '₹1.2 Lakh',
                'category' => 'Social Security'
            ]
        ];

        return view('dashboard.dashboard', ['schemes' => $schemes]);
    }
}
