<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add post') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl  p-5">
        
            <form method="POST" action="/blogpost">

                <div class="form-group">
                    <input type="text"  name="title" class="bg-gray-100  border border-gray-400 leading-normal resize-none w-full h-8 py-2 px-3 
                    font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Post title'>   
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif

                    <textarea name="post" class="bg-gray-100  border border-gray-400 leading-normal resize-height w-full h-20 py-2 px-3 
                    font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Post text'></textarea>  
                    @if ($errors->has('post'))
                        <span class="text-danger">{{ $errors->first('post') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">Add post</button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
</x-app-layout>