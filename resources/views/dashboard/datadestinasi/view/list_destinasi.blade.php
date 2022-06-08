
<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    @if( empty($destinasis->total()))
    <div class="alert alert-warning  show mb-2 text-center" role="alert">DATA MASIH KOSONG</div> 
        @php
            return
        @endphp
    @endif
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2" id="myTabel">
        <thead>
            <tr>
                <th class="whitespace-nowrap">No</th>
                <th class="text-center whitespace-nowrap">Kota Origin</th>
                <th class="text-center whitespace-nowrap">Kota Destinasi</th>
                <th class="text-center whitespace-nowrap">Kecamatan</th>
                <th class="text-center whitespace-nowrap">Service</th>
                <th class="text-center whitespace-nowrap">Kode Destinasi</th>
                <th class="text-center whitespace-nowrap">Harga</th>
                <th class="text-center whitespace-nowrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                @endphp
                @foreach ($destinasis as $item)
                <tr class="intro-x">
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">{{ $no++ }}</a> 
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $item->kota_origin->nama_kota }}</a> 
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $item->kota_destinasi->nama_kota }}</a> 
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $item->kecamatan->nama_kecamatan }}</a> 
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $item->service->nama_service }}</a> 
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $item->kode_destinasi }}</a> 
                    </td>
                    <td class="w-40 text-center">
                        {{ $item->harga }}
                    </td>
    
            <td class="table-report__action w-56">
                <div class="flex justify-center items-center">

                    <a class="flex items-center mr-3 btn btn-sm" id="btn-edit" data-id_destinasi="{{ $item->id_destinasi }}"  data-id_kota_origin="{{ $item->id_kota_origin }}" data-id_kota_destinasi="{{ $item->id_kota_destinasi }}" data-id_kecamatan="{{ $item->id_kecamatan }}" data-id_service="{{ $item->id_service }}" data-kode_destinasi="{{ $item->kode_destinasi }}" data-harga="{{ $item->harga }}" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>

                    <a class="flex items-center text-theme-6 btn btn-sm " id="btn-delete"  data-id="{{ $item->id_destinasi }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>

                </div>
            </td>
        </tr>
        @endforeach
</tbody>
</table>

</div>
<!-- END: Data List -->

{{$destinasis->links()}} 