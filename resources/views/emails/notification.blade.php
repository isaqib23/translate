<x-mail::message>
# Hello {{ $name }}

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

