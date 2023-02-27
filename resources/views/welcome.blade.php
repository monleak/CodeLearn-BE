<x-layout>
    @section('content')
        @php
            try {
                \DB::connection()->getPDO();
                echo \DB::connection()->getDatabaseName();
            } catch (\Exception $e) {
                echo 'None';
            }
        @endphp
    @endsection
</x-layout>
