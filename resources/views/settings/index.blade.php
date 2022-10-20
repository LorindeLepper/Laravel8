<x-layout>
    <x-account-setting heading="Settings">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <form method="UPDATE" action="settings">
                                @csrf

                                <x-form.input name="username" placeholder="{{ auth()->user()->username }}" />
{{--                                <x-form.input name="name" placeholder="{{ auth()->user()->name }}" />--}}
{{--                                <x-form.input name="email" type="email" placeholder="{{ auth()->user()->email }}" />--}}
{{--                                <x-form.input name="password" type="password" placeholder="********" />--}}
{{--                                TODO: Display current avatar, display new avatar --}}
                                <div class="flex mt-6">
                                    <div class="flex-1">
{{--                                        <x-form.input name="avatar" type="file" :value="old('avatar', $user->avatar)"/>--}}
                                    </div>

{{--                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="" class="rounded-xl ml-6" width="100">--}}
                                </div>

{{--                                TODO: fix update button --}}
                                <x-form.button>Update account</x-form.button>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-account-setting>
</x-layout>
