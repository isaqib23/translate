<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    <table class="min-w-full bg-white" style="width: 100%">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">From</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">To</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email/Mobile</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">View Files</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Sent at</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-left py-3 px-4">{{ ucwords(getCountryName($user->from)) }}</td>
                                    <td class="text-left py-3 px-4">{{ ucwords(getCountryName($user->to)) }}</td>
                                    <td class="text-left py-3 px-4">{{ $user->email }}</td>
                                    <td class="text-left py-3 px-4">{{ $user->mobile }}</td>
                                    <td class="text-left py-3 px-4">
                                        <a class="btn btn-primary" href="/view_files/{{$user->user_uuid}}">View Files</a>
                                    </td>
                                    <td class="text-left py-3 px-4">{{ $user->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
