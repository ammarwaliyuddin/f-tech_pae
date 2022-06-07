
<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    @if( empty($keuangans->total()))
    <div class="alert alert-warning  show mb-2 text-center" role="alert">DATA MASIH KOSONG</div> 
        @php
            return
        @endphp
    @endif
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2" id="myTabel">
        <thead>
            <tr>
                <<th class="whitespace-nowrap">No</th>
                <th class="text-center whitespace-nowrap">No Resi</th>
                <th class="text-center whitespace-nowrap">Pengirim</th>
                <th class="text-center whitespace-nowrap">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                @endphp
                @foreach ($keuangans as $item)
                <tr class="intro-x">
                    <td class="w-1">
                        {{ $no++ }}</a> 
                    </td>
                    <td class="w-40 text-center">
                        {{ $item->no_resi }}</a> 
                    </td>
                    <td class="w-40 text-center">
                        {{ $item->pengirim }}
                    </td>
                    <td class="w-40 text-center">
                        total
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    
</div>
<!-- END: Data List -->

{{$keuangans->links()}} 