
<x-dashboard-layout>
    <x-slot:title>
        Create New Post - Dashboard
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create New Post</h1>
        </div>

        {{-- Form Card --}}
        <div class="relative bg-neutral-primary-soft border border-default rounded-base
             shadow-sm p-4 md:p-6">
            {{-- Form Header --}}
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5
                 mb-4 md:mb-6">
                <h3 class="text-lg font-medium text-heading">
                    Post Information
                </h3>
            </div>

            {{-- Import Form Component --}}
            <x-posts.form :categories="$categories" />
        </div>
    </div>
</x-dashboard-layout>
