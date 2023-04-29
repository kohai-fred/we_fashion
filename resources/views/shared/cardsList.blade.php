<div class="container mt-5 my-5 d-flex align-items-start justify-content-between">
    <h1>{{ $title }}</h1>
    <p>{{ $products->total() }} résultat{{ $products->total()>1 ? 's' : ''}}</p>
</div>

@if (!$products->total())
    <div class="container">
        <h1 class="text-center">Oups, aucun résultat...</h1>
    </div>
@else
    <div class="container px-3">
        <div class="custom-card-container gap-3 ">
            @foreach ($products as $product)
                <div class="custom-card" style="position:relative">
                    @includeWhen( $product->promotion ,'shared.badgePromo',['right'=> '0.5rem', 'top'=>'0.5rem', 'style' => 'font-size: 0.75em; padding: 0.175em 0.35em'])
                    <a href="{{ route('product.show', ['slug' => $product->getSlug(), 'product' => $product->id])}}" class="d-block h-100 shadow-lg rounded text-decoration-none">
                        <div class=" text-dark h-100 rounded" style="background-image: url({{ $product->imageUrl() }})">
                            <div class="custom-card-content">
                                <div class="p-3 pt-4 text-light">
                                    <div class="custom-card-title">{{ $product->title }}</div>
                                    <div>{{ $product->price }} €</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- It's for the pagination --}}
    <div class="container mt-5">{{ $products->links() }}</div>
@endif
