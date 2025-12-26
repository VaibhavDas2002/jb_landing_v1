@extends('layouts.app-template')

@section('content')
    @include('components.top-header')
    @include('components.header')

    <section class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                        <i class="fa-solid fa-user-circle mr-3 text-blue-600"></i>
                        Beneficiary Details
                    </h1>
                    <div class="mt-2">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            <i class="fa-solid fa-id-card mr-2"></i>
                            ID: {{$row->id}}
                        </span>
                        @if($row->wt_special == 1)
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 ml-2">
                                <i class="fa-solid fa-star mr-2"></i>
                                Special Quota
                            </span>
                        @endif
                    </div>
                </div>

                <div class="flex gap-3">
                    <button
                        class="hs-tooltip inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 px-4 py-3"
                        onclick="window.print()">
                        <i class="fa-solid fa-print"></i>
                        Print
                    </button>
                    <button
                        class="hs-tooltip inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 px-4 py-3">
                        <i class="fa-solid fa-download mr-2"></i>
                        Export PDF
                    </button>
                </div>
            </div>
        </div>


        <!-- Application Under Section Accordion -->
        @if($is_state_login)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 overflow-hidden">
                <div class="hs-accordion" id="application-accordion">
                    <button
                        class="hs-accordion-toggle hs-accordion-active:text-blue-600 group py-4 px-6 inline-flex items-center justify-between gap-x-3 w-full font-semibold text-left text-gray-800 transition hover:text-gray-500"
                        id="application-accordion-heading" aria-controls="application-accordion-collapse">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-blue-100 text-blue-600 group-hover:bg-blue-200">
                                <i class="fa-solid fa-map-marker-alt"></i>
                            </div>
                            <h2 class="ml-3 text-lg font-bold text-gray-800">Application Under</h2>
                        </div>
                        <div class="flex items-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-3">
                                {{$district_state_name}}
                            </span>
                            <i
                                class="hs-accordion-active:rotate-180 hs-accordion-active:text-blue-600 text-gray-600 text-xl fa-solid fa-chevron-down transition-all duration-300"></i>
                        </div>
                    </button>
                    <div id="application-accordion-collapse"
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                        aria-labelledby="application-accordion-heading">
                        <div class="px-6 pb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-landmark mr-2"></i>
                                        District
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">{{$district_state_name}}</p>
                                </div>

                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-layer-group mr-2"></i>
                                        Block/SubDivision
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">{{$block_subdiv_state_name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Accordions -->
        <div class="space-y-4">
            <!-- Personal Details Accordion -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="hs-accordion" id="personal-accordion">
                    <button
                        class="hs-accordion-toggle hs-accordion-active:text-blue-600 group py-4 px-6 inline-flex items-center justify-between gap-x-3 w-full font-semibold text-left text-gray-800 transition hover:text-gray-500"
                        id="personal-accordion-heading" aria-controls="personal-accordion-collapse">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-blue-600 text-white">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-bold text-gray-800">Personal Details</h3>
                                <p class="text-sm text-gray-500 mt-1">{{$row->ben_fname}} {{$row->ben_lname}}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mr-3">
                                {{ ($row->gender == 'Other') ? "Transgender" : $row->gender }}
                            </span>
                            <i
                                class="hs-accordion-active:rotate-180 hs-accordion-active:text-blue-600 text-gray-600 text-xl fa-solid fa-chevron-down transition-all duration-300"></i>
                        </div>
                    </button>
                    <div id="personal-accordion-collapse"
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                        aria-labelledby="personal-accordion-heading">
                        <div class="px-6 pb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-signature mr-2"></i>
                                        Full Name
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{$row->ben_fname}} {{$row->ben_mname}} {{$row->ben_lname}}
                                    </p>
                                </div>

                                <!-- Gender -->
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-venus-mars mr-2"></i>
                                        Gender
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{ ($row->gender == 'Other') ? "Transgender" : $row->gender }}
                                    </p>
                                </div>

                                <!-- Date of Birth -->
                                @if(!is_null($row->dob))
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-500 flex items-center">
                                            <i class="fa-solid fa-birthday-cake mr-2"></i>
                                            Date of Birth
                                        </label>
                                        <p class="text-lg font-semibold text-gray-800">
                                            {{date('d/m/Y', strtotime($row->dob)) }}
                                        </p>
                                    </div>
                                @endif

                                <!-- Father's Name -->
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-male mr-2"></i>
                                        Father's Name
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{$row->father_fname}} {{$row->father_mname}} {{$row->father_lname}}
                                    </p>
                                </div>

                                <!-- Mother's Name -->
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-female mr-2"></i>
                                        Mother's Name
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{$row->mother_fname}} {{$row->mother_mname}} {{$row->mother_lname}}
                                    </p>
                                </div>

                                <!-- Caste -->
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-users mr-2"></i>
                                        Caste
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">{{$row->caste}}</p>
                                </div>

                                <!-- Marital Status -->
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-ring mr-2"></i>
                                        Marital Status
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">{{$row->marital_status}}</p>
                                </div>

                                <!-- Spouse Name -->
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-user-friends mr-2"></i>
                                        Spouse Name
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{$row->spouse_fname}} {{$row->spouse_mname}} {{$row->spouse_lname}}
                                    </p>
                                </div>

                                <!-- Monthly Income -->
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-gray-500 flex items-center">
                                        <i class="fa-solid fa-money-bill-wave mr-2"></i>
                                        Monthly Family Income
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800">
                                        ₹ {{$row->mothly_income}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Details Accordion -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="hs-accordion" id="contact-accordion">
                    <button
                        class="hs-accordion-toggle hs-accordion-active:text-blue-600 group py-4 px-6 inline-flex items-center justify-between gap-x-3 w-full font-semibold text-left text-gray-800 transition hover:text-gray-500"
                        id="contact-accordion-heading" aria-controls="contact-accordion-collapse">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-green-600 text-white">
                                <i class="fa-solid fa-address-book"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-bold text-gray-800">Contact Details</h3>
                                <p class="text-sm text-gray-500 mt-1">{{$row->mobile_no}} • {{$row->email ?: 'No Email'}}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-3">
                                {{$district_name}}
                            </span>
                            <i
                                class="hs-accordion-active:rotate-180 hs-accordion-active:text-blue-600 text-gray-600 text-xl fa-solid fa-chevron-down transition-all duration-300"></i>
                        </div>
                    </button>
                    <div id="contact-accordion-collapse"
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                        aria-labelledby="contact-accordion-heading">
                        <div class="px-6 pb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @php
                                    $contactFields = [
                                        ['icon' => 'fa-solid fa-map', 'label' => 'State', 'value' => 'West Bengal'],
                                        ['icon' => 'fa-solid fa-landmark', 'label' => 'Assembly Constitution', 'value' => $row->assembly_name],
                                        ['icon' => 'fa-solid fa-map-pin', 'label' => 'District', 'value' => $district_name],
                                        ['icon' => 'fa-solid fa-city', 'label' => 'Block/Municipality/Corp', 'value' => $row->block_name],
                                        ['icon' => 'fa-solid fa-home', 'label' => 'GP/Ward No.', 'value' => $gp_name],
                                        ['icon' => 'fa-solid fa-building', 'label' => 'Village/Town/City', 'value' => $row->village_town_city],
                                        ['icon' => 'fa-solid fa-house-user', 'label' => 'House/Premise No.', 'value' => $row->house_premise_no],
                                        ['icon' => 'fa-solid fa-mail-bulk', 'label' => 'Post Office', 'value' => $row->post_office],
                                        ['icon' => 'fa-solid fa-map-marked-alt', 'label' => 'Pin Code', 'value' => $row->pincode],
                                        ['icon' => 'fa-solid fa-shield-alt', 'label' => 'Police Station', 'value' => $row->police_station],
                                        ['icon' => 'fa-solid fa-mobile-alt', 'label' => 'Mobile Number', 'value' => $row->mobile_no],
                                        ['icon' => 'fa-solid fa-envelope', 'label' => 'Email ID', 'value' => $row->email],
                                    ];
                                @endphp

                                @foreach($contactFields as $field)
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-500 flex items-center">
                                            <i class="{{ $field['icon'] }} mr-2"></i>
                                            {{ $field['label'] }}
                                        </label>
                                        <p class="text-lg font-semibold text-gray-800">
                                            {{ $field['value'] ?? 'N/A' }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Identification Numbers Accordion -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="hs-accordion" id="identification-accordion">
                    <button
                        class="hs-accordion-toggle hs-accordion-active:text-blue-600 group py-4 px-6 inline-flex items-center justify-between gap-x-3 w-full font-semibold text-left text-gray-800 transition hover:text-gray-500"
                        id="identification-accordion-heading" aria-controls="identification-accordion-collapse">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-purple-600 text-white">
                                <i class="fa-solid fa-fingerprint"></i>

                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-bold text-gray-800">Identification Numbers</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{$row->aadhar_no ? 'Aadhaar: ' . $row->aadhar_no : 'No Aadhaar'}}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 mr-3">
                                {{$row->aadhar_no ? 'Verified' : 'Pending'}}
                            </span>
                            <i
                                class="hs-accordion-active:rotate-180 hs-accordion-active:text-blue-600 text-gray-600 text-xl fa-solid fa-chevron-down transition-all duration-300"></i>
                        </div>
                    </button>
                    <div id="identification-accordion-collapse"
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                        aria-labelledby="identification-accordion-heading">
                        <div class="px-6 pb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @php
                                    $idFields = [
                                        ['icon' => 'fa-solid fa-credit-card', 'label' => 'Digital Ration Card No.', 'value' => $row->ration_card_no],
                                        ['icon' => 'fa-solid fa-id-card-alt', 'label' => 'AHL TIN', 'value' => $row->ahl_tin],
                                        ['icon' => 'fa-solid fa-address-card', 'label' => 'Aadhaar No.', 'value' => $row->aadhar_no],
                                        ['icon' => 'fa-solid fa-vote-yea', 'label' => 'EPIC/Voter ID No.', 'value' => $row->epic_voter_id],
                                        ['icon' => 'fa-solid fa-file-invoice', 'label' => 'PAN', 'value' => $row->pan_no],
                                        ['icon' => 'fa-solid fa-list-ol', 'label' => 'BPL Seq No.', 'value' => $row->bpl_seq_no],
                                        ['icon' => 'fa-solid fa-id-badge', 'label' => 'BPL ID No.', 'value' => $row->bpl_id_no],
                                        ['icon' => 'fa-solid fa-chart-line', 'label' => 'BPL Total Score', 'value' => $row->bpl_total_score],
                                    ];
                                @endphp

                                @foreach($idFields as $field)
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-500 flex items-center">
                                            <i class="{{ $field['icon'] }} mr-2"></i>
                                            {{ $field['label'] }}
                                        </label>
                                        <p class="font-semibold text-gray-800 truncate">
                                            {{ $field['value'] ?: 'Not Provided' }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bank Details Accordion -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="hs-accordion" id="bank-accordion">
                    <button
                        class="hs-accordion-toggle hs-accordion-active:text-blue-600 group py-4 px-6 inline-flex items-center justify-between gap-x-3 w-full font-semibold text-left text-gray-800 transition hover:text-gray-500"
                        id="bank-accordion-heading" aria-controls="bank-accordion-collapse">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-amber-600 text-white">
                                <i class="fa-solid fa-university"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-bold text-gray-800">Bank Details</h3>
                                <p class="text-sm text-gray-500 mt-1">{{$row->bank_name ?: 'No Bank Details'}}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            @if($row->bank_ifsc)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 mr-3">
                                    IFSC: {{$row->bank_ifsc}}
                                </span>
                            @endif
                            <i
                                class="hs-accordion-active:rotate-180 hs-accordion-active:text-blue-600 text-gray-600 text-xl fa-solid fa-chevron-down transition-all duration-300"></i>
                        </div>
                    </button>
                    <div id="bank-accordion-collapse"
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                        aria-labelledby="bank-accordion-heading">
                        <div class="px-6 pb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @php
                                    $bankFields = [
                                        ['icon' => 'fa-solid fa-landmark', 'label' => 'Bank Name', 'value' => $row->bank_name],
                                        ['icon' => 'fa-solid fa-code-branch', 'label' => 'Branch Name', 'value' => $row->branch_name],
                                        ['icon' => 'fa-solid fa-wallet', 'label' => 'Account No.', 'value' => $row->bank_code],
                                        ['icon' => 'fa-solid fa-hashtag', 'label' => 'IFSC Code', 'value' => $row->bank_ifsc],
                                    ];
                                @endphp

                                @foreach($bankFields as $field)
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-500 flex items-center">
                                            <i class="{{ $field['icon'] }} mr-2"></i>
                                            {{ $field['label'] }}
                                        </label>
                                        <p class="font-semibold text-gray-800 truncate">
                                            {{ $field['value'] ?: 'N/A' }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attachments Accordion -->
            @if(count($docs) > 0)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="hs-accordion" id="attachments-accordion">
                        <button
                            class="hs-accordion-toggle hs-accordion-active:text-blue-600 group py-4 px-6 inline-flex items-center justify-between gap-x-3 w-full font-semibold text-left text-gray-800 transition hover:text-gray-500"
                            id="attachments-accordion-heading" aria-controls="attachments-accordion-collapse">
                            <div class="flex items-center">
                                <div
                                    class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-gray-600 text-white">
                                    <i class="fa-solid fa-paperclip"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-bold text-gray-800">Attached Documents</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ count($docs) }} documents attached</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-200 text-gray-800 mr-3">
                                    {{ count($docs) }} files
                                </span>
                                <i
                                    class="hs-accordion-active:rotate-180 hs-accordion-active:text-blue-600 text-gray-600 text-xl fa-solid fa-chevron-down transition-all duration-300"></i>
                            </div>
                        </button>
                        <div id="attachments-accordion-collapse"
                            class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="attachments-accordion-heading">
                            <div class="px-6 pb-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($docs as $doc)
                                        @if($doc->attched_document != "")
                                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                                <div class="flex items-start justify-between mb-3">
                                                    <div>
                                                        <h4 class="font-semibold text-gray-800">{{$doc->doc_type_name}}</h4>
                                                        <p class="text-sm text-gray-500 mt-1">
                                                            @php
                                                                $image_extension = '';
                                                                if ($doc->document_mime_type == 'image/jpeg') {
                                                                    $image_extension = 'jpg';
                                                                } else if ($doc->document_mime_type == 'image/png') {
                                                                    $image_extension = 'png';
                                                                } else if ($doc->document_mime_type == 'application/pdf') {
                                                                    $image_extension = 'pdf';
                                                                }
                                                            @endphp
                                                            <span
                                                                class="inline-flex items-center px-2 py-1 rounded text-xs font-medium 
                                                                                                                                                                                                                                                                                                                    @if($image_extension == 'pdf') bg-red-100 text-red-800 
                                                                                                                                                                                                                                                                                                                    @elseif(in_array($image_extension, ['jpg', 'png'])) bg-green-100 text-green-800 
                                                                                                                                                                                                                                                                                                                    @else bg-gray-100 text-gray-800 @endif">
                                                                {{ strtoupper($image_extension) }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                    @if($image_extension == 'pdf')
                                                        <i class="fa-solid fa-file-pdf text-red-500 text-xl"></i>
                                                    @elseif(in_array($image_extension, ['jpg', 'png']))
                                                        <i class="fa-solid fa-file-image text-green-500 text-xl"></i>
                                                    @else
                                                        <i class="fa-solid fa-file text-gray-500 text-xl"></i>
                                                    @endif
                                                </div>

                                                <div class="mt-4">
                                                    @if(in_array($image_extension, ['jpg', 'png']))
                                                        <?php                $row_image = "data:image/" . $image_extension . ";base64," . $doc->attched_document; ?>
                                                        <div class="border border-gray-200 rounded overflow-hidden">
                                                            <a href="{{$row_image}}" target="_blank" class="block">
                                                                <img src="{{$row_image}}" alt="{{$doc->doc_type_name}}"
                                                                    class="w-full h-40 object-cover hover:opacity-90 transition-opacity">
                                                            </a>
                                                        </div>
                                                        <div class="mt-3 flex justify-between">
                                                            <a href="{{$row_image}}" target="_blank"
                                                                class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                                                                <i class="fa-solid fa-eye mr-2"></i> View
                                                            </a>
                                                            <a href="{{route('jbDownload', ['scheme_id' => $doc->scheme_id, 'created_by_dist_code' => $doc->created_by_dist_code, 'beneficiary_id' => $doc->beneficiary_id, 'document_type' => $doc->document_type])}}"
                                                                class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-800">
                                                                <i class="fa-solid fa-download mr-2"></i> Download
                                                            </a>
                                                        </div>
                                                    @elseif($image_extension == 'pdf')
                                                        <div class="border border-gray-200 rounded p-4 bg-gray-50">
                                                            <div class="flex items-center justify-center mb-3">
                                                                <i class="fa-solid fa-file-pdf text-red-500 text-4xl"></i>
                                                            </div>
                                                            <a href="{{route('jbDownload', ['scheme_id' => $doc->scheme_id, 'created_by_dist_code' => $doc->created_by_dist_code, 'beneficiary_id' => $doc->beneficiary_id, 'document_type' => $doc->document_type])}}"
                                                                target="_blank"
                                                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                                                <i class="fa-solid fa-download mr-2"></i> Download PDF
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>


    </section>

    @include('layouts.footer')

@endsection

@push('scripts')
    <script>
        // Initialize Preline UI components
        document.addEventListener('DOMContentLoaded', function () {
            // Optionally, open first accordion by default
            const firstAccordion = document.querySelector('.hs-accordion');
            if (firstAccordion) {
                const toggleBtn = firstAccordion.querySelector('.hs-accordion-toggle');
                if (toggleBtn) {
                    setTimeout(() => {
                        toggleBtn.click();
                    }, 300);
                }
            }
        });
    </script>
@endpush