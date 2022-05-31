@extends('layouts.layout')
@section('content')
        

<h2 class="intro-y text-lg font-medium mt-10">
    Data Transaksi
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a  href="javascript:;" data-toggle="modal" data-target="#add-item-modal" class="btn btn-primary shadow-md mr-2">Tambah Transaksi</a>
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button>
            <div class="dropdown-menu w-20">
                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                </div>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visibl table-responsive">
        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">  @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x" class="w-4 h-4"></i> </button> </div>
       
    @endif
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="text-center whitespace-nowrap">No Resi</th>
                    <th class="text-center whitespace-nowrap">Pengirim</th>
                    <th class="text-center whitespace-nowrap">Penerima</th>
                    <th class="text-center whitespace-nowrap">Destinasi</th>
                    <th class="text-center whitespace-nowrap">Barang</th>
                    <th class="text-center whitespace-nowrap">Packing</th>
                    <th class="text-center whitespace-nowrap">Service</th>
                    <th class="text-center whitespace-nowrap">Asuransi</th>
                    <th class="text-center whitespace-nowrap">Tanggal</th>
                    <th class="text-center whitespace-nowrap">Jumlah</th>
                    <th class="text-center whitespace-nowrap">Berat</th>
                    <th class="text-center whitespace-nowrap">Deskripsi</th>
                    <th class="text-center whitespace-nowrap">Instruksi</th>
                    <th class="text-center whitespace-nowrap">Biaya barang</th>
                    <th class="text-center whitespace-nowrap">Diskon</th>
                    <th class="text-center whitespace-nowrap">Biaya Pengiriman</th>
                    <th class="text-center whitespace-nowrap">Disposisi</th>
                    <th class="text-center whitespace-nowrap">Status Pengiriman</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($transaksis as $item)
                <tr class="intro-x">
                    <td class="w-40"><a href="" class="font-medium whitespace-nowrap">{{ $no++ }}</a></td>
                    <td><a href="" class="font-medium whitespace-nowrap">{{ $item->no_resi }}</a></td>
                    <td><a href="" class="font-medium whitespace-nowrap">{{ $item->pengirim }}</a></td>
                    <td><a href="" class="font-medium whitespace-nowrap">{{ $item->penerima }}</a></td>
                    <td class="w-40 text-center">{{ $item->destinasi }}</td>
                    <td class="w-40 text-center">{{ $item->barang }} </td>
                    <td class="w-40 text-center">{{ $item->packing }} </td>
                    <td class="w-40 text-center">{{ $item->service }} </td>
                    <td class="w-40 text-center">{{ $item->asuransi }} </td>
                    <td class="w-40 text-center">{{ $item->tanggal }} </td>
                    <td class="w-40 text-center">{{ $item->jumlah }} </td>
                    <td class="w-40 text-center">{{ $item->berat }} </td>
                    <td class="w-40 text-center">{{ $item->deskripsi }} </td>
                    <td class="w-40 text-center">{{ $item->instruksi }} </td>
                    <td class="w-40 text-center">{{ $item->biaya_barang }} </td>
                    <td class="w-40 text-center">{{ $item->diskon }} </td>
                    <td class="w-40 text-center">{{ $item->biaya_pengiriman }} </td>
                    <td class="w-40 text-center">{{ $item->disposisi }} </td>
                    <td class="w-40 text-center">{{ $item->status_pengiriman }} </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Cetak resi </a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Disposisi </a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <ul class="pagination">
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
            </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li> <a class="pagination__link" href="">1</a> </li>
            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
            <li> <a class="pagination__link" href="">3</a> </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
            </li>
        </ul>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-gray-600 mt-2">
                        Do you really want to delete these records? 
                        <br>
                        This process cannot be undone.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" class="btn btn-danger w-24">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->

 <!-- BEGIN: Add Item Modal -->
 <div id="add-item-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Tambah Kota
                </h2>
            </div>

            

            <form method="post" action="{{ route('kota.store') }}">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label for="nama_kota" class="form-label">Nama Kota</label>
                        <input type="text" id="nama_kota" name="nama_kota" class="form-control w-full mt-2" placeholder="Nama Kota">
                    </div>
                    <div class="col-span-12">
                        <label for="kode_kota" class="form-label">Kode Kota</label>
                        <textarea id="kode_kota" class="form-control w-full mt-2" name="kode_kota" placeholder="kode kota"></textarea>
                    </div>
                    <div class="col-span-12">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea id="keterangan" class="form-control w-full mt-2" name="keterangan" placeholder="keterangan"></textarea>
                    </div>
                   
                
                </div>
                <div class="modal-footer text-right">
                    <button data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Batal</button>
                    <button type="submit" class="btn btn-primary w-24">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Add Item Modal -->
    
        
       
        
@stop