@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-transparent border-purple-500 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
