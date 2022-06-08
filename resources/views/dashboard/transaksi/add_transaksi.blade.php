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
                <div class="input-group ">
                    <select id="pengirim" class="form-select rounded-r-none remote-data-pengirim" name="pengirim">
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
                <div class="input-group ">
                    <select id="penerima" class="form-select rounded-r-none remote-data-penerima" name="penerima">
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
            <div class="intro-y col-span-12 lg:col-span-4 ">
                <label for="destinasi" class="form-label">Destinasi</label>
                <select id="destinasi" class="form-select remote-data-destinasi" name="destinasi">
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
            <div class="intro-y col-span-12 lg:col-span-4 data-packing hidden">
                <label for="harga_packing" class="form-label">Harga Packing</label>
                <input id="harga_packing" type="text" class="form-control" placeholder="Masukkan Harga Packing">
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

<!-- BEGIN: Add user Modal -->
<div id="add-user-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Tambah User
                </h2>
            </div>

            <form method="post" id="form-add-user" onsubmit="return false;" enctype="multipart/form-data">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input type="text" id="nama_user" name="nama_user" class="form-control w-full mt-2" placeholder="Nama User">
                    </div>
                    <div class="col-span-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control w-full mt-2" placeholder="Password">
                    </div>
                    <div class="col-span-12">
                        <label for="level" class="form-label">Level</label>
                        <input type="text" id="level" name="level" class="form-control w-full mt-2" placeholder="Level">
                    </div>
                    <div class="col-span-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control w-full mt-2" placeholder="Alamat">
                    </div>
                    <div class="col-span-12">
                        <label for="hp" class="form-label">HP</label>
                        <input type="text" id="hp" name="hp" class="form-control w-full mt-2" placeholder="HP">
                    </div>
                    <div class="col-span-12">
                        <label for="id_kota" class="form-label">kota</label>
                        <textarea id="id_kota" class="form-control w-full mt-2" name="id_kota" placeholder="id_kota"></textarea>
                    </div>
                    <div class="col-span-12">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <textarea id="kecamatan" class="form-control w-full mt-2" name="kecamatan" placeholder="Kecamatan"></textarea>
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
                <select id="barang" class="form-select" name="barang">
                <option value=''>-- Pilih Jenis Barang --</option>
                    `;
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
                <select id="packing" class="form-select" name="packing">
                <option value='' >-- Pilih Packing --</option>
                    `;

                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_packing+"' data-pengali='"+b.pengali+"''>"+b.nama_packing+"</option>";
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
                            <select id="asuransi" class="form-select" name="asuransi">
                            <option value=''>-- Pilih Asuransi --</option>
                    `;
                    $.each(result,function(a,b){
                        el+="<option value='"+b.id_asuransi+"' data-asuransi='"+b.harga+"''>"+b.nama_asuransi+"</option>";
                    })
                el+="</select>";

                $(".remote-data-asuransi").empty().html(el);
            }
        })
    }  
    function getDestinasi(){
        
        $('.remote-data-destinasi').select2({

            placeholder: 'Cari Destinasi',
            ajax: {
                url: "{{URL::to('api/data-destinasi')}}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                                q: params.term, // search term
                                id_service:$("#service").val(),
                            };
                },
                
                processResults: function(data, page) {
                    console.log(data);
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.kode_destinasi,
                                id: item.id_destinasi,
                                harga_destinasi: item.harga,
                            }
                        })
                    };
                },
                cache: true
            }
        });

    }
    // BEGIN : GET PENGIRIM DATA
    function getPengirim(){
        $('.remote-data-pengirim').select2({

            placeholder: 'Cari Nama Pengirim',
            ajax: {
                url: "{{URL::to('api/data-user')}}",
                dataType: 'json',
                delay: 250,

                processResults: function (data) {
                    return {
                    results:  $.map(data, function (item) {
                            return {
                                text: item.nama_user,
                                id: item.id_user
                            }
                        })
                    };

                },
                cache: true
            }
        });
    }

    // $(document).on("change","#pengirim",function(){

    // console.log($('#pengirim').val())

    // })

    // END : GET PENGIRIM DATA
    
    
    function getPenerima(){
        $('.remote-data-penerima').select2({

            
        placeholder: 'Cari Nama Penerima',
        ajax: {
            url: "{{URL::to('api/data-user')}}",
            dataType: 'json',
            delay: 250,

            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.nama_user,
                            id: item.id_user
                        }
                    })
                };

            },
            cache: true
        }
        });
    }

    // BEGIN :: Biaya Barang
    $(document).on("change","#barang",function(){
        
      
        let harga_barang = $(this).find(':selected').data('harga_barang');
        let berat = $('#berat').val();

        // let element = document.getElementById("asuransi");
        // let asuransi  = element.options[element.selectedIndex].getAttribute("data-asuransi");
        // console.log(harga_barang,asuransi,harga_barang*asuransi)

        let asuransi = $('#asuransi').find(':selected').data('asuransi');

        console.log(harga_barang , berat, asuransi)

        calcBarang(harga_barang,berat,asuransi);
    })

    $(document).on("change","#asuransi",function(){
      
        var asuransi = $(this).find(':selected').data('asuransi');
        let berat = $('#berat').val();
        let harga_barang = $('#barang').find(':selected').data('harga_barang');
        
        calcBarang(harga_barang,berat,asuransi);
    })
    $(document).on("change","#berat",function(){
      
        let asuransi = $('#asuransi').find(':selected').data('asuransi');
        let berat = $(this).val();
        let harga_barang = $('#barang').find(':selected').data('harga_barang');
        
        calcBarang(harga_barang,berat,asuransi);
    })
    $(document).on("keyup","#berat",function(){
        let asuransi = $('#asuransi').find(':selected').data('asuransi');
        let berat = $(this).val();
        let harga_barang = $('#barang').find(':selected').data('harga_barang');
        
        calcBarang(harga_barang,berat,asuransi);
    })

    function calcBarang(harga_barang,berat,asuransi){
        let biaya_barang;
        let perhitungan_persentase = parseFloat(harga_barang) * parseFloat(berat) * parseFloat(asuransi/100)
        biaya_barang = (asuransi > 0)?(parseFloat(harga_barang) * parseFloat(berat)) + perhitungan_persentase : parseFloat(harga_barang) * parseFloat(berat);
         
        $('#biaya_barang').val(biaya_barang);
        calcTotal()
    }
    // END :: Biaya Barang

    // BEGIN :: Biaya Pengiriman
    $(document).on("change","#destinasi",function(){
        
        
        let data=$(".remote-data-destinasi").select2('data')[0];
        let harga = data.harga_destinasi;

        let packing_pengali = $('#packing').find(':selected').data('pengali');
        let diskon = $('#diskon').val();

    
      calcPengiriman(harga,packing_pengali,diskon);
    })

    $(document).on("change","#packing",function(){
        let packing_pengali
        let id_packing = $(this).val()
// console.log(id_packing)
//         if(id_packing == 1){
//             console.log('masuk sini')
            packing_pengali = $(this).find(':selected').data('pengali');
        // }else{
        //     $(".data-packing").remove(".hidden");
        // }
        let data=$(".remote-data-destinasi").select2('data')[0];
            let harga = data.harga_destinasi;
            let diskon = $('#diskon').val();
    
        

    
        calcPengiriman(harga,packing_pengali,diskon);
    })
    $(document).on("keyup","#diskon",function(){
    
        let data=$(".remote-data-destinasi").select2('data')[0];
        let harga = data.harga_destinasi;

        let packing_pengali = $('#packing').find(':selected').data('pengali');
        let diskon = $(this).val();

    
        calcPengiriman(harga,packing_pengali,diskon);
    })

    function calcPengiriman(harga,packing_pengali,diskon){
        console.log(harga,packing_pengali,diskon)
        
            
        let harga_packing = (packing_pengali>0)?parseFloat(harga) * parseFloat(packing_pengali):0;
        let harga_diskon = (diskon>0)?parseFloat(diskon):0;

        let biaya_pengirim = parseFloat(harga) + parseFloat(harga_packing) - parseFloat(harga_diskon)
        $('#biaya_pengirim').val(biaya_pengirim);
        calcTotal()
      
    }
    // END :: Biaya pengiriman

    function calcTotal(){
        var biaya_barang = ($('#biaya_barang').val() === "") ? 0 : $('#biaya_barang').val();
        var biaya_pengirim = ($('#biaya_pengirim').val() === "") ? 0 :$('#biaya_pengirim').val();


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