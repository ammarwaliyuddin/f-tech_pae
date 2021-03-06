@extends('layouts.layout')
@section('content')

<h2 class="intro-y text-lg font-medium mt-10">
    Data Destinasi
</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a  data-toggle="modal" data-target="#add-item-modal" class="btn btn-primary shadow-md mr-2">Tambah Destinasi</a>
        <div class="dropdown">
                <a href="{{ URL::to('datadestinasi/destinasi-exportdestinasi') }}" class="btn btn-primary">Export</a>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Import</a> 
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

 <!-- Modal Import data-->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ URL::to('datadestinasi/destinasi-importdestinasi') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          
            <div class="form-group">
                <input type="file" name="file" required="required" >
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Selesai</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </div>
    </form>
    </div>
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
                    <div class="col-span-12 remote-data-kota-origin">
                        <label for="id_kota_origin" class="form-label">Kota Origin</label>
                        <select id="id_kota_origin" class="form-select w-full mt-2" name="id_kota_origin">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12 remote-data-kota-destinasi">
                        <label for="id_kota_destinasi" class="form-label">Kota Destinasi</label>
                        <select id="id_kota_destinasi" class="form-select w-full mt-2" name="id_kota_destinasi">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12 remote-data-kecamatan">
                        <label for="id_kecamatan" class="form-label">Kecamatan Destinasi</label>
                        <select id="id_kecamatan" class="form-select w-full mt-2" name="id_kecamatan">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12 remote-data-service">
                        <label for="id_service" class="form-label">Service</label>
                        <select id="id_service" class="form-select w-full mt-2" name="id_service">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12">
                        <label for="kode_destinasi" class="form-label">Kode Destinasi</label>
                        <input type="text" id="kode_destinasi" name="kode_destinasi" class="form-control w-full mt-2" placeholder="Kode Destinasi">
                    </div>
                    <div class="col-span-12">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group mt-2">
                            <div id="harga" class="input-group-text">Rp.</div>
                            <input type="text" class="form-control w-full" id="harga" name="harga" placeholder="Harga" aria-describedby="Rp">
                        </div>
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

                    <div class="col-span-12 remote-data-kota-origin">
                        <label for="id_kota_origin" class="form-label">Kota Origin</label>
                        <select id="id_kota_origin" class="form-select w-full mt-2 id_kota_origin" name="id_kota_origin">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12 remote-data-kota-destinasi">
                        <label for="id_kota_destinasi" class="form-label">Kota Destinasi</label>
                        <select id="id_kota_destinasi" class="form-select w-full mt-2 id_kota_destinasi" name="id_kota_destinasi">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12 remote-data-kecamatan">
                        <label for="id_kecamatan" class="form-label">Nama Kecamatan</label>
                        <select id="id_kecamatan" class="form-select w-full mt-2 id_kecamatan" name="id_kecamatan">
                            <option>Loading ...</option>
                        </select>
                    </div>
                    <div class="col-span-12 remote-data-service">
                        <label for="id_service" class="form-label">Service</label>
                        <select id="id_service" class="form-select w-full mt-2 id_service" name="id_service">
                            <option>Loading ...</option>
                        </select>
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
                    <button data-dismiss="modal" type="button" class="btn btn-outline-secondary w-24 mr-1">Batal</button>
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
    
     // search
     $(document).on("keyup","#search-data",function(e){
		showData();		
        
	})

    function showData(){

        data={
            searching:  $('#search-data').val()
		}

        $.ajax({
            url:"{{URL::to('datadestinasi/destinasi-list')}}",
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

    $('#showData').on('click', '#btn-edit', function() {

        const id_destinasi = $(this).data('id_destinasi');
        const id_kota_origin = $(this).data('id_kota_origin');
        const id_kota_destinasi = $(this).data('id_kota_destinasi');
        const id_kecamatan = $(this).data('id_kecamatan');
        const id_service = $(this).data('id_service');
        const kode_destinasi = $(this).data('kode_destinasi');
        const harga = $(this).data('harga');

        $('.id_destinasi').val(id_destinasi);
        $('.id_kota_origin').val(id_kota_origin);
        $('.id_kota_destinasi').val(id_kota_destinasi);
        $('.id_kecamatan').val(id_kecamatan);
        $('.id_service').val(id_service);
        $('.kode_destinasi').val(kode_destinasi);
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
            url:"{{URL::to('datadestinasi/destinasi-list')}}",
            type:"GET",
            data: data,
            success:function(result){
                $("#showData").empty().html(result);
            }
        })
    })

    function getNamaKotaOrigin(){
        $.ajax({
            url:"{{URL::to('api/data-kota')}}",
            type:"GET",
            success:function(result){
                
                let el = `
                <label for="id_kota_origin" class="form-label">Kota Origin</label>
                <select id="id_kota_origin" class="form-select w-full mt-2" name="id_kota_origin">`;
                el+="<option value=''>-- Pilih Kota Origin --</option>";
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_kota+"'>"+b.nama_kota+"</option>";
                    })
                el+="</select>";

                $(".remote-data-kota-origin").empty().html(el);
            }
        })
    }
    
    function getNamaKotaDestinasi(){
        $.ajax({
            url:"{{URL::to('api/data-kota')}}",
            type:"GET",
            success:function(result){
                // console.log(result);
                console.log('nama_kota');
                let el = `
                <label for="id_kota_destinasi" class="form-label">Kota Destinasi</label>
                <select id="id_kota_destinasi" class="form-select w-full mt-2" name="id_kota_destinasi">`;
                el+="<option value=''>-- Pilih Kota Destinasi --</option>";
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_kota+"'>"+b.nama_kota+"</option>";
                    })
                el+="</select>";

                $(".remote-data-kota-destinasi").empty().html(el);
            }
        })
    }

    function getNamaService(){
        $.ajax({
            url:"{{URL::to('api/data-service')}}",
            type:"GET",
            success:function(result){
                
                let el = `
                <label for="id_service" class="form-label">Service</label>
                <select id="id_service" class="form-select w-full mt-2 id_service" name="id_service">`;
                el+="<option value=''>-- Pilih Service --</option>";
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_service+"'>"+b.nama_service+"</option>";
                    })
                el+="</select>";

                $(".remote-data-service").empty().html(el);
            }
        })
    }

    function getKecamatan(id_kota_destinasi){
        console.log(id_kota_destinasi)
        $.ajax({
            url:"{{URL::to('api/data-kecamatan')}}",
            type:"GET",
            data:{'id_kota_destinasi':id_kota_destinasi},
            success:function(result){
                console.log(result);
                let el = `
                <label for="id_kecamatan" class="form-label">Kecamatan Destinasi</label>
                <select id="id_kecamatan" class="form-select w-full mt-2" name="id_kecamatan">`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_kecamatan+"'>"+b.nama_kecamatan+"</option>";
                    })
                el+="</select>";

                $(".remote-data-kecamatan").empty().html(el);
            }
        })
    }
    $(document).on("click","#id_kota_destinasi",function(){
        
        let id_kota_destinasi = $(this).val()
        console.log(id_kota_destinasi);
        getKecamatan(id_kota_destinasi);
      
    //   var harga_barang = $(this).find(':selected').data('harga_barang');

    //   let element = document.getElementById("asuransi");
    //   let asuransi  = element.options[element.selectedIndex].getAttribute("data-asuransi");
    //   console.log(harga_barang,asuransi,harga_barang*asuransi)
    //   calcBarang(harga_barang,asuransi);
  })

// function getNamaKecamatan(){
//         $.ajax({
//             url:"{{URL::to('api/data-kecamatan')}}",
//             type:"GET",
//             success:function(result){
//                 console.log(result);
//                 console.log('nama_kecamatan');
//                 let el = `
//                 <label for="id_kecamatan" class="form-label">Nama Kecamatan</label>
//                 <select id="id_kecamatan" class="form-select w-full mt-2 id_kecamatan" name="id_kecamatan">`;
//                     $.each(result,function(a,b){
//                         el+="<option value='"+b.id_kecamatan+"'>"+b.nama_kecamatan+"</option>";
//                     })
//                 el+="</select>";

//                 $(".remote-data-kecamatan").empty().html(el);
//             }
//         })
//     }

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
            url:"{{URL::to('datadestinasi/destinasi-list')}}",
            type:"GET",
            data: data,
            success:function(result){
                $("#showData").empty().html(result);
            }
        })
    });


    $(document).ready(function(){        
        showData(); 
        getNamaKotaOrigin();
        getNamaKotaDestinasi();
        getNamaService();
        

    });

    
</script>
@stop