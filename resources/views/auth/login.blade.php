<x-layout>

    <!-- Login Form Box -->
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <x-inputs.text id="user_code" name="user_code" placeholder="User id" />
            <x-inputs.text type="password" id="password" name="password" placeholder="your password" />
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">
                Login
            </button>
            <div class="mt-4 text-gray-500 space-y-2">
                <p>
                    Don't have an account?
                </p>
                <p class="text-gray-700">Contact the admin at:
                    <a class="text-blue-900 underline" href="mailto:codreanu_danielromeo@yahoo.com">
                        <span class="font-medium">codreanu_danielromeo@yahoo.com</span>
                    </a>
                </p>
                <p class="text-gray-700">Or get back to:
                    <a href="{{ url('/') }}"
                        class="inline-block font-semibold bg-green-200 py-0.5 px-1 rounded transition-all transform duration-300 ease-in-out hover:bg-green-300 hover:scale-105 ">
                        Homepage
                    </a>
                </p>
            </div>
        </form>
    </div>

</x-layout>