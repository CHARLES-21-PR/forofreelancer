<section>
    
        <div class="flex justify-center items-center max-w-xl mx-auto ">
            <form method="POST" action="{{ route('profile.update-photo') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <x-label for="photo" :value="__('Profile Photo')" />
                    <input id="photo" type="file" name="photo" class="mt-1 block w-full" />
                    @error('photo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Update Photo') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Mostrar la foto de perfil -->
            @if (Auth::user()->photo)
                <div class="p-4 sm:p-8">
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile Photo" class="rounded-full h-20 w-20 object-cover">
                </div>
            @endif
        </div>
        
            
        
    
</section>
