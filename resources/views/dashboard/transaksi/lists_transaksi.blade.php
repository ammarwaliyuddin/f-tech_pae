@extends('layouts.layout')
@section('content')
 


<h2 class="intro-y text-lg font-medium mt-10">
    Data Transaksi
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
            </div>
        </div>
    </div>
    
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visibl table-responsive">
        
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="text-center whitespace-nowrap">No Resi</th>
                    <th class="text-center whitespace-nowrap">Pengirim</th>
                    <th class="text-center whitespace-nowrap">Penerima</th>
                    <th class="text-center whitespace-nowrap">Destinasi</th>
                    <th class="text-center whitespace-nowrap">Tanggal</th>
                    <th class="text-center whitespace-nowrap">Jumlah</th>
                    <th class="text-center whitespace-nowrap">Disposisi</th>
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
                    <td><a href="" class="font-medium whitespace-nowrap">{{ $item->user_pengirim->nama_user }}</a></td>
                    <td><a href="" class="font-medium whitespace-nowrap">{{ $item->user_penerima->nama_user }}</a></td>
                    <td class="w-40 text-center">{{ $item->destinasi->kode_destinasi }}</td>
                    <td class="w-40 text-center">{{ $item->created_at }} </td>
                    <td class="w-40 text-center">{{ $item->jumlah }} </td>
                    <td class="w-40 text-center">{{ $item->disposisi->nama_disposisi }} </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3 btn btn-sm" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>

                            <a class="flex items-center text-theme-6 btn btn-sm " id="btn-delete"  data-id="{{ $item->id_barang }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>

                            <a class="flex items-center ml-3 btn btn-sm"> <i data-feather="check-square" ></i> Resi </a>
                           
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
    </div> 
    <!-- END: Modal Content -->
     <!-- BEGIN: Modal Content -->
    <div id="unsuccess-saved" class="modal " tabindex="-1" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-12 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5 ">Tidak Tersimpan!</div>
                        <div class="text-gray-600 mt-2 pesan"></div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div>
    </div> <!-- END: Modal Content -->
</div>   


        
@stop
@section('script')
<script>
    
    function showData(){
        $.ajax({
            url:"{{URL::to('datamaster/packing-list')}}",
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
                url         : "{{URL::to('datamaster/add')}}",
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
                        url         : "{{URL::to('datamaster/packing')}}/"+id,
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

        const id_packing = $(this).data('id_packing');
        const packing = $(this).data('packing');
        const biaya = $(this).data('biaya');
        const keterangan = $(this).data('ket');

        $('.id_packing').val(id_packing);
        $('.nama_packing').val(packing);
        $('.biaya').val(biaya);
        $('.keterangan').val(keterangan);
        modal.show('#update-item-modal');   
    });

    $(document).on("submit","#form_edit",function(e){

        var id = $('#id_packing').val();
        var data = new FormData(this);

        if($("#form_edit")[0].checkValidity()) {
            //updateAllMessageForms();
            e.preventDefault();
            $.ajax({
                url         : "{{URL::to('datamaster/packing-update')}}",
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

    $(document).on("submit","#form-add-user",function(e){
        var data = new FormData(this);
        
        if($("#form-add-user")[0].checkValidity()) {
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
                    if(data.success){
                        modal.show('#success-saved'); 
                        getPengirim();
                        getPenerima();
                    }else{
                        let pesan= `<div class="text-gray-600 mt-2 pesan">${data.error}</div>`
                        $(".pesan").empty().html(pesan);
                        modal.show('#unsuccess-saved'); 
                    }
                   
                }
                        
            });
        }
    });

    function getBarang(){
        $.ajax({
            url:"{{URL::to('api/data-barang')}}",
            type:"GET",
            success:function(result){
                console.log(result);
                let el = `
                <label for="barang" class="form-label">Barang</label>
                <select id="barang" class="form-select" name="barang">`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_barang+"' data-harga_barang='"+b.harga+"''>"+b.jenis_barang+"</option>";
                    })
                el+="</select>";

                $(".remote-data-barang").empty().html(el);
            }
        })
    }
    function getPacking(){
        $.ajax({
            url:"{{URL::to('api/data-packing')}}",
            type:"GET",
            success:function(result){
                console.log(result);
                let el = `
                <label for="packing" class="form-label">Packing</label>
                <select id="packing" class="form-select" name="packing">`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_packing+"' data-packing='"+b.biaya+"''>"+b.nama_packing+"</option>";
                    })
                el+="</select>";

                $(".remote-data-packing").empty().html(el);
            }
        })
    }
    function getService(){
        $.ajax({
            url:"{{URL::to('api/data-service')}}",
            type:"GET",
            success:function(result){
                console.log(result);
                let el = `
                <label for="service" class="form-label">Service</label>
                <select id="service" class="form-select" name="service">`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_service+"'>"+b.nama_service+"</option>";
                    })
                el+="</select>";

                $(".remote-data-service").empty().html(el);
            }
        })
    }
    function getAsuransi(){
        $.ajax({
            url:"{{URL::to('api/data-asuransi')}}",
            type:"GET",
            success:function(result){
                console.log(result);
                let el = `
                <label for="asuransi" class="form-label">Asuransi</label>
                <select id="asuransi" class="form-select" name="asuransi">`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_asuransi+"' data-asuransi='"+b.biaya+"''>"+b.nama_asuransi+"</option>";
                    })
                el+="</select>";

                $(".remote-data-asuransi").empty().html(el);
            }
        })
    }
    
    function getDestinasi(){
        $.ajax({
            url:"{{URL::to('api/data-destinasi')}}",
            type:"GET",
            success:function(result){
                console.log(result);
                
                // <label for="destinasi" class="form-label">Postal Code</label>
                // <select id="destinasi" data-search="true" class="tail-select w-full ">
                //     <option value="1">018906 - 1 STRAITS BOULEVARD SINGA...</option>
                //     <option value="2">018910 - 5A MARINA GARDENS DRIVE...</option>
                // </select>
                let el = `
                <label for="destinasi" class="form-label">Destinasi</label>
                <select id="destinasi" class="form-select" name="destinasi" >`;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_destinasi+"' data-harga='"+b.harga+"''>"+b.kode_destinasi+"</option>";
                    })
                el+="</select>";
                
                $(".remote-data-destinasi").empty().html(el);
                
            }
        })
    }
    function getPengirim(){
        $.ajax({
            url:"{{URL::to('api/data-user')}}",
            type:"GET",
            success:function(result){
                console.log(result.length==0);
                let el=""
                if (result.length==0) {
                    
                    el +=`
                    <input  type="text" class="form-control info-kosong-pengirim" placeholder="Data Kosong !!!" disabled>
                    `;
                    $(".data-kosong-pengirim").prepend(el);
                    $(".remote-data-pengirim").css("display", "none");
                }else{
                    
                    el += `
                    <select id="pengirim" class="form-select rounded-r-none remote-data-pengirim" name="pengirim">
                        <option value=''>-- Pilih Pengirim --</option>`;
                        $.each(result,function(a,b){
                            el+="<option value='"+b.id_user+"'>"+b.nama_user+"</option>";
                        })
                    el+=`</select> `;
                    $(".info-kosong-pengirim").remove();
                    $(".remote-data-pengirim").css("display", "inline-block");
                    $(".remote-data-pengirim ").empty().html(el);
                }

            }
        })
    }
    function getPenerima(){
        $.ajax({
            url:"{{URL::to('api/data-user')}}",
            type:"GET",
            success:function(result){
                let el=""
                if (result.length==0) {
                    
                    el +=`
                    <input  type="text" class="form-control info-kosong-penerima" placeholder="Data Kosong !!!" disabled>
                    `;
                    $(".data-kosong-penerima").prepend(el);
                    $(".remote-data-penerima").css("display", "none");
                }else{
                    
                    el += `
                    <select id="penerima" class="form-select rounded-r-none remote-data-penerima" name="penerima">
                        <option value=''>-- Pilih Penerima --</option>`;
                        $.each(result,function(a,b){
                            el+="<option value='"+b.id_user+"'>"+b.nama_user+"</option>";
                        })
                    el+=`</select> `;
                    $(".info-kosong-penerima").remove();
                    $(".remote-data-penerima").css("display", "inline-block");
                    $(".remote-data-penerima ").empty().html(el);
                }
            }
        })
    }

    // BEGIN :: Biaya Barang
    $(document).on("change","#barang",function(){
      
        var harga_barang = $(this).find(':selected').data('harga_barang');

        let element = document.getElementById("asuransi");
        let asuransi  = element.options[element.selectedIndex].getAttribute("data-asuransi");
        console.log(harga_barang,asuransi,harga_barang*asuransi)
        calcBarang(harga_barang,asuransi);
    })

    $(document).on("change","#asuransi",function(){
      
        var asuransi = $(this).find(':selected').data('asuransi');

        let element = document.getElementById("barang");
        let harga_barang  = element.options[element.selectedIndex].getAttribute("data-harga_barang");
        console.log(harga_barang,asuransi,harga_barang*asuransi)
        calcBarang(harga_barang,asuransi);
    })

    function calcBarang(harga_barang,asuransi){
        let biaya_barang = harga_barang * asuransi
        $('#biaya_barang').val(biaya_barang);
        calcTotal()
    }
    // END :: Biaya Barang

    // BEGIN :: Biaya Pengiriman
    $(document).on("change","#destinasi",function(){
      
      var harga = $(this).find(':selected').data('harga');

      let element = document.getElementById("packing");
      let packing  = element.options[element.selectedIndex].getAttribute("data-packing");
      console.log(harga,packing,harga+packing)
      calcPengiriman(harga,packing);
    })

    $(document).on("change","#packing",function(){
    
      var packing = $(this).find(':selected').data('packing');

      let element = document.getElementById("destinasi");
      let harga  = element.options[element.selectedIndex].getAttribute("data-harga");
      console.log(harga,packing,harga+packing)
      calcPengiriman(harga,packing);
    })

    function calcPengiriman(harga,packing){
      let biaya_pengirim = parseInt(harga) + parseInt(packing) 
      $('#biaya_pengirim').val(biaya_pengirim);
      calcTotal()
      
    }
    // END :: Biaya pengiriman

    function calcTotal(){
        var biaya_barang = $('#biaya_barang').val();
        var biaya_pengirim = ($('#biaya_pengirim').val() === "")? 0 :$('#biaya_pengirim').val();


        console.log(parseInt(biaya_barang) , parseInt(biaya_pengirim))

        var total = parseInt(biaya_barang) + parseInt(biaya_pengirim)
        $('#total').val(total);
      
    }

    //get alamat pengirim
    $(document).on("change","#pengirim",function(){
        let id_user = $('#pengirim').val();
        $.ajax({
            url:"{{URL::to('api/data-alamatUser')}}",
            type:"GET",
            data:{'id_user':id_user},
            success:function(result){
                $('#alamat_pengirim').val(result.alamat);
                
            }
        })
        
    })
    //get alamat penerima
    $(document).on("change","#penerima",function(){
        let id_user = $('#penerima').val();
        $.ajax({
            url:"{{URL::to('api/data-alamatUser')}}",
            type:"GET",
            data:{'id_user':id_user},
            success:function(result){
                $('#alamat_penerima').val(result.alamat);
                
            }
        })
        
    })

    $(document).ready(function(){        
        // showData(); 
        getBarang(); 
        getPacking(); 
        getService(); 
        getAsuransi(); 
        getDestinasi();
        getPengirim();
        getPenerima();
        
        
       
        // console.log(harga_barang,asuransi)

        // calcBarang(1,1);


    });

    
</script>
@stop