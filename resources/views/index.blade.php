<x-app-layout>
    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="flex-auto text-right mt-2">
                    <a href="{{route('blogs.add', [])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">Add new post</a>
    </div>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($blogs as $blog)
                <div class="p-6 flex space-x-2">

                    <div class="flex-1">
                    <p class="mt-4 text-lg text-gray-900 "><a href="{{route('blogs.view', $blog)}}">{{ Str::limit($blog->title, 100)  }}</a></p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-400">{{ $blog->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-400">{{ $blog->created_at->format('j M Y, g:i a') }}</small>

                                @unless ($blog->created_at->eq($blog->updated_at))
                                    <small class="text-sm text-gray-400"> &middot; {{ __('edited') }}</small>
                                @endunless
                           
                                        @if ($blog->user->is(auth()->user()))
                                        <small class="text text-gray-600 ml-4 "> 
                                                    <a href="{{route('blogs.edit', $blog)}}">
                                                        {{ __('Edit') }}
                                                    </a>
                                        </small>
                                        @endif

                            </div>
                        </div>
                        <p class="mt-4 text-md text-gray-900">{{ Str::limit($blog->post, 300)  }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $blogs->links() }}

    </div>
</x-app-layout>