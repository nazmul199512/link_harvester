@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full md:w-1/2">
            <div class="bg-white rounded-lg shadow-md">
                <div class="bg-primary text-white py-4 px-6 rounded-t-lg">
                    <h2 class="text-2xl font-bold">Add URLs</h2>
                </div>
                <div class="p-6">
                    <form x-data="formData()" x-on:submit.prevent="submitForm" action="{{ route('urls.store') }}" method="POST" ref="form">
                        @csrf

                        <div class="mb-6">
                            <label for="urls" class="block text-gray-700 font-bold mb-2">Enter URLs</label>
                            <textarea id="urls" name="urls" class="form-input w-full h-32 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-primary" x-model="urls" placeholder="Enter URLs..."></textarea>
                            <small class="text-danger" x-show="errors.urls" x-text="errors.urls"></small>
                        </div>

                        <div class="flex justify-between">
                            <button type="submit" class="btn-primary py-2 px-4 rounded-lg" :disabled="isSubmitting">
                                <span x-show="isSubmitting" class="animate-spin mr-2">Processing</span>
                                Submit
                            </button>
                            <a href="{{ route('urls.index') }}" class="btn-secondary py-2 px-4 rounded-lg">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function formData() {
        return {
            urls: '',
            errors: {},
            isSubmitting: false,
            submitForm() {
                this.isSubmitting = true;
                this.errors = {};

                if (!this.urls.trim()) {
                    this.errors.urls = 'Please enter at least one URL.';
                    this.isSubmitting = false;
                    return;
                }

                const formData = new FormData();
                formData.append('urls', this.urls);

                fetch('{{ route('urls.store') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    this.urls = '';
                    this.isSubmitting = false;
                })
                .catch(error => {
                    this.isSubmitting = false;
                });
            }
        };
    }
</script>
@endsection
