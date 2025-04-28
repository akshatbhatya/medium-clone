<x-app-layout>
    <x-slot name="header">
       

<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
    
    @foreach ($category as $cat)
    <x-category-tags 
    title="{{$cat->title}}"
    />
    @endforeach
   </ul>


   

   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($posts as $item)
        <x-post-card
            title="{{ $item->title }}" 
            content="{{ substr($item->content,0,length: 60) }}..." 
            {{-- image="{{ $item->image }}"  --}}
            image="https://placehold.co/400"
            link="{{ $item->slug }}"
        />
    @endforeach
    
</div>
<div>
    {{$posts->links()}}
</div>

        
    </x-slot>

    


</x-app-layout>
