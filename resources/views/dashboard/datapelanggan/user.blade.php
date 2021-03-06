@extends('layouts.layout')
@section('content')

<h2 class="intro-y text-lg font-medium mt-10">
    Data User
</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a  data-toggle="modal" data-target="#add-item-modal" class="btn btn-primary shadow-md mr-2">Tambah User</a>
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
        {{-- <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div> --}}
        <div class="w-full sm:w-auto mt-3 sm:mt-0 ml-auto">
            <div class="w-100 sm:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="form-control w-100 sm:w-56  box pr-10 placeholder-theme-13" id="search-data" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
            </div>
        </div>
    </div>
    
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible " id="showData">

    </div>
</div>

 <!-- BEGIN: Add Item Modal -->
 <div id="add-item-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Tambah User
                </h2>
            </div>

            <form method="post" id="form_tambah" onsubmit="return false;" enctype="multipart/form-data">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input type="text" id="nama_user" name="nama_user" class="form-control w-full mt-2" placeholder="Nama User">
                    </div>
                    <div class="col-span-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control w-full mt-2" placeholder="Email">
                    </div>
                    <div class="col-span-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" id="password" name="password" class="form-control w-full mt-2" placeholder="Password">
                    </div>
                    <div class="col-span-12 remote-data-level">
                        <label for="id_level" class="form-label">Nama Level</label>
                        <select id="id_level" class="form-select w-full mt-2" name="id_level">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control w-full mt-2" placeholder="Alamat">
                    </div>
                    <div class="col-span-12">
                        <label for="hp" class="form-label">HP</label>
                        <input type="text" id="hp" name="hp" class="form-control w-full mt-2" placeholder="HP">
                    </div>
                    <div class="col-span-12 remote-data-kota">
                        <label for="id_kota" class="form-label">Nama Kota</label>
                        <select id="id_kota" class="form-select w-full mt-2" name="id_kota">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12 remote-data-kecamatan-user">
                        <label for="id_kecamatan" class="form-label">Nama Kecamatan</label>
                        <select id="id_kecamatan" class="form-select w-full mt-2" name="id_kecamatan">
                            <option>Loading ...</option>
                        </select>
                    </div>
                
                </div>
                <div class="modal-footer text-right">
                    <button data-dismiss="modal" type="button" class="btn btn-outline-secondary w-24 mr-1">Batal</button>
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

<!-- BEGIN: Add Edit Modal -->
<div id="update-item-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Edit User
                </h2>
            </div>
            <form  method="post" id="form_edit" onsubmit="return false;" enctype="multipart/form-data">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <input type="hidden" class="id_user" id="id_user" name="id_user" >

                    <div class="col-span-12">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input type="text" id="nama_user" name="nama_user" class="form-control w-full mt-2 nama_user">
                    </div>
                    <div class="col-span-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control w-full mt-2 email">
                    </div>
                    <div class="col-span-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" id="password" name="password" class="form-control w-full mt-2 password">
                    </div>
                    <div class="col-span-12 remote-data-level">
                        <label for="id_level" class="form-label">Level</label>
                        <select id="id_level" class="form-select w-full mt-2 id_level" name="id_level">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control w-full mt-2 alamat">
                    </div>
                    <div class="col-span-12">
                        <label for="hp" class="form-label">HP</label>
                        <input type="text" id="hp" name="hp" class="form-control w-full mt-2 hp">
                    </div>
                    <div class="col-span-12 remote-data-kota">
                        <label for="id_kota" class="form-label">Nama Kota</label>
                        <select id="id_kota" class="form-select w-full mt-2 id_kota" name="id_kota">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12 remote-data-kecamatan-user">
                        <label for="id_kecamatan" class="form-label">Nama Kecamatan</label>
                        <select id="id_kecamatan" class="form-select w-full mt-2 id_kecamatan" name="id_kecamatan">
                            <option>Loading ...</option>
                        </select>
                    </div>
                
                </div>
                <div class="modal-footer text-right">
                    <button data-dismiss="modal" type="button" class="btn btn-outline-secondary w-24 mr-1">Batal</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary w-24" id="btn-update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Edit Item Modal -->

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
 

@stop
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
<script>
    
    // search
    $(document).on("keyup","#search-data",function(e){
		showData();		
        
	})
    
    function showData(){
       
        data={
            searching:  $('#search-data').val()
		}

        $.ajax({
            url:"{{URL::to('datapelanggan/user-list')}}",
            type:"GET",
            data:data,
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
                url         : "{{route('user.store')}}",
                type        : 'post',
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

    $('#showData').on('click', '#btn-delete', function(e) {
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
                        url         : "{{URL::to('datapelanggan/user')}}/"+id,
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

    $('#showData').on('click', '#btn-edit', function() {

const id_user = $(this).data('id_user');
const email = $(this).data('email');
const nama_user = $(this).data('nama_user');
const password = $(this).data('password');
const id_level = $(this).data('id_level');
const alamat = $(this).data('alamat');
const hp = $(this).data('hp');
const id_kota = $(this).data('id_kota');
const id_kecamatan = $(this).data('id_kecamatan');

$('.id_user').val(id_user);
$('.email').val(email);
$('.nama_user').val(nama_user);
$('.password').val(password);
$('.id_level').val(id_level);
$('.alamat').val(alamat);
$('.hp').val(hp);
$('.id_kota').val(id_kota);
$('.id_kecamatan').val(id_kecamatan);
modal.show('#update-item-modal');   
});

$(document).on("submit","#form_edit",function(e){

var id = $('#id_user').val();
var data = new FormData(this);

if($("#form_edit")[0].checkValidity()) {
    //updateAllMessageForms();
    e.preventDefault();
    $.ajax({
        url         : "{{URL::to('datapelanggan/user-update')}}",
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
$('#showData').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href'),
		    page = url.split('page=')[1],
			data = $('#search').serializeArray();
            
        var data={
            searching:  $('#search-data').val(),
            page:page
		}

        $.ajax({
            url:"{{URL::to('datapelanggan/user-list')}}",
            type:"GET",
            data: data,
            success:function(result){
                $("#showData").empty().html(result);
            }
        })
    });

    

    // function getNamaKecamatan(){
    //     $.ajax({
    //         url:"{{URL::to('api/data-kecamatan')}}",
    //         type:"GET",
    //         success:function(result){
    //             console.log(result);
    //             console.log('nama_kecamatan');
    //             let el = `
    //             <label for="id_kecamatan" class="form-label">Nama Kecamatan</label>
    //             <select id="id_kecamatan" class="form-select w-full mt-2 id_kecamatan" name="id_kecamatan">`;
    //                 $.each(result,function(a,b){
    //                     el+="<option value='"+b.id_kecamatan+"'>"+b.nama_kecamatan+"</option>";
    //                 })
    //             el+="</select>";

    //             $(".remote-data-kecamatan").empty().html(el);
    //         }
    //     })
    // }

    function getNamaKota(){
        $.ajax({
            url:"{{URL::to('api/data-kota')}}",
            type:"GET",
            success:function(result){
                console.log(result);
                console.log('nama_kota');
                let el = `
                <label for="id_kota" class="form-label">Nama Kota</label>
                <select id="id_kota" class="form-select w-full mt-2 id_kota" name="id_kota">`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_kota+"'>"+b.nama_kota+"</option>";
                    })
                el+="</select>";

                $(".remote-data-kota").empty().html(el);
            }
        })
    }
    function getNamaLevel(){
        $.ajax({
            url:"{{URL::to('api/data-level')}}",
            type:"GET",
            success:function(result){
                console.log(result);
                console.log('nama_level');
                let el = `
                <label for="id_level" class="form-label">Nama Level</label>
                <select id="id_level" class="form-select w-full mt-2 id_level" name="id_level">`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_level+"'>"+b.nama_level+"</option>";
                    })
                el+="</select>";

                $(".remote-data-level").empty().html(el);
            }
        })
    }

    function getKecamatan(id_kota){
        $.ajax({
            url:"{{URL::to('api/data-kecamatan-user')}}",
            type:"GET",
            data:{'id_kota':id_kota},
            success:function(result){
                console.log(result);
                let el = `
                <label for="id_kecamatan" class="form-label">Nama Kecamatan</label>
                <select id="id_kecamatan" class="form-select w-full mt-2" name="id_kecamatan">`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_kecamatan+"'>"+b.nama_kecamatan+"</option>";
                    })
                el+="</select>";

                $(".remote-data-kecamatan-user").empty().html(el);
            }
        })
    }
    $(document).on("click","#id_kota",function(){
        
        let id_kota = $(this).val()
        console.log(id_kota);
        getKecamatan(id_kota);
      
    //   var harga_barang = $(this).find(':selected').data('harga_barang');

    //   let element = document.getElementById("asuransi");
    //   let asuransi  = element.options[element.selectedIndex].getAttribute("data-asuransi");
    //   console.log(harga_barang,asuransi,harga_barang*asuransi)
    //   calcBarang(harga_barang,asuransi);
  })

    $(document).ready(function(){        
        showData();
        getNamaKota();
        getNamaLevel();

    });

    
</script>
@stop