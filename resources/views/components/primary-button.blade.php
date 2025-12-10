<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-[#1e3a5f] border border-transparent rounded-full font-medium text-sm text-white tracking-wide hover:bg-[#1e3a5f]/90 focus:bg-[#1e3a5f]/90 active:bg-[#1e3a5f] focus:outline-none focus:ring-2 focus:ring-[#1e3a5f]/50 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
