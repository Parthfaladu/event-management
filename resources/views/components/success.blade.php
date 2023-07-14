@if (session('success'))
    <div class="bg-green-500 text-white flex items-center justify-between px-4 py-3 rounded relative" role="alert">
        <div>{{ session('success') }}</div>
        <button type="button" class="text-white hover:text-gray-200 absolute top-0 bottom-0 right-0 px-4 py-3"
            onclick="closeSuccessMessage()">&times;</button>
    </div>
@endif

<script>
    function closeSuccessMessage() {
        const successMessage = document.querySelector('.bg-green-500');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }
</script>
