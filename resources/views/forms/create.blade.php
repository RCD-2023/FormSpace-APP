<x-layout>
    <x-slot name="title">Main Form | Create entries</x-slot>
    <h1 class="text-3xl">Main Form Page</h1>

    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">
            Vendor Data Form
        </h2>
        <form method="POST" action="/entries" enctype="multipart/form-data">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                This is a demo form for collecting data about a vendor
            </h2>
            <x-inputs.text id="vName" name="vendor_name" label="Vendor Name" placeholder="AlgoMix" />

            <x-inputs.text-area id="description" name="vendor_desc" label="Vendor Description"
                placeholder="A maximum 2 statements" />

            <x-inputs.text id="v_email" type="email" name="v_email" label="Contact email" placeholder="Office email" />

            <x-inputs.text id="v_website" type='url' name="v_website" label="Company website"
                placeholder="www.site.com" />

            <x-inputs.text id="empNum" name="employee_num" label="Employee number" type="number" placeholder="200" />

            <x-inputs.select id="org_type" name="organisation_type" label="Organisation Type"
                value="{{ old('organisation_type') }}" :options="['corporation' => 'Corporation', 'proprietorship' => 'Proprietorship', 'partnership' => 'Partnership']" />

            <div class="flex flex-col md:flex-row mb-2">
                <h1 class="text-gray-700 font-bold">Nature of bussiness or trade </h1>
                <span class="text-gray-700">&nbsp;&#40;you
                    can check multiple&#41; </span>
            </div>
            <x-inputs.checkbox-group name="business_type" label="" :options="['manufacturer' => 'Manufacturer', 'inf_services' => 'Inf Services', 'retail' => 'Retail', 'trading' => 'Trading', 'consultancy' => 'Consultancy', 'web_dev' => 'Web Dev', 'other' => 'Other']" :selected="[]" />
            <hr class="border border-1 border-gray-200 mb-2">

            <x-inputs.text id="address" name="v_address" label="Address" placeholder="123 Via Apia" />

            <x-inputs.text id="country" name="v_country" label="Country" placeholder="Italy" />

            <x-inputs.text id="city" name="v_city" label="City" placeholder="Roma" />


            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                Save
            </button>
        </form>
    </div>
</x-layout>