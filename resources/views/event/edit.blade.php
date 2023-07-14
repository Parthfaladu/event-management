<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4">
                    <div class="p-6 text-gray-900 col-span-2">
                        Edit Events
                    </div>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <form action="{{ route('event.update', $event->id) }}" class="px-16 py-6" method="POST" @put
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @include('components.error')
                        @include('event.form')
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
