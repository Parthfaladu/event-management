<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4">
                    <div class="p-6 text-gray-900 col-span-2">
                        Events
                    </div>
                    <div class="text-right pt-5">
                        <a href="{{ url('/event/create') }}"
                            class="mr-5 bg-blue-500
                            hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-50">Create
                            Event</a>
                    </div>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="px-4">
                        @include('components.success')
                    </div>
                    @if (count($events) > 0)
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Event type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $event->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $event->description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $event->type->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img src="{{ $event->image }}" width="50" />
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex">
                                                <a href="{{ route('event.edit', $event->id) }}"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                                <form action="{{ route('event.delete', $event->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="flex justify-center py-16">
                            <div class="text-xl text-gray-400">No events created</div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
