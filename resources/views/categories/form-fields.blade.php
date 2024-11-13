<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name"
                  name="name"
                  type="text"
                  value="{{ old('name', $category->name) }}"
                  class="block w-full mt-1"
    />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
<div>
    <x-input-label for="description" :value="__('Description')" />
    <x-text-input id="description"
                  name="description"
                  type="text"
                  value="{{ old('description', $category->description) }}"
                  class="block w-full mt-1"
    />
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

