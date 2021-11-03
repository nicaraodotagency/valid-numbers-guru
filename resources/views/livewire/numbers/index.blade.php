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
                    <th>Result</th>
                </tr>
                </thead>
                @if(!$numbers->isEmpty())
                    <tbody>
                    @foreach($numbers as $number)
                        <tr class="text-center border border-gray-300 p-2">
                            <td class="p-2">{{ $number->id }}</td>
                            <td class="p-2">{{ $number->number }}</td>
                            <td class="p-2">
                                @if(!is_null($number->result))
                                    @if ($number->result['countryCode'])
                                        {{ $number->result['countryAbbreviation']." [".$number->result['countryCode']."] " }}
                                    @endif
                                    {{ $number->result['valid']?"Valid":"Invalid" }}
                                    @if ($number->result['error'])
                                        {{ ", ".$number->result['error'] }}
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tbody>
                    <tr class="text-center border border-gray-300 p-2">
                        <td class="p-2" colspan="3">There are not numbers in this list</td>
                    </tr>
                    </tbody>
                @endif
            </table>
        </div>
</div>
