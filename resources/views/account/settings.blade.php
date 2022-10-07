<x-layout>
    <x-account-setting heading="Account">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        <form method="POST" action="account" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <x-form.input name="username" value="{{ auth()->user()->username }}"/>
                            <x-form.input name="name" value="{{ auth()->user()->name }}"/>
                            <x-form.input name="email" type="email" value="{{ auth()->user()->email }}"/>
                            <x-form.input name="password" type="password" placeholder="********"/>
                            
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-account-setting>
</x-layout>
