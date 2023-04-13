<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Blog dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:-lg p-5">
            <div class="flex">
                
                
                <div class="flex-auto  mb-10 mt-2">
                    <a href="/blogpost" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">Add new post</a>
                </div>
            </div>
            <table class="w-full text-md  mb-4">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Posts</th>
                    <th class="text-left p-3 px-5">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(auth()->user()->blogs as $blog)
                    <tr class="border-b hover:bg-orange-100">
                        <td class="p-3 px-5">
                        <a href="{{route('blogs.view', $blog)}}" name="view" > {{ Str::limit($blog->title, 100)}} </a>
                        </td>
                        <td class="p-3 px-5">
                            <a href="{{route('blogs.edit', $blog)}}" name="edit" class="mr-3 text-sm bg-blue-500  text-white py-1 px-2   focus:outline-none focus:shadow-outline">Edit</a>
                            <form action="{{route('blogs.update', $blog)}}" class="inline-block">
                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500   text-white py-1 px-2  focus:outline-none focus:shadow-outline">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
</x-app-layout>