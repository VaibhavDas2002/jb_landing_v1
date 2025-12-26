@push('styles')
    <style>
        .acc-btn {
            width: 100%;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .acc-btn:hover {
            background: #f3f4f6;
        }

        body.big-text {
            font-size: 1.5rem;
            /* ~ text-lg */
        }

        body.large-line-height {
            line-height: 1.75;
        }

        body.large-cursor {
            cursor: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='32' height='32'><circle cx='16' cy='16' r='10' fill='black'/></svg>") 16 16, auto;
        }

        body.text-spacing * {
            letter-spacing: 0.05em;
        }
    </style>

@endpush

<div class="bg-gray-800 text-white py-2 text-sm">
    <div class="mx-auto px-4 flex justify-between items-center">

        <!-- Left: Contact -->
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-phone text-gray-400"></i>
            <span>{{ config('constants.contact.phone') }}</span>
        </div>

        <!-- Right Section -->
        <div class="flex items-center gap-4">

            <!-- Date & Time -->
            <div class="flex items-center gap-2 text-gray-300">
                <i class="fa-solid fa-calendar-days"></i>
                <span id="currentDateTime"></span>
            </div>

            <span>|</span>

            <!-- Accessibility Dropdown -->
            <details class="relative">
                <summary class="cursor-pointer select-none flex items-center gap-2">
                    <i class="fa-solid fa-universal-access"></i>
                    ACCESSIBILITY OPTIONS
                </summary>

                <div
                    class="absolute right-0 mt-2 w-72 bg-white text-gray-800 rounded shadow-2xl text-sm z-[9999] ring-1 ring-black ring-opacity-5">


                    <button class="acc-btn" onclick="toggleScreenReader()">
                        <i class="fa-solid fa-headphones"></i> Screen Reader
                    </button>

                    <button class="acc-btn" onclick="toggleBigText()">
                        <i class="fa-solid fa-text-height"></i> Bigger Text
                    </button>

                    <button class="acc-btn" onclick="toggleTextSpacing()">
                        <i class="fa-solid fa-arrows-left-right"></i> Text Spacing
                    </button>

                    <button class="acc-btn" onclick="toggleLineHeight()">
                        <i class="fa-solid fa-align-left"></i> Line Height
                    </button>

                    <button class="acc-btn" onclick="toggleHighlightLinks()">
                        <i class="fa-solid fa-link"></i> Highlight Links
                    </button>

                    <button class="acc-btn" onclick="toggleDyslexia()">
                        <i class="fa-solid fa-font"></i> Dyslexia Friendly
                    </button>

                    <button class="acc-btn" onclick="toggleImages()">
                        <i class="fa-solid fa-image-slash"></i> Hide Images
                    </button>

                    <button class="acc-btn" onclick="toggleCursor()">
                        <i class="fa-solid fa-arrow-pointer"></i> Large Cursor
                    </button>

                    <button class="acc-btn" onclick="toggleDark()">
                        <i class="fa-solid fa-circle-half-stroke"></i> Light / Dark
                    </button>

                    <button class="acc-btn" onclick="toggleInvert()">
                        <i class="fa-solid fa-adjust"></i> Invert Colors
                    </button>
                </div>
            </details>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {

            /* ===============================
               Date & Time
            =============================== */
            function updateDateTime() {
                var now = new Date();
                $('#currentDateTime').text(
                    now.toLocaleString('en-IN', {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: true
                    })
                );
            }

            updateDateTime();
            setInterval(updateDateTime, 1000);

            /* ===============================
               Accessibility Functions
            =============================== */

            window.toggleBigText = function () {
                $('body').toggleClass('big-text');
            };

            window.toggleTextSpacing = function () {
                $('body').toggleClass('text-spacing');
            };


            window.toggleLineHeight = function () {
                $('body').toggleClass('large-line-height');
            };
            window.toggleHighlightLinks = function () {
                $('a').toggleClass('underline bg-yellow-300');
            };

            window.toggleDyslexia = function () {
                $('body').toggleClass('font-mono');
            };

            window.toggleImages = function () {
                $('img').toggleClass('hidden');
            };

            window.toggleCursor = function () {
                $('body').toggleClass('large-cursor');
            };


            window.toggleDark = function () {
                $('html').toggleClass('dark');
            };

            window.toggleInvert = function () {
                $('body').toggleClass('invert');
            };

            window.toggleScreenReader = function () {
                alert(
                    'Screen reader support depends on browser / OS settings (NVDA, JAWS, TalkBack).'
                );
            };

        });
    </script>


@endpush