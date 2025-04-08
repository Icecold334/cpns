    <div
        {{ $attributes->merge(['class' => 'w-full border border-gray-300 shadow-2xl rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600']) }}>
        <div class="px-3 py-2 border-b dark:border-gray-600">
            <div class="flex flex-wrap items-center">
                <div class="flex items-center space-x-1  flex-wrap">
                    <button id="{{ $id }}toggleBoldButton" data-tooltip-target="{{ $id }}tooltip-bold"
                        type="button"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5h4.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0-7H6m2 7h6.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0 0H6" />
                        </svg>
                        <span class="sr-only">Bold</span>
                    </button>
                    <div id="{{ $id }}tooltip-bold" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Toggle bold
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleItalicButton"
                        data-tooltip-target="{{ $id }}tooltip-italic" type="button"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8.874 19 6.143-14M6 19h6.33m-.66-14H18" />
                        </svg>
                        <span class="sr-only">Italic</span>
                    </button>
                    <div id="{{ $id }}tooltip-italic" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Toggle italic
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleUnderlineButton"
                        data-tooltip-target="{{ $id }}tooltip-underline" type="button"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M6 19h12M8 5v9a4 4 0 0 0 8 0V5M6 5h4m4 0h4" />
                        </svg>
                        <span class="sr-only">Underline</span>
                    </button>
                    <div id="{{ $id }}tooltip-underline" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Toggle underline
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleStrikeButton"
                        data-tooltip-target="{{ $id }}tooltip-strike" type="button"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 6.2V5h12v1.2M7 19h6m.2-14-1.677 6.523M9.6 19l1.029-4M5 5l6.523 6.523M19 19l-7.477-7.477" />
                        </svg>
                        <span class="sr-only">Strike</span>
                    </button>
                    <div id="{{ $id }}tooltip-strike" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Toggle strike
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleCodeButton" type="button"
                        data-tooltip-target="{{ $id }}tooltip-code"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14" />
                        </svg>
                        <span class="sr-only">Code</span>
                    </button>
                    <div id="{{ $id }}tooltip-code" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Format code
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleLinkButton"
                        data-tooltip-target="{{ $id }}tooltip-link" type="button"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" />
                        </svg>
                        <span class="sr-only">Link</span>
                    </button>
                    <div id="{{ $id }}tooltip-link" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Add link
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}removeLinkButton"
                        data-tooltip-target="{{ $id }}tooltip-remove-link" type="button"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M13.2 9.8a3.4 3.4 0 0 0-4.8 0L5 13.2A3.4 3.4 0 0 0 9.8 18l.3-.3m-.3-4.5a3.4 3.4 0 0 0 4.8 0L18 9.8A3.4 3.4 0 0 0 13.2 5l-1 1m7.4 14-1.8-1.8m0 0L16 16.4m1.8 1.8 1.8-1.8m-1.8 1.8L16 20" />
                        </svg>
                        <span class="sr-only">Remove link</span>
                    </button>
                    <div id="{{ $id }}tooltip-remove-link" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Remove link
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleTextSizeButton"
                        data-dropdown-toggle="{{ $id }}textSizeDropdown" type="button"
                        data-tooltip-target="{{ $id }}tooltip-text-size"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3" />
                        </svg>
                        <span class="sr-only">Text size</span>
                    </button>
                    <div id="{{ $id }}tooltip-text-size" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Text size
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="{{ $id }}textSizeDropdown"
                        class="z-10 hidden w-72 rounded bg-white p-2 shadow dark:bg-gray-700">
                        <ul class="space-y-1 text-sm font-medium" aria-labelledby="toggleTextSizeButton">
                            <li>
                                <button data-text-size="16px" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">16px
                                    (Default)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="12px" type="button"
                                    class="flex justify-between items-center w-full text-xs rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">12px
                                    (Tiny)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="14px" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">14px
                                    (Small)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="18px" type="button"
                                    class="flex justify-between items-center w-full text-lg rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">18px
                                    (Lead)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="24px" type="button"
                                    class="flex justify-between items-center w-full text-2xl rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">24px
                                    (Large)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="36px" type="button"
                                    class="flex justify-between items-center w-full text-4xl rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">36px
                                    (Huge)
                                </button>
                            </li>
                        </ul>
                    </div>
                    <button id="{{ $id }}toggleFontFamilyButton"
                        data-dropdown-toggle="{{ $id }}fontFamilyDropdown" type="button"
                        data-tooltip-target="{{ $id }}tooltip-font-family"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="m10.6 19 4.298-10.93a.11.11 0 0 1 .204 0L19.4 19m-8.8 0H9.5m1.1 0h1.65m7.15 0h-1.65m1.65 0h1.1m-7.7-3.985h4.4M3.021 16l1.567-3.985m0 0L7.32 5.07a.11.11 0 0 1 .205 0l2.503 6.945h-5.44Z" />
                        </svg>
                        <span class="sr-only">Font family</span>
                    </button>
                    <div id="{{ $id }}tooltip-font-family" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Font Family
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="{{ $id }}fontFamilyDropdown"
                        class="z-10 hidden w-48 rounded bg-white p-2 shadow dark:bg-gray-700">
                        <ul class="space-y-1 text-sm font-medium" aria-labelledby="toggleFontFamilyButton">
                            <li>
                                <button data-font-family="Inter, ui-sans-serif" type="button"
                                    class="flex justify-between items-center w-full text-sm font-sans rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Default
                                </button>
                            </li>
                            <li>
                                <button data-font-family="Arial, sans-serif" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                    style="font-family: Arial, sans-serif;">Arial
                                </button>
                            </li>
                            <li>
                                <button data-font-family="'Courier New', monospace" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                    style="font-family: 'Courier New', monospace;">Courier New
                                </button>
                            </li>
                            <li>
                                <button data-font-family="Georgia, serif" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                    style="font-family: Georgia, serif;">Georgia
                                </button>
                            </li>
                            <li>
                                <button data-font-family="'Lucida Sans Unicode', sans-serif" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                    style="font-family: 'Lucida Sans Unicode', sans-serif;">Lucida Sans Unicode
                                </button>
                            </li>
                            <li>
                                <button data-font-family="Tahoma, sans-serif" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                    style="font-family: Tahoma, sans-serif;">Tahoma
                                </button>
                            </li>
                            <li>
                                <button data-font-family="'Times New Roman', serif;" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                    style="font-family: 'Times New Roman', serif;">Times New Roman
                                </button>
                            </li>
                            <li>
                                <button data-font-family="'Trebuchet MS', sans-serif" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                    style="font-family: 'Trebuchet MS', sans-serif;">Trebuchet MS
                                </button>
                            </li>
                            <li>
                                <button data-font-family="Verdana, sans-serif" type="button"
                                    class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                    style="font-family: Verdana, sans-serif;">Verdana
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="px-1">
                        <span class="block w-px h-4 bg-gray-300 dark:bg-gray-600"></span>
                    </div>
                    <button id="{{ $id }}toggleLeftAlignButton" type="button"
                        data-tooltip-target="{{ $id }}tooltip-left-align"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 6h8m-8 4h12M6 14h8m-8 4h12" />
                        </svg>
                        <span class="sr-only">Align left</span>
                    </button>
                    <div id="{{ $id }}tooltip-left-align" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Align left
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleCenterAlignButton" type="button"
                        data-tooltip-target="{{ $id }}tooltip-center-align"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M8 6h8M6 10h12M8 14h8M6 18h12" />
                        </svg>
                        <span class="sr-only">Align center</span>
                    </button>
                    <div id="{{ $id }}tooltip-center-align" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Align center
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleRightAlignButton" type="button"
                        data-tooltip-target="{{ $id }}tooltip-right-align"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M18 6h-8m8 4H6m12 4h-8m8 4H6" />
                        </svg>
                        <span class="sr-only">Align right</span>
                    </button>
                    <div id="{{ $id }}tooltip-right-align" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Align right
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}typographyDropdownButton"
                        data-dropdown-toggle="{{ $id }}typographyDropdown"
                        class="flex items-center justify-center rounded-lg bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-500 hover:bg-gray-200 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-gray-600 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white dark:focus:ring-gray-600"
                        type="button">
                        Format
                        <svg class="-me-0.5 ms-1.5 h-3.5 w-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="ps-1.5">
                        <span class="block w-px h-4 bg-gray-300 dark:bg-gray-600"></span>
                    </div>
                    <!-- Heading Dropdown -->
                    <div id="{{ $id }}typographyDropdown"
                        class="z-[999] hidden w-72 rounded bg-white p-2 shadow dark:bg-gray-700">
                        <ul class="space-y-1 text-sm font-medium" aria-labelledby="typographyDropdownButton">
                            <li>
                                <button id="{{ $id }}toggleParagraphButton" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Paragraph
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">0</kbd>
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button data-heading-level="1" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                    1
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">1</kbd>
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button data-heading-level="2" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                    2
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">2</kbd>
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button data-heading-level="3" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                    3
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">3</kbd>
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button data-heading-level="4" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                    4
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">4</kbd>
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button data-heading-level="5" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                    5
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">5</kbd>
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button data-heading-level="6" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                    6
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">6</kbd>
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <button id="{{ $id }}addImageButton" type="button"
                        data-tooltip-target="{{ $id }}tooltip-image"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Add image</span>
                    </button>
                    <input type="file" id="{{ $id }}imageInput" accept="image/*"
                        style="display: none;">
                    <div id="{{ $id }}tooltip-image" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Add image
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleListButton" type="button"
                        data-tooltip-target="{{ $id }}tooltip-list"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5" />
                        </svg>
                        <span class="sr-only">Toggle list</span>
                    </button>
                    <div id="{{ $id }}tooltip-list" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Toggle list
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleOrderedListButton" type="button"
                        data-tooltip-target="{{ $id }}tooltip-ordered-list"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4" />
                        </svg>
                        <span class="sr-only">Toggle ordered list</span>
                    </button>
                    <div id="{{ $id }}tooltip-ordered-list" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Toggle ordered list
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="{{ $id }}toggleBlockquoteButton" type="button"
                        data-tooltip-target="{{ $id }}tooltip-blockquote-list"
                        class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M6 6a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a3 3 0 0 1-3 3H5a1 1 0 1 0 0 2h1a5 5 0 0 0 5-5V8a2 2 0 0 0-2-2H6Zm9 0a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a3 3 0 0 1-3 3h-1a1 1 0 1 0 0 2h1a5 5 0 0 0 5-5V8a2 2 0 0 0-2-2h-3Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Toggle blockquote</span>
                    </button>
                    <div id="{{ $id }}tooltip-blockquote-list" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Toggle blockquote
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
            <label for="{{ $id }}" class="sr-only">Publish post</label>
            <div id="{{ $id }}" name="test"
                class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400">
            </div>
            <input type="text" name="{{ $id }}" id="input{{ $id }}"
                wire:model="{{ $id }}" wire:ignore>
        </div>
    </div>
    <div class="mt-1 text-sm font-medium text-red-700 dark:text-red-600">{{ $errors->first($id) }}</div>
    {{-- @push('scripts') --}}
    <script type="module">
        let content = `{!! $content !!}`
        // console.log($('#input{{ $id }}'));

        if (content == '') {
            content = $('#input{{ $id }}').val()
        }

        window.editor("{{ $id }}", content);



        function isContentEmpty(content) {
            return content.trim() === '' || content.includes('<br class="ProseMirror-trailingBreak">');
        }
        document.addEventListener('DOMContentLoaded', () => {
            const wireId = document.querySelector('[wire\\:id]').getAttribute('wire:id');
            ['mousemove', 'click', 'keydown', 'scroll'].forEach(eventType => {
                const parentElement = document.getElementById('{{ $id }}');
                const inputElement = document.getElementById('input{{ $id }}');
                parentElement.addEventListener(eventType, () => {
                    const content = parentElement.childNodes[1].innerHTML;
                    if (!isContentEmpty(content)) {
                        inputElement.value = content;
                    } else {
                        inputElement.value = "";
                    }
                    inputElement.dispatchEvent(new Event('input'));
                });

            });
        });
    </script>
    {{-- @endpush --}}
