<a href="{{ route('scheme_info', ['scheme' => $slug]) }}"
    class="department-card block bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-4 border border-gray-200 hover:border-{{$color}}-400">
    <div class="flex items-center">
        <div class="w-12 h-12 bg-{{$color}}-100 rounded-lg flex items-center justify-center mr-4">
            <i class="{{$icon}} text-{{$color}}-600 text-xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">
            {{$name}}
        </h3>
    </div>
</a>