<x-layout>
    <div class="flex -m-2 flex-wrap">
        @foreach($products as $product)
        <div class="w-72 m-2 border border-gray-200 rounded-lg pt-5 pb-5 pr-2 pl-2 hover:shadow-md text-center">
            <div>{{ $product->title }}</div>
        </div>
        @endforeach
    </div>
</x-layout>
