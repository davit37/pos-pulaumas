$(document).on('click', '.delete', function () {
    var del_id = $(this).attr("id");
    var triger = $(this).attr('triger');
    

    swal({
        title: 'Anda yakin ?',
        text: "Data ini akan dihapus !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#74b9ff',
        cancelButtonColor: '#ff7675',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.value) {
        window.open("action/delete.php?id="+del_id+'&triger='+triger,"_self")
        }
    })
    
    
});
 
$(document).on('click', '.detail_stok_masuk', function(){
    var id = $(this).attr('id');
    window.open('?page=detail_stok&id='+id, "_self")
})
$(document).on('click', '.detail_stok_toko', function(){
    var id = $(this).attr('id');
    window.open('?page=detail_barang&id='+id, "_self")
})
$(document).on('click', '.detail_transaksi', function(){
    var id = $(this).attr('id');
    window.open('?page=detail_transaksi&id='+id, "_self")
})
$(document).on('click', '.retur', function(){
    var id = $(this).attr('id');
    window.open('?page=retur&id='+id, "_self")
})
$(document).on('click', '.editKreteria', function(){
    var id = $(this).attr('id');
    window.open('?page=kreteria_add&id='+id, "_self")
})
$(document).on('click', '.editIndividu', function(){
    var id = $(this).attr('id');
    window.open('?page=nilai_individu&id='+id, "_self")
})
$(document).on('click', '.editSub', function(){
    var id = $(this).attr('id');
    window.open('?page=edit_sub&id='+id, "_self")
})


$(document).on('click', '.deleteEvaluasi', function(){
    var del_id = $(this).attr("id");
    var triger = $(this).attr('triger');
    swal({
        title: 'Anda yakin ?',
        text: "Data ini akan dihapus !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#74b9ff',
        cancelButtonColor: '#ff7675',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.value) {
        window.open("action/delete_action.php?id="+del_id+'&triger='+triger,"_self")
        }
    })
    
    
});
$(document).on('click', '.deleteAdmin', function(){
    var del_id = $(this).attr("id");
    var triger = $(this).attr('triger');
    swal({
        title: 'Anda yakin ?',
        text: "Data ini akan dihapus !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#74b9ff',
        cancelButtonColor: '#ff7675',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.value) {
        window.open("action/delete_action.php?id="+del_id+'&triger='+triger,"_self")
        }
    })
    
    
});

function get_total(){
    var jumlah=parseInt($("#jumlah").val());
    var harga=parseInt($("#harga").cleanVal());
    var total=harga*jumlah;

    $("#bayar").val($("#bayar").masked(total))
}

//mouse dan keyboar even ganti harga
$("#jumlah").change(function(){
    get_total()
})

$("#harga").change(function(){
    get_total()
})

$("#jumlah").keydown(function(){
    get_total()
})
$("#jumlah").keyup(function(){
    get_total()
})
$("#jumlah").keypress(function(){
    get_total()
})
$("#harga").keydown(function(){
    get_total()
})
$("#harga").keypress(function(){
    get_total()
})
$("#harga").keyup(function(){
    get_total()
})

var formatRp=function(bilangan){
    var	reverse = bilangan.toString().split('').reverse().join(''),
	ribuan 	= reverse.match(/\d{1,3}/g);
    ribuan	= ribuan.join(',').split('').reverse().join('');
    
    return ribuan
}

$("#simpanPenjualan").click(function(){
    console.log("simpan diklik")

    
    var data_table='<tr>'+'<input type="hidden" value="'+$('#id_barang').val()+'" class="id_barang" >'+'<input type="hidden" value="'+$('#id_tempat').val()+'" class="id_tempat" >'+'<td>'+$('#auto_nama_barang').val()+'</td><td>'+$("#id_tempat option:selected").text()+'</td>'+'<td class="jumlah">'+$("#jumlah").val()+'</td><td class="harga">'+$("#harga").val()+'</td><td>'+$("#bayar").val()+'</td><td class="bayar">'+$("#bayar").val()+'</td><td>'+"<button title='Hapus' type='button' class='btn btn-danger btn-sm delete'><i class='fa fa-trash'></i></button> <button title='Edit' href='' data-toggle='modal' type='button' class='btn btn-info btn-sm editAdmin'><i class='fa fa-pencil'></i></button>"+'</td><td>';
    
    $("#tablePenjualan").append(data_table)

    var grand_total=(hasil=0)=>{
        for (var i = 0; i < $('.bayar').length; i++) {
             hasil+= parseInt($(`.bayar:eq(${i})`).html().split(",").join(''))
             
        }
         return hasil
     }
     console.log(grand_total())
     var table_total="<tr><td colspan='3'></td><th clospan='2'>Grand Total</th><td></td><th>Rp. "+formatRp(grand_total())+"</th></tr>";

    $("#tableFooterPenjualan").html(table_total)

    $("#formData_penjualan")[0].reset();

    $("#tombolSelesai").show();


   
})

$("#tombolSelesai").click(function(){

    var nomor_faktur=$('#nomor_faktur').val();
    var id_pelanggan=$('#id_pelanggan').val();
    var id_barang=[];
    var id_tempat=[];
    var jumlah=[];
    var harga=[];
    var total=[];

    for(var i=0; i < $('.id_barang').length;i++){
        id_barang.push($('.id_barang:eq('+i+')').val());
        id_tempat.push($(".id_tempat:eq("+i+")").val());
        jumlah.push($(".jumlah:eq("+i+")").text())
        harga.push($(".harga:eq("+i+")").text().split(",").join(''))
        total.push($(".bayar:eq("+i+")").text().split(",").join(''))
    }

    $.ajax({
        method:'POST',
        url:'../production/action/penjualan.php',
        data:{
            nomor_faktur:nomor_faktur,
            id_pelanggan:id_pelanggan,
            id_barang:id_barang,
            id_tempat:id_tempat,
            jumlah:jumlah,
            harga:harga,
            total:total
        }
    })
    .done(function(msg){
        window.location.href="../production/?page=detail_transaksi&id="+msg;
    })

})