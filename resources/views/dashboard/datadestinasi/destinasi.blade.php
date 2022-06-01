@extends('layouts.layout')
@section('content')

<h2 class="intro-y text-lg font-medium mt-10">
    Data Destinasi
</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a  data-toggle="modal" data-target="#add-item-modal" class="btn btn-primary shadow-md mr-2">Tambah Destinasi</a>
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button>
            <div class="dropdown-menu w-40">
                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
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
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">  @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x" class="w-4 h-4"></i> </button> </div>
       
    @endif
        <table class="table table-report -mt-2" id="myTabel">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="whitespace-nowrap">Kota Origin</th>
                    <th class="whitespace-nowrap">Kota Destinasi</th>
                    <th class="whitespace-nowrap">Nama Kecamatan</th>
                    <th class="whitespace-nowrap">Kode Destinasi</th>
                    <th class="text-center whitespace-nowrap">Harga</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody id="showData"></tbody>
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
            <li> <a class="pagination__link pagination__link--active" href="">1</a> </li>
            <li> <a class="pagination__link " href="">2</a> </li>
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


 <!-- BEGIN: Add Item Modal -->
 <div id="add-item-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Tambah Destinasi
                </h2>
            </div>

            <form method="post" id="form_tambah" onsubmit="return false;" enctype="multipart/form-data">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label for="kota_origin" class="form-label">Kota Origin</label>
                        <input type="text" id="kota_origin" name="kota_origin" class="form-control w-full mt-2" placeholder="Kota Origin">
                    </div>
                    <div class="col-span-12">
                        <label for="kota_destinasi" class="form-label">Kota Destinasi</label>
                        <input type="text" id="kota_destinasi" name="kota_destinasi" class="form-control w-full mt-2" placeholder="Kota Destinasi">
                    </div>
                    <div class="col-span-12">
                        <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                        <input type="text" id="nama_kecamatan" name="nama_kecamatan" class="form-control w-full mt-2" placeholder="Kota Destinasi">
                    </div>
                    <div class="col-span-12">
                        <label for="kode_destinasi" class="form-label">Kode Destinasi</label>
                        <input type="text" id="kode_destinasi" name="kode_destinasi" class="form-control w-full mt-2" placeholder="Kode Destinasi">
                    </div>
                    <div class="col-span-12">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group mt-2">
                            <div id="harga" class="input-group-text">%</div>
                            <input type="text" class="form-control w-full" id="harga" name="harga" placeholder="Harga" aria-describedby="Rp">
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer text-right">
                    <button data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Batal</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary w-24">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Add Item Modal -->

 <!-- BEGIN: Modal Content -->
 <div id="success-saved" class="modal " tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Berhasil Tersimpan!</div>
                    <div class="text-gray-600 mt-2">Data Anda tersimpan!</div>
                </div>
                <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="btn btn-primary w-24">Ok</button> </div>
            </div>
        </div>
    </div>
</div> <!-- END: Modal Content -->

{{-- <div class="overflow-y-auto flex justify-center items-center" style="height: 100vh;position: fixed;z-index: 10000000;background: rgba(0,0,0,.6509803921568628);margin-top: 0px;margin-left: 0px;padding-left: 0px;z-index: 10000;width: 100vw;top: 0;left: 0;"> 
    <div class="flex justify-center items-center">
                        
        <svg width="20" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8">
            <defs>
                <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                    <stop stop-color="rgb(45, 55, 72)" stop-opacity="0" offset="0%"></stop>
                    <stop stop-color="rgb(45, 55, 72)" stop-opacity=".631" offset="63.146%"></stop>
                    <stop stop-color="rgb(45, 55, 72)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <g fill="none" fill-rule="evenodd">
                <g transform="translate(1 1)">
                    <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="3">
                        <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                    </path>
                    <circle fill="rgb(45, 55, 72)" cx="36" cy="18" r="1">
                        <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
                    </circle>
                </g>
            </g>
        </svg>
        </div>
</div> --}}
 
<!-- BEGIN: Add Edit Modal -->
<div id="update-item-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Edit Destinasi
                </h2>
            </div>
            <form  method="post" id="form_edit" onsubmit="return false;" enctype="multipart/form-data">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <input type="hidden" class="id_destinasi" id="id_destinasi" name="id_destinasi" >

                    <div class="col-span-12">
                        <label for="kota_origin" class="form-label">Kota Origin</label>
                        <input type="text" id="kota_origin" name="kota_origin" class="form-control w-full mt-2 kota_origin" >
                    </div>
                    <div class="col-span-12">
                        <label for="kota_destinasi" class="form-label">Kota Destinasi</label>
                        <input type="text" id="kota_destinasi" name="kota_destinasi" class="form-control w-full mt-2 kota_destinasi" >
                    </div>
                    <div class="col-span-12">
                        <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                        <input type="text" id="nama_kecamatan" name="nama_kecamatan" class="form-control w-full mt-2 nama_kecamatan" >
                    </div>
                    <div class="col-span-12">
                        <label for="kode_destinasi" class="form-label">Kode Destinasi</label>
                        <input type="text" id="kode_destinasi" name="kode_destinasi" class="form-control w-full mt-2 kode_destinasi" >
                    </div>
                    <div class="col-span-12">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group mt-2">
                            <div id="harga" class="input-group-text">Rp.</div>
                            <input type="text" class="form-control w-full harga" id="harga" name="harga" placeholder="Harga" aria-describedby="Rp.">
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer text-right">
                    <button data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Batal</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary w-24" id="btn-update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Edit Item Modal -->

@stop
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
<script>
    
    function showData(){
        $.ajax({
            url:"{{URL::to('datadestinasi/destinasi-list')}}",
            type:"GET",
            data:'data',
            // beforeSend:function(){
            //     $("#showData").after().empty().html(`<tr>
            //         <td colspan="5">
                    
            //         <div role="alert" class="w-full alert alert-secondary show flex items-center mb-2"> <svg width="20" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8">
            //                                 <defs>
            //                                     <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
            //                                         <stop stop-color="rgb(45, 55, 72)" stop-opacity="0" offset="0%"></stop>
            //                                         <stop stop-color="rgb(45, 55, 72)" stop-opacity=".631" offset="63.146%"></stop>
            //                                         <stop stop-color="rgb(45, 55, 72)" offset="100%"></stop>
            //                                     </linearGradient>
            //                                 </defs>
            //                                 <g fill="none" fill-rule="evenodd">
            //                                     <g transform="translate(1 1)">
            //                                         <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="3">
            //                                             <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
            //                                         </path>
            //                                         <circle fill="rgb(45, 55, 72)" cx="36" cy="18" r="1">
            //                                             <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>
            //                                         </circle>
            //                                     </g>
            //                                 </g>
            //                             </svg>  &nbsp;&nbsp;Memuat Data </div>
            //         </td></tr>`
            //     );
                
            // },
            success:function(result){
                $("#showData").empty().html(result);
            }
        })
    }

    $(document).on("submit","#form_tambah",function(e){
        var data = new FormData(this);
        
        if($("#form_tambah")[0].checkValidity()) {
            //updateAllMessageForms();
            e.preventDefault();
            $.ajax({
                url         : "{{route('destinasi.store')}}",
                type        : 'post',
                data        : data,
                dataType    : 'JSON',
                contentType : false,
                cache       : false,
                processData : false,
                success: function(data) {
                    console.log(data)
                    modal.show('#success-saved'); 
                    showData();
                }
                        
            });
        }
    });

    $('#myTabel').on('click', '#btn-delete', function(e) {
        var id = $(this).data('id');

        const swalWithTailwindpButtons = Swal.mixin({
            customClass: {
                confirmButton: 'mr-1 btn btn-danger w-24 focus:outline-none',
                cancelButton: 'btn btn-outline-secondary mr-3 w-24'
            },
            buttonsStyling: false
        })
        
        swalWithTailwindpButtons.fire({
            title: 'Apa anda Yakin?',
            text: "Data tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            iconColor: '#d32929',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url         : "{{URL::to('datadestinasi/destinasi')}}/"+id,
                        type        : 'delete',
                        contentType : false,
                        cache       : false,
                        processData : false,
                        success: function(data) {
                            Swal.fire({
                                
                                icon: 'success',
                                title: 'Deleted!',
                                text:data.pesan,
                                showConfirmButton: false,
                                iconColor: '#1c3faa',
                                timer: 1500
                                })
                                
                            showData();
                        }
                                
                    });
                }
            })

    });

    $('#myTabel').on('click', '#btn-edit', function() {

const id_destinasi = $(this).data('id_destinasi');
const origin = $(this).data('origin');
const destinasi = $(this).data('destinasi');
const kecamatan = $(this).data('kecamatan');
const kode = $(this).data('kode');
const harga = $(this).data('harga');

$('.id_destinasi').val(id_destinasi);
$('.kota_origin').val(origin);
$('.kota_destinasi').val(destinasi);
$('.kecamatan').val(kecamatan);
$('.kode_destinasi').val(kode);
$('.harga').val(harga);
modal.show('#update-item-modal');   
});

$(document).on("submit","#form_edit",function(e){

var id = $('#id_destinasi').val();
var data = new FormData(this);

if($("#form_edit")[0].checkValidity()) {
    //updateAllMessageForms();
    e.preventDefault();
    $.ajax({
        url         : "{{URL::to('datamaster/destinasi-update')}}",
        type        : 'POST',
        data        : data,
        dataType    : 'JSON',
        contentType : false,
        cache       : false,
        processData : false,
        success: function(data) {
            modal.show('#success-saved'); 
            showData();
        }      
    });
}

});

    $(document).ready(function(){        
        showData(); 

    });

    
</script>
@stop