@extends('layouts.layout')
@section('content')
        
<div class="intro-y box" >
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">
            Tambah Transaksi
        </h2>
    </div>
    <form method="post" id="form_tambah" onsubmit="return false;" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-4 p-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <label for="pengirim" class="form-label">Pengirim</label>
                <div class="input-group data-kosong-pengirim">
                    <select id="pengirim" class="form-select rounded-r-none remote-data-pengirim" name="pengirim">
                        <option>Loading ...</option>
                    </select>
                    <a  type="button" data-toggle="modal" data-target="#add-user-modal" class="btn p-0 input-group-text">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                    </a>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
                <input id="alamat_pengirim" type="text" class="form-control" >
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <label for="penerima" class="form-label">Penerima</label>
                <div class="input-group data-kosong-penerima">
                    <select id="penerima" class="form-select rounded-r-none remote-data-penerima" name="penerima">
                        <option>Loading ...</option>
                    </select>
                    <a  type="button" data-toggle="modal" data-target="#add-user-modal" class="btn p-0 input-group-text">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                    </a>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
                <input id="alamat_penerima" type="text" class="form-control" >
            </div>
            <div class="intro-y col-span-12 lg:col-span-4 remote-data-service">
                <label for="service" class="form-label">Service</label>
                <select id="service" class="form-select" name="service">
                    <option>Loading ...</option>
                </select>
            </div>
            <div class="intro-y col-span-12 lg:col-span-4 remote-data-destinasi ">
                <label for="destinasi" class="form-label">Destinasi</label>
                <select id="destinasi" class="form-select" name="destinasi">
                    <option>Loading ...</option>
                </select>

            </div>
            <div class="intro-y col-span-12 lg:col-span-4 remote-data-barang">
                <label for="barang" class="form-label">Barang</label>
                <select id="barang" class="form-select" name="barang">
                    <option>Loading ...</option>
                </select>
            </div>
            <div class="intro-y col-span-12 lg:col-span-4 remote-data-packing">
                <label for="packing" class="form-label">Packing</label>
                <select id="packing" class="form-select" name="packing">
                    <option>Loading ...</option>
                </select>
            </div>
            
            <div class="intro-y col-span-12 lg:col-span-4 remote-data-asuransi">
                <label for="asuransi" class="form-label">Asuransi</label>
                <select id="asuransi" class="form-select" name="asuransi">
                    <option>Loading ...</option>
                </select>
            </div>
            <div class="intro-y col-span-12 lg:col-span-4">
                <label for="berat" class="form-label">Berat</label>
                <input id="berat" type="number" class="form-control" value="1" placeholder="Masukkan Berat" >
            </div>
            <div class="intro-y col-span-12 lg:col-span-4">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input id="jumlah" type="text" class="form-control" placeholder="Masukkan Jumlah">
            </div>
            <div class="intro-y col-span-12 lg:col-span-4">
                <label for="diskon" class="form-label">Diskon</label>
                <input id="diskon" type="text" class="form-control" placeholder="Masukkan Diskon">
            </div>
           
            <div class="intro-y col-span-12 lg:col-span-4">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input id="deskripsi" type="text" class="form-control" placeholder="Masukkan Deskripsi">
            </div>

            <div class="intro-y col-span-12 lg:col-span-4">
                <label for="instruksi" class="form-label">Instruksi</label>
                <textarea id="instruksi" class="form-control" ></textarea>
            </div>
            
        </div>
        <hr>
        <div class="grid grid-cols-12 gap-4 p-5">
            <div class="intro-y col-span-12 lg:col-span-4">
                <label for="biaya_barang" class="form-label">Biaya Barang</label>
                <input id="biaya_barang" type="text" class="form-control" placeholder="Loading Biaya Barang ..." disabled>
            </div>
            <div class="intro-y col-span-12 lg:col-span-4">
                <label for="biaya_pengirim" class="form-label">Biaya Pengirim</label>
                <input id="biaya_pengirim" type="text" class="form-control" placeholder="Loading Biaya Pengirim ..." disabled>
            </div>
            <div class="intro-y col-span-12 lg:col-span-4">
                <label for="total" class="form-label">Total</label>
                <input id="total" type="text" class="form-control" placeholder="Loading Total Biaya ..." disabled>
            </div>
        </div>
        <div class="flex justify-end pb-5 px-5">
            <button class="btn btn-primary shadow-md">Tambah Transaksi</button>
        </div>
    </form>
</div>




        
@stop
@section('script')
<script>
    
    

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