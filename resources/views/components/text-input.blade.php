@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full border-border bg-background text-foreground focus:border-[#1e3a5f] focus:ring-[#1e3a5f]/20 rounded-lg shadow-sm']) }}>
