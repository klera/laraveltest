<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __($blog->title) }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl   p-5">
        
          
        {{$blog->post }}
        
    

        @if ( auth()->user()->id == $blog->user_id )
                                
           <div class="edit-buttons mt-6">                        
                             
            <a href="/blogpost/{{$blog->id}}/edit" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2   focus:outline-none focus:shadow-outline">Edit</a>
            
            <form action="/blogpost/{{$blog->id}}" class="inline-block">
                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2   focus:outline-none focus:shadow-outline">Delete</button>
                                {{ csrf_field() }}
            </form>
                                   
            </div>                    
        @endif


 
        </div>
    </div>
</div>
</x-app-layout>