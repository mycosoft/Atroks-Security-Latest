<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-navy border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-orange focus:outline-none focus:ring-2 focus:ring-navy focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
