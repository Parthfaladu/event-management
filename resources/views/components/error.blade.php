@if ($errors->any())
    <div class="bg-red-200 text-red-800 p-4 mb-4">
        <div class="flex justify-between">
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="text-red-800 hover:text-red-600 font-bold"
                onclick="closeErrorSection()">&times;</button>
        </div>
    </div>
@endif

<script>
    function closeErrorSection() {
        const errorSection = document.querySelector('.bg-red-200');
        if (errorSection) {
            errorSection.style.display = 'none';
        }
    }
</script>
