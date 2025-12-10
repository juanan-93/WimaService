<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-card border border-border rounded-full font-medium text-sm text-foreground tracking-wide shadow-sm hover:bg-muted focus:outline-none focus:ring-2 focus:ring-[#1e3a5f]/20 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
