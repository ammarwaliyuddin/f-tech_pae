@php
                $no = 1;
                @endphp
                @foreach ($disposisis as $item)
                <tr class="intro-x">
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">{{ $no++ }}</a> 
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $item->nama_disposisi }}</a> 
                    </td>
                    <td class="w-40 text-center">
                        {{ $item->keterangan }}
                    </td>
    <td class="table-report__action w-56">
        <div class="flex justify-center items-center">

            <a class="flex items-center mr-3 btn btn-sm" id="btn-edit" data-id_disposisi="{{ $item->id_disposisi }}"  data-nama_disposisi="{{ $item->nama_disposisi }}" data-keterangan="{{ $item->keterangan }}" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>

            <a class="flex items-center text-theme-6 btn btn-sm " id="btn-delete"  data-id="{{ $item->id_disposisi}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>

        </div>
    </td>
</tr>
@endforeach