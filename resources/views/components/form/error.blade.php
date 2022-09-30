@props(['name'])

@error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror


{{--Alle errors weergeven--}}
{{--                @if ($errors->any())--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li class="text-red-500 text-xs">{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}
