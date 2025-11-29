<x-layout>
    <x-slot:title>
        Categories Page
    </x-slot:title>
<h1>Daftar Categories</h1>

<ul>
    @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ul>
</x-layout>
