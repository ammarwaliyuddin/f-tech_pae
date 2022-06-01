@php
$no = 1;
@endphp
@foreach ($users as $item)
<tr class="intro-x">
    <td class="w-40">
        <a href="" class="font-medium whitespace-nowrap">{{ $no++ }}</a> 
    </td>
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $item->nama_user }}</a> 
    </td>
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $item->password }}</a> 
    </td>
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $item->level }}</a> 
    </td>
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $item->alamat }}</a> 
    </td>
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $item->hp }}</a> 
    </td>
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $item->kota }}</a> 
    </td>
    <td>
        <a href="" class="font-medium whitespace-nowrap">{{ $item->kecamatan }}</a> 
    </td>
    
    
    <td class="table-report__action w-56">
        <div class="flex justify-center items-center">

            <a class="flex items-center mr-3 btn btn-sm" id="btn-edit" data-id_user="{{ $item->id_user }}"  data-barang="{{ $item->jenis_barang}}" data-nama_user="{{ $item->nama_user }}" data-password="{{ $item->password }}" data-level="{{ $item->level }}" data-alamat="{{ $item->alamat }}" data-hp="{{ $item->hp }}" data-kota="{{ $item->kota }}" data-kecamatan="{{ $item->kecamatan }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>

            <a class="flex items-center text-theme-6 btn btn-sm " id="btn-delete"  data-id="{{ $item->id_user }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>

        </div>
    </td>
</tr>
@endforeach