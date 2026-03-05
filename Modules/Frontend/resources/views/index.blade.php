<x-frontend::layouts.master>

    <div class="row mb-2 mt-4">
        @foreach ($products as $product)
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">Our Store</strong>
                        <h3 class="mb-0">{{ Str::limit($product['title'], 30) }} </h3>
                        <div class="mb-1 text-body-secondary"> Price: {{ $product['price'] }}</div>

                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                            <input type="hidden" name="title" value="{{ $product['title'] }}">
                            <input type="hidden" name="price" value="{{ $product['price'] }}">
                            <input type="hidden" name="image" value="{{ $product['image'] }}">

                            <button type="submit" class="btn btn-primary w-100">
                                Add to cart
                            </button>
                        </form>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="bd-placeholder-img"
                            height="250" role="img" width="200" />

                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-frontend::layouts.master>
