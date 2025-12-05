<x-dashboard-layout>
    <x-slot:title>
        {{ $post->title }} - Dashboard
    </x-slot:title>

    <article class="max-w-4xl mx-auto">

        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

            <div class="flex items-center text-sm text-gray-600 mb-4">
                <span class="mr-4">By {{ $post->author->name ?? auth()->user()->name }}</span>
                <span class="mr-4">Category: {{ $post->category->name ?? 'Uncategorized' }}</span>
                <span>{{ $post->created_at->format('d M Y') }}</span>
            </div>

            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                     class="w-full h-64 object-cover rounded-lg mb-6">
            @endif
        </header>

        <div class="prose prose-lg max-w-none">
            <p class="text-xl text-gray-600 mb-6">{{ $post->excerpt }}</p>

            <div class="text-gray-800 leading-relaxed">
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>

        <footer class="mt-8 pt-8 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <a href="{{ route('dashboard.index') }}"
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    ← Back to Dashboard
                </a>
            </div>
        </footer>

    </article>
</x-dashboard-layout>
