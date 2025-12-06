@props(['categories'])

{{-- Form body --}}
<form action="{{ route('dashboard.store') }}" method="POST" encype=”multipart/formdata”>
    @csrf
    <div class="grid sm:grid-cols-2 gap-4 sm:gap-6">
{{--        --}}{{-- Title --}}
{{--        <div class="col-span-2">--}}
{{--            <label for="title" class="block mb-2.5 text-sm font-medium text---}}
{{--                heading">Title</label>--}}
{{--            <input type="text" name="title" id="title" value="{{ old('title') }}" class="bg---}}
{{--                neutral-secondary-medium border border-default medium-text text-sm rounded-base--}}
{{--                focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"--}}
{{--                   placeholder="Enter post title" />--}}
{{--        </div>--}}
        {{-- implementasi pada field tittle --}}
        <div class="col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="bg-neutral-
        secondary-medium border border-default medium-text text-sm rounded-base focus:ring-brand
        focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                   placeholder="Enter post title" />
            @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div class="col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-
                heading">Category</label>
            <select name="category_id" id="category_id" class="block w-full px-3 py-2.5 bg-
                neutral-secondary-medium border border-default medium-text text-sm rounded-base
                focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                <option value="">--Select Category--</option>
{{--                <option disabled selected>--Select Category--</option>--}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('$category_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Excerpt --}}
        <div class="col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-
                heading">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="3" class="block w-full px-3.5 bg-neutral-secondary-
                medium border border-default medium-text text-sm rounded-base focus:ring-brand
                focus:border-brand w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Write a short
                excerpt or summary">{{ old('excerpt') }}</textarea>
            @error('excerpt')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Body --}}
        <div class="col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-
                heading">Content</label>
            <textarea name="body" id="body" rows="8" class="block mb-2.5 text-sm font-medium
                border border-default medium-text text-heading rounded-base focus:ring-brand focus:border-
                brand w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Write your post content
                here">{{ old('body') }}</textarea>
            @error('body')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- Image Upload --}}
        <div class="col-span-2">
            <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Upload
                Image</label>
            <input
                type="file"
                name="image"
                id="image"
                accept="image/png, image/jpeg, image/jpg"
                class="cursor-pointer bg-neutral-secondary-medium border text-heading text-sm
            rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-
            body">
            @error('image')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


    </div>

    {{-- Form Footer --}}
    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 at-4 md:mt-
        6">
        <button type="submit" class="inline-flex items-center text-sm bg-brand hover:bg-
            brand-strong prev:border-amber-500 hover:text-white focus:ring-2 focus:ring-brand-medium-
            shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
            Create Post
        </button>
        <a href="{{ route('dashboard.index') }}" class="text-body bg-neutral-secondary-medium
            border border-default hover:bg-neutral-tertiary shadow-xs text-sm font-medium
            focus:ring-2 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm
            px-4 py-2.5 focus:outline-none">
            Cancel
        </a>
    </div>
</form>
