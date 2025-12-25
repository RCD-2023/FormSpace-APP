<x-layout>
    <x-slot name="title">Entries Listing</x-slot>
    <h1 class="text-2xl">All entries page</h1>
    <p>You are logged as: {{$user->name }} code: {{$user->user_code }}</p>

    @if ($allEntries->isEmpty())
        <p>No entry till now</p>
    @else
        <x-listings-table :entries="$allEntries" />
    @endif
    {{--Pagination links just in case I want to use instead of table pagination--}}
    {{-- {{ $allEntries->links() }} --}}
</x-layout>