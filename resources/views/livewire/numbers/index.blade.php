<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

        <div class="rounded-lg block w-full overflow-x-auto p-6">
            <table class="table table-bordered w-full mt-5 bg-gray-50 border border-gray-300">
                <thead>
                <tr class="text-center border border-gray-300 p-2">
                    <th>No.</th>
                    <th>Number</th>
                </tr>
                </thead>
                <tbody>
                @foreach($numbers as $number)
                    <tr class="text-center border border-gray-300 p-2">
                        <td class="p-2">{{ $number->id }}</td>
                        <td class="p-2">{{ $number->number }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>
