<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Files') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    <table class="min-w-full bg-white" style="width: 100%">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">File</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Sent at</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($files as $file)
                                <tr>
                                    <td class="text-left py-3 px-4">
                                        <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">{{ $file->file_name }}</a>
                                    </td>
                                    <td class="text-left py-3 px-4">{{ $file->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $files->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Set the Payment</h1>

        <form id="amount-form">
            @csrf
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="text" id="amount" name="amount" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <button style="background-color: blue" type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Submit Payment
            </button>
        </form>
    </div>

    <script>
        document.getElementById('amount-form').addEventListener('submit', function (e) {
            e.preventDefault();

            fetch('/set_amount', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({
                    amount: document.getElementById('amount').value,
                    uuid: "<?=request()->segment(2)?>"
                })
            })
            .then(response => response.json())
            .then(data => {
            console.log(data)
                alert(data.message);
            });
        });
    </script>
</x-app-layout>
