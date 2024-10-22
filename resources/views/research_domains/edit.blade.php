<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Research Domain') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('research-domains.update', $researchDomain->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="research_area" class="block text-gray-700">Research Area</label>
                            <input type="text" name="research_area"
                                class="border-gray-300 rounded-md shadow-sm mt-1 w-full"
                                value="{{ old('research_area', $researchDomain->research_area) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="keywords" class="block text-gray-700">Keywords</label>
                            <div id="chip-container-keywords" class="flex flex-wrap gap-2 mb-2">
                                @foreach ($researchDomain->keywords as $keyword)
                                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full inline-flex items-center mr-2 mb-2">
                                        {{ $keyword }}
                                        <button type="button" class="ml-2 text-red-500 focus:outline-none" onclick="removeChip(this, '{{ $keyword }}', 'keywords')">&times;</button>
                                    </span>
                                @endforeach
                            </div>
                            <input type="text" id="keywords_input" placeholder="Type and press enter..."
                                class="border-gray-300 rounded-md shadow-sm mt-1 w-full" />
                            <input type="hidden" name="keywords" id="keywords" value="{{ json_encode(old('keywords', $researchDomain->keywords)) }}" />
                        </div>

                        <div class="mb-4">
                            <label for="targeted_sdg" class="block text-gray-700">Targeted SDGs</label>
                            <div id="chip-container-sdg" class="flex flex-wrap gap-2 mb-2">
                                @foreach ($researchDomain->targeted_sdg as $sdg)
                                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full inline-flex items-center mr-2 mb-2">
                                        {{ $sdg }}
                                        <button type="button" class="ml-2 text-red-500 focus:outline-none" onclick="removeChip(this, '{{ $sdg }}', 'targeted_sdg')">&times;</button>
                                    </span>
                                @endforeach
                            </div>
                            <input type="text" id="sdg_input" placeholder="Type and press enter..."
                                class="border-gray-300 rounded-md shadow-sm mt-1 w-full" />
                            <input type="hidden" name="targeted_sdg" id="targeted_sdg" value="{{ json_encode(old('targeted_sdg', $researchDomain->targeted_sdg)) }}" />
                        </div>

                        <button type="submit" class="bg-gray-800 text-white font-semibold py-2 px-4 rounded">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const form = document.querySelector('form');
    const keywordsContainer = document.getElementById('chip-container-keywords');
    const sdgContainer = document.getElementById('chip-container-sdg');
    const keywordsInputField = document.getElementById('keywords_input');
    const sdgInputField = document.getElementById('sdg_input');
    const keywordsInput = document.getElementById('keywords');
    const sdgInput = document.getElementById('targeted_sdg');

    let keywordsArray = JSON.parse(keywordsInput.value) || [];
    let sdgArray = JSON.parse(sdgInput.value) || [];

    // Update hidden input values
    function updateHiddenInput(input, array) {
        input.value = JSON.stringify(array);
    }

    // Add keywords chip
    keywordsInputField.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addChip(keywordsInputField, keywordsContainer, keywordsArray, keywordsInput);
        }
    });

    // Add SDG chip
    sdgInputField.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addChip(sdgInputField, sdgContainer, sdgArray, sdgInput);
        }
    });

    // Function to add a chip and update the array
    function addChip(inputField, container, array, hiddenInput) {
        const value = inputField.value.trim();
        if (value === '') return;
        
        array.push(value);
        updateHiddenInput(hiddenInput, array);

        const chip = document.createElement('span');
        chip.classList.add('bg-gray-200', 'text-gray-800', 'px-2', 'py-1', 'rounded-full', 'inline-flex', 'items-center', 'mr-2', 'mb-2');
        chip.textContent = value;

        const closeButton = document.createElement('button');
        closeButton.type = 'button';
        closeButton.classList.add('ml-2', 'text-red-500', 'focus:outline-none');
        closeButton.innerHTML = '&times;';
        closeButton.addEventListener('click', function() {
            chip.remove();
            const index = array.indexOf(value);
            if (index > -1) {
                array.splice(index, 1);
                updateHiddenInput(hiddenInput, array);
            }
        });

        chip.appendChild(closeButton);
        container.appendChild(chip);
        inputField.value = '';
    }

    // Function to remove a chip and update the array
    function removeChip(button, value, inputName) {
        const chip = button.parentElement;
        const input = document.getElementById(inputName);
        const array = JSON.parse(input.value) || [];

        const index = array.indexOf(value);
        if (index > -1) {
            array.splice(index, 1);
            updateHiddenInput(input, array);
            chip.remove();
        }
    }
</script>
