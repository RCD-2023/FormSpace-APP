<x-layout>
    <div class="flex flex-col container mx-auto text-center">
        <div class="bg-cyan-300 block w-full p-6 border border-default rounded-base shadow-xs  mt-6 mb-10">
            <p> This is a demo of a real-world data collection application.
                It offers a more structured alternative to Excel or Google Sheets,
                with improved input validation and data organization.
                <br>
                <br>
                To get a demo account or any other questions feel free to contact
                <strong>codreanu_danielromeo@yahoo.com</strong>.
            </p>
        </div>
        <div class="mt-2 md:mt-10 ">
            <h1 class="text-xl md:text-3xl mb-8">To Access Forms Area You Must Login </h1>
            <span>
                <x-button-link bgClass="bg-blue-600" hoverClass="hover:bg-blue-700"
                    class="px-6 text-white font-medium text-xl" url="/login">Login</x-button-link>
            </span>
        </div>
    </div>
</x-layout>