<x-layout>

  
    @if(session('success'))
        <div class="p-3 mb-4 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

  
    @if(session('error'))
        <div class="p-3 mb-4 bg-red-500 text-white rounded">
            {{ session('error') }}
        </div>
    @endif


    @error('email')
        <div class="p-3 mb-4 bg-red-500 text-white rounded">
            {{ $message }}
        </div>
    @enderror

    
    <form method="POST" action="/formtest">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-white/10">
                <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">

                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium text-white">Email</label>

                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white/5 pl-3 outline outline-1 outline-white/10 focus-within:outline-2 focus-within:outline-indigo-500">
                                <input 
                                    id="email" 
                                    type="email" 
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="juandelacruz@umindanao.edu.ph"
                                    class="block w-full bg-transparent py-1.5 text-white placeholder:text-gray-500 focus:outline-none"
                                />
                            </div>
                        </div>

                        <div class="mt-3 flex justify-end">
                            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white">
                                Save
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

  
    <div class="mt-6 p-5 bg-gray-800 rounded-lg">
        <h2 class="text-lg font-semibold text-white mb-3">Emails</h2>

        @if(count($emails) === 0)
            <p class="text-gray-400 text-sm">No emails yet.</p>
        @endif

        <ul class="space-y-2">
            @foreach ($emails as $index => $email)
                <li class="flex justify-between items-center bg-gray-700 p-2 rounded text-white text-sm">

                    <span>{{ $email }}</span>

                    {{-- DELETE BUTTON --}}
                    <form method="POST" action="/delete-email">
                        @csrf
                        <input type="hidden" name="index" value="{{ $index }}">
                        <button class="bg-red-500 px-2 py-1 rounded text-xs">
                            Delete
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    </div>

</x-layout>