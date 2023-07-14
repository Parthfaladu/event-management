<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name:</label>
    <input type="text" name="name" id="name"
        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        value="{{ isset($event) ? old('name', $event->name) : old('name') }}" required>
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description:</label>
    <textarea name="description" id="description" rows="3"
        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        required>{{ isset($event) ? old('name', $event->description) : old('description') }}</textarea>
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="type_id">Type:</label>
    <select name="type_id" id="type_id"
        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        required>
        <option value="">Select a type</option>
        @foreach ($types as $type)
            <option @if ((isset($event) ? old('type_id', $event->type_id) : old('type_id')) == $type->id) selected @endif value="{{ $type->id }}">{{ $type->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image:</label>
    <input type="file" name="image" id="image" accept="image/*"
        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        onchange="previewImage(event)">
    <img id="imagePreview" width="250" @if (isset($event)) src="{{ $event->image }}" @endif>
</div>
<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>


<script>
    function previewImage(event) {
        var reader = new FileReader();
        var imageElement = document.getElementById('imagePreview');

        reader.onload = function() {
            imageElement.src = reader.result;
        }

        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        } else {
            imageElement.src = '';
        }
    }
</script>
