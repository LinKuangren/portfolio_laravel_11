<x-mail::message>
# Nouveau mail de : {{ $data['email'] }}
- Phone : {{ $data['phone'] }}

**Message :**<br/>
{{ $data['content'] }}

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}
</x-mail::message>
