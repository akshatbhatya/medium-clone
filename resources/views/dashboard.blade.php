<x-app-layout>
    <x-slot name="header">
       
    <a href="{{route("post.create")}}" class="py-3 px-4 bg-green-800 text-white rounded-lg">Create Post</a>

<ul class="flex justify-center  flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
    
    @foreach ($category as $cat)
    <x-category-tags 
    title="{{$cat->title}}"
    />
    @endforeach
   </ul>



   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-5">
    @foreach ($posts as $item)
   
    @php
    $username = $item->user->username ?? '';
    
   @endphp
   
   <x-post-card
            username="{{ $username }}"
            title="{{ $item->title }}"
            content="{{ Str::limit(strip_tags($item->content), 60) }}..."
            image="{{ $item->image }}"
            link="{{ $item->slug }}"
            postid="{{ $item->id }}"
/>

        
    @endforeach
    
</div>

<div class="mt-4 d-flex justify-content-center">
    {{ $posts->links() }}
</div>

        
    </x-slot>

    


</x-app-layout>
