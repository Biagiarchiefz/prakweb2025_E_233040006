{{-- Header with Search and Add Post Button --}}
<div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center gap-4 bg-gradient-to-r from-blue-50 to-indigo-50">

    <form method="GET" action="{{ route('dashboard.index') }}" class="flex-1 max-w-md">
        <label for="search" class="sr-only">Search</label>

        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                <svg class="w-4 h-4 text-body" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                          d="M21 21.3-5.3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"/>
                </svg>

            </div>

            <input type="search" name="search" id="search" value="{{ request('search') }}"
                   class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                   placeholder="Search posts..." />

            <button type="submit"
                    class="absolute end-1.5 bottom-1.5 text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">
                Search
            </button>
        </div>
    </form>

    <a href="{{ route('dashboard.create') }}"
       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 whitespace-nowrap">

        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 4v16m8-8H4"/>
        </svg>

        Add Post
    </a>

</div>



{{-- table --}}
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
        <tr>
            <th scope="col" class="px-6 py-3 font-medium">
                No
            </th>

{{--            // tambahkan table head image setelah table head Nomor--}}
            <th scope="col" class="px-6 py-3 font-medium">
                Image
            </th>

            <th scope="col" class="px-6 py-3 font-medium">
                Title
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Category
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Published At
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Actions
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
        <tr class="bg-neutral-primary border-b border-default">
            <td class="px-6 py-4">
                {{ $posts->firstItem() + $loop->index }}
            </td>

{{--            // tambahkan table data image setelah table data Nomor--}}
            <td class="px-6 py-4">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-16
            h-16 rounded-base object-cover">
                @else
                    <img id="preview" class="w-32 h-32 rounded-base object-cover border border-default bg-
            gray-100" src="{{ asset('images/preview.jpg') }}" alt="Image preview">
                @endif
            </td>

            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                {{ $post->title }}
            </th>
            <td class="px-6 py-4">
                {{ $post->category->name ?? 'Uncategorized' }}
            </td>
            <td class="px-6 py-4">
                {{ $post->created_at->format('d M Y') }}
            </td>
            <td class="px-6 py-4">
                <a href="{{ route('dashboard.show', $post->slug) }}" class="text-blue-600 hover:underline">View</a>
            </td>
        </tr>
        @empty
        <tr class="bg-neutral-primary border-b border-default">
            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                No posts yet. <a href="{{ route('dashboard.create') }}" class="text-blue-600 hover:underline">
                    Create one
                </a>
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>


{{-- Pagination --}}
@if($posts->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        <nav aria-label="Page navigation">
            <ul class="flex space-x-2 text-sm">

                {{-- Previous Button --}}
                @if($posts->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-100 box-border border border-gray-300 cursor-not-allowed font-medium rounded-s-base text-sm px-3 h-10">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $posts->previousPageUrl() }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-10 focus:outline-none">Previous</a>
                    </li>
                @endif

                {{-- Page Numbers --}}
                @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                    @if($page == $posts->currentPage())
                        <li>
                            <a href="{{ $url }}" aria-current="page" class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium hover:text-fg-brand font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if($posts->hasMorePages())
                    <li>
                        <a href="{{ $posts->nextPageUrl() }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-10 focus:outline-none">Next</a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-100 box-border border border-gray-300 cursor-not-allowed font-medium rounded-e-base text-sm px-3 h-10">Next</span>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
@endif

