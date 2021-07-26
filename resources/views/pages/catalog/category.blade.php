<x-layout>
    {{ $category->title }}

    @foreach($products as $product)
        {{ $product->title }}
    @endforeach
</x-layout>
