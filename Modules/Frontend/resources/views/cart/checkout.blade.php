{{-- <x-frontend::layouts.master>
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('modules/frontend/bootstrap/assets/brand/bootstrap-logo.svg') }}"
            alt="" width="72" height="57" />
        <h1 class="h2">Checkout form</h1>
    </div>
    <div class="row g-5">
        <div class="col-md-7 col-lg-8 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-pill"> {{ count($cart) }} </span>
            </h4>
            <ul class="list-group mb-3">
                @foreach ($cart as $item)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{ $item['title'] }}</h6>
                        </div>
                        <span
                            class="text-body-secondary">YER{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </li>
                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (YER)</span>
                    <strong>YER{{ number_format(
                        array_sum(
                            array_map(function ($item) {
                                return $item['price'] * $item['quantity'];
                            }, $cart),
                        ),
                        2,
                    ) }}</strong>
                </li>
            </ul>

        </div>
    </div>

    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">checkout</h4>
        <form class="needs-validation" novalidate>
            <hr class="my-4" />
            <h4 class="mb-3">Payment</h4>
            <div class="my-3">
                <div class="form-check">
                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked
                        required />
                    <label class="form-check-label" for="credit">Jaib</label>
                </div>
                <div class="form-check">
                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required />
                    <label class="form-check-label" for="debit">Floosak</label>
                </div>

            </div>

            <hr class="my-4" />
            <button class="w-100 btn btn-primary btn-lg" type="submit">
                Continue to checkout
            </button>
        </form>
    </div>
</x-frontend::layouts.master> --}}

<x-frontend::layouts.master>
    <div class="py-5 text-center">
        <h1 class="h2">Checkout form</h1>
    </div>

    <div class="row g-5">

        {{-- Cart --}}
        <div class="col-md-7 col-lg-8 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-pill">{{ count($cart) }}</span>
            </h4>

            <ul class="list-group mb-3">

                @php
                    $total = 0;
                    $items = [];
                @endphp

                @foreach ($cart as $id => $item)
                    @php
                        $lineTotal = $item['price'] * $item['quantity'];
                        $total += $lineTotal;

                        $items[] = [
                            'id' => $id,
                            'name' => $item['title'],
                            'quantity' => $item['quantity'],
                            'price' => $item['price'],
                        ];
                    @endphp

                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{ $item['title'] }}</h6>
                            <small>Qty: {{ $item['quantity'] }}</small>
                        </div>
                        <span class="text-body-secondary">
                            YER {{ number_format($lineTotal, 2) }}
                        </span>
                    </li>
                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (YER)</span>
                    <strong>YER {{ number_format($total, 2) }}</strong>
                </li>

            </ul>
        </div>

        {{-- Checkout --}}
        <div class="col-md-5 col-lg-4">
            <h4 class="mb-3">Checkout</h4>

            <form method="POST" action="{{ route('payment.purchase') }}">
                @csrf

                {{-- wallet --}}
                <h4 class="mb-3">Payment</h4>

                <div class="my-3">

                    <div class="form-check">
                        <input id="jaib" name="wallet" value="jaib" type="radio"
                            class="form-check-input wallet-option" checked>
                        <label class="form-check-label">Jaib</label>
                    </div>

                    <div class="form-check">
                        <input id="floosak" name="wallet" value="floosak" type="radio"
                            class="form-check-input wallet-option">
                        <label class="form-check-label">Floosak</label>
                    </div>

                </div>

                {{-- Jaib Code --}}
                <div class="mb-3" id="jaib-code-box">
                    <label class="form-label">Jaib Code</label>
                    <select class="form-control" name="code">
                        <option value="">Select Code</option>
                        <option value="1112">1112</option>
                        <option value="1113">1113</option>
                        <option value="1114">1114</option>
                        <option value="1115">1115</option>
                        <option value="1116">1116</option>
                    </select>
                </div>

                {{-- amount --}}
                <input type="hidden" name="amount" value="{{ $total }}">

                {{-- items --}}
                <input type="hidden" name="items" value='@json($items)'>

                <button class="w-100 btn btn-primary btn-lg">
                    Continue to checkout
                </button>

            </form>
        </div>

    </div>

    {{-- JS لإخفاء كود jaib إذا اختار floosak --}}
    <script>

        const walletOptions = document.querySelectorAll('.wallet-option');
        const jaibCodeBox = document.getElementById('jaib-code-box');

        walletOptions.forEach(option => {
            option.addEventListener('change', function() {

                if(this.value === 'jaib'){
                    jaibCodeBox.style.display = 'block';
                } else {
                    jaibCodeBox.style.display = 'none';
                }

            });
        });

    </script>

</x-frontend::layouts.master>