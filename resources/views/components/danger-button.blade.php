<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-destructive border border-transparent rounded-full font-medium text-sm text-white tracking-wide hover:bg-destructive/90 active:bg-destructive focus:outline-none focus:ring-2 focus:ring-destructive/50 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
