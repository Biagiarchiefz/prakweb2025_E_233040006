<x-dashboard-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome {{ auth()->user()->name }}</h1>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-
        soft border border-success-subtle" role="alert">
            <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-
                      width="2" d="M10 11h2v5m-2 4h4m-2-5.85L5.85 1m12-5.85-2.59 2.59-4.82 4.82"/>
            </svg>

            <p class="flex-1">
                <span class="font-medium me-1">Success!</span> {{ session('success') }}
            </p>

            <button type="button" class="ms-auto -mx-1.5 -my-1.5
            bg-success-soft text-fg-success-strong rounded-base focus:ring-2 focus:ring-success-subtle p-
            1.5 hover:bg-success-medium inline-flex items-center justify-center h-8 w-8"
                    onclick="this.parentElement.remove()"
                    aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-
                          width="2" d="m1 1 6 6m0 0 6 6m-6-6 6-6M7 7l6-6"/>
                </svg>
            </button>
        </div>
    @endif

    @include('components.teable')
</x-dashboard-layout>
