<x-frontend::layouts.master>
    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <img class="mb-4" src="{{ asset('modules/frontend/bootstrap/assets/brand/bootstrap-logo.svg') }}"
                alt="" width="72" height="57" />
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingName" name="name" placeholder="Name"
                    required />
                <label for="floatingName">Name</label>
            </div>

            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="floatingInput" name="email"
                    placeholder="name@example.com" required />
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingMobile" name="mobile" placeholder="Mobile"
                    required />
                <label for="floatingMobile">Mobile</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password"
                    required />
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPasswordConfirmation"
                    name="password_confirmation" placeholder="Confirm Password" required />
                <label for="floatingPasswordConfirmation">Confirm Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">
                Sign up
            </button>

        </form>

        <a class="btn btn-outline-secondary w-100 py-2 mt-2" href="{{ route('login') }}">
            Sign in
        </a>
    </main>
</x-frontend::layouts.master>
