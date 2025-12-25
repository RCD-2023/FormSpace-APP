@props(['entries'])
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default py-2 px-2">
    <table id="default-table" class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
            <tr>
                <th class="px-6  py-3 font-medium">
                    <span class="flex items-center">
                        Vendor Name
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th data-type="date" data-format="YYYY/DD/MM">
                    <span class="flex items-center">
                        Created on
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class="px-6  py-3 font-medium">
                    <span class="flex items-center">
                        Created By:
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class="px-6  py-3 font-medium">
                    <span class="flex items-center">
                        Last modification
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class="px-6  py-3 font-medium">
                    <span class="flex items-center">
                        Modified By:
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class="px-6  py-3 font-medium">
                    <span class="flex items-center">
                        Actions
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entries as $entry)
                <tr class="bg-neutral-primary-soft border-b border-default">
                    <td class="font-medium text-heading whitespace-nowrap px-6 py-4">{{ $entry->vendor_name }}</td>
                    <td class="font-medium text-heading whitespace-nowrap px-6 py-4">{{$entry->created_at }}</td>
                    <td class="font-medium text-heading whitespace-nowrap px-6 py-4">
                        {{-- {{ $entry->user?->name ?? $entry->user_id ?? '—' }} --}}
                        {{ $entry->created_by?->user_code ?? '—' }}
                    </td>
                    <td class="font-medium text-heading whitespace-nowrap px-6 py-4">{{$entry->updated_at}}</td>
                    <td class="font-medium text-heading whitespace-nowrap px-6 py-4">
                        {{-- {{ $entry->user?->name ?? $entry->user_id ?? '—' }} --}}
                        {{ $entry->edited_by?->user_code ?? '—' }}
                    </td>
                    <td class=" flex flex-row font-medium text-heading whitespace-nowrap px-6 py-4">
                        <a href="{{ route('forms.edit', $entry->id) }}" class="font-medium text-fg-brand hover:underline">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('forms.destroy', $entry->id) }}"
                            onsubmit="return confirm('Are you sure you want to delete {{$entry->vendor_name  }} entry?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ms-3 font-medium text-red-600 hover:underline cursor-pointer"
                                data-entry-id="{{ $entry->id }}">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>