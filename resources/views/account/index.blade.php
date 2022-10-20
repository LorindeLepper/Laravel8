<x-layout>
    <style>.avatar{background-color:grey; width:80px; height:80px; border-radius:9px; position:relative;} .avatar:hover{background-color:dimgray;}</style>
    <x-account-setting heading="Account">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <div class="flex">
                                @if($user->avatar == NULL)
                                    <a href="/settings" class="mr-3 avatar">
                                        <div class="text-white font-bold" style="position:absolute; left:30%; top:35%;">
                                            edit
                                        </div>
                                    </a>
                                @else
                                    <div class="mr-3"><img loading="lazy" class="lazy relative lazyloaded" src="{{ $user->avatar }}" width="72" height="72" style="width: 100%; border-radius: 9px;"></div>
                                @endif
                                <div class="font-bold md:text-2xl">{{ $user->username }}</div>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-account-setting>
</x-layout>
