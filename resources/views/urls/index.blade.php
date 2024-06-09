@extends('layouts.app')

@section('content')
<div class="container mx-auto" x-data="manageUrls()">
    <div class="bg-white rounded-lg shadow-md">
        <div class="bg-primary text-white py-4 px-6 rounded-t-lg flex justify-between items-center">
            <h2 class="text-2xl font-bold">Manage URLs</h2>
            <a href="{{ route('urls.add') }}" class="btn-primary py-2 px-4 rounded-lg" style="color: black; font-weight: bold;">Add URL</a>
            </div>
        <div class="p-6">
            <div class="flex flex-wrap mb-6 items-end">
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
                    <label for="search" class="block text-gray-700 font-bold mb-2">Search URL</label>
                    <input type="text" id="search" x-model="search" class="form-input w-full" placeholder="Search URL">
                </div>
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
                    <label for="sort_direction" class="block text-gray-700 font-bold mb-2">Sort Direction</label>
                    <select id="sort_direction" x-model="sort_direction" class="form-select w-full">
                        <option value="desc">Descending</option>
                        <option value="asc">Ascending</option>
                    </select>
                </div>
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
                    <button @click="applyFilters" class="btn-primary py-2 px-4 rounded-lg mt-6 md:mt-0">Apply Filters</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border bg-white">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left border">URL</th>
                            <th class="px-4 py-2 text-left border">Domain</th>
                            <th class="px-4 py-2 text-left border">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($urls as $url)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2">{{ $url->url }}</td>
                            <td class="border px-4 py-2">{{ $url->baseDomain->domain_name }}</td>
                            <td class="border px-4 py-2">{{ $url->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between mt-6">
                <!-- <a href="{{ route('urls.add') }}" class="btn-primary py-2 px-4 rounded-lg">Add URL</a> -->
                {{ $urls->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('manageUrls', () => ({
            search: '',
            sort_direction: 'desc',
            applyFilters() {
                const searchParams = new URLSearchParams();
                if (this.search) {
                    searchParams.append('search', this.search);
                }
                searchParams.append('sort_direction', this.sort_direction);

                window.location.href = `?${searchParams.toString()}`;
            }
        }));
    });
</script>
@endsection
