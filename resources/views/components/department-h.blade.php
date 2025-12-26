<div class="card-carousel-item original-item flex-shrink-0  w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
    <div class="perspective [perspective:1000px]">
        <div
            class="card-inner relative w-full h-80 transform transition-transform duration-700 [transform-style:preserve-3d] hover:[transform:rotateY(180deg)]">

            <div
                class="card-front absolute w-full h-full bg-{{ $ref_color }}-500 rounded-xl shadow-lg flex flex-col items-center justify-center text-center text-white [backface-visibility:hidden]">
                <img src="{{ asset('images/biswo_logo.png') }}"
                    class="w-20 h-20 mb-6 object-contain rounded-full bg-white p-1 shadow-md" />
                <h3 class="font-bold text-xl">{{ $name }}</h3>
            </div>

            <div
                class="card-back absolute w-full h-full bg-white rounded-xl shadow-lg p-6 flex flex-col justify-center text-center [transform:rotateY(180deg)] [backface-visibility:hidden]">
                <h3 class="font-bold text-xl mb-3 text-gray-800">{{ $name }}</h3>
                <p class="text-gray-600 mb-4">{{ $about }}</p>
                <a href="{{ route('department', ['dept' => $slug]) }}"
                    class="text-{{ $ref_color }}-600 font-semibold hover:underline">
                    Learn More →
                </a>
            </div>

        </div>
    </div>
</div>
