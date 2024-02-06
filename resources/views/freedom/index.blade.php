@extends('layout')

@section('content')

<livewire:freedom.index/>

@endsection

@push("scripts")
    <script>
        const element = document.getElementById('mobile_phone');
        const maskOptions = {
            mask: '+{7}(000)000-00-00'
        };
        const mask = IMask(element, maskOptions);
    </script>
@endpush
