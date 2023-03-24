<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-4">
                <a href="{{ route('admin.roles.index') }}"
                    class="px-4 py-2 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">Index
                    Roles</a>
            </div>
            <h1 class="uppercase text-2xl font-semibold tracking-widest text-white ml-4 mt-10">add roles</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        @error('name')
                            <span class="text-red-500 text-sm">The name field is required</span>
                        @enderror
                        @foreach ($tables as $table)
                            <div class="mt-3 text-white bg-red-300">
                                <h1> <input type="checkbox" class="m-2 check_all_{{ $table }}">
                                    {{ $table }}
                                </h1>
                                @foreach ($permissions as $item)
                                    @if (strpos($item->name, $table))
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $item->name }}"
                                                class="m-2 {{ $table }}">
                                            {{ head(explode('.', $item->name)) }}
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="p-2 bg-sky-500 hover:bg-slate-200 text-slate-100 hover:text-gray-800 rounded-md">
                                Add Roles
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    @foreach ($tables as $table)
        $(`.check_all_{{ $table }}`).click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(`.{{ $table }}`).each(function() {
                    this.checked = true;
                });
            } else {
                $(`.{{ $table }}`).each(function() {
                    this.checked = false;
                });
            }
        });
    @endforeach
</script>
