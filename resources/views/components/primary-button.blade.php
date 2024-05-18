<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800', 'onclick' => isset($href) ? "window.location.href = '{$href}'; return false;" : '']) }}>
    {{ $slot }}
</button>
