// $(document).ready(function(){
// 	$('#supplier').DataTable();
// });
$(function () {
	// $('#supplier').DataTable();
	$('table #supplier,#kategori_table,#satuan_table,#pembelian_table,#barang').DataTable({
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': true,
		'info': true,
		'autoWidth': true
	})
})
// All Variable
var method,table,url,txt;
$(document).ready(function(){
	// $(window).load(function(){
		$(".overlay").css("display","none");
	// });
});
$("#cari_data,#kd_barang_trans").select2();

// Login


// {CRUD Function untuk Supplier}

// fungsi tambah supplier
$('#btn-tambah').on("click", function () {
	method = 'tambah';
	$("#form_modal")[0].reset();
	$("#modalin").modal("show");
	$(".modal-title").text("Tambah Data");
});
// Get Data Supplier to form Modal
$("table#supplier #btn-update").on("click",function(){
	var id_supplier = $(this).attr('data-id');
	method = "ubah";
	$.ajax({
		url: "supplier/setdata/" + id_supplier,
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			$('[name = supplier_id]').val(data.supplier_id);
			$('[name = nip]').val(data.NIP);
			$('[name = supplier_name]').val(data.supplier_name);
			$('[name = supplier_telp]').val(data.telp);
			$('[name = supplier_alamat]').val(data.address);
			$("#modalin").modal("show");
			$(".modal-title").html("Ubah Data");
			return;
		}
	})
});

// Delete Supplier
$("table#supplier #btn-delete").on("click",function(){
	var id_supplier = $(this).attr('data-id');
	Swal({
		title: 'Hapus Sekarang ?',
		text: "Apakah anda ingin menghapus sekarang",
		type: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus !'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: "supplier/hapus/" + id_supplier,
				type: "GET",
				dataType: "JSON",
				success: function (Berhasil) {
					Swal({
						title: "Berhasil",
						text: "Dihapus",
						type: "success"
					}).then((result) => {
						if (result.value) {
							location.reload();
							return;
						}
					})
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert("EROROORO");
				}
			});
		}
	})
});

// Fungsi Insert & Update form Supplier Modal
$("#modalin #form_modal").on("submit", function (e) {
	e.preventDefault();
	if (method == "tambah") {
		url = "supplier/tambah";
		txt = "Ditambahkan";
	} else {
		url = "supplier/ubah";
		txt = 'Diubah'
	}
	// Transfer Async data
	$.ajax({
		url: url,
		type: "post",
		data: $("#form_modal").serialize(),
		dataType: "JSON",
		success: function (Berhasil) {
			if (Berhasil.status == true) {
				$('div.form-group').removeClass('has-success').removeClass('has-error')
					.find('.text-danger').remove();
				$('#modalin').modal('hide');
				Swal({
					title: 'Berhasil',
					text: Berhasil.title,
					type: 'success'
				}).then((result) => {
					if (result.value) {
						location.reload();
						return ;
					}
				})
			} else {
				$.each(Berhasil.msg, function (key, value) {
					var element = $('#' + key);
					console.log(Berhasil.msg);
					element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(value.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();
					element.after(value);
					return;
				})
			}
		}
	});
});

// {Batas CRUD Function untuk Supplier}



// {CRUD Function untuk Kategori}

// [TOmbol fungsi Tambah Kategori(Pop up Modal)]
$("#kategori_content #btn-tambahKategori").on("click", function () {
	method = 'tambah';
	$("#kategori_form")[0].reset();
	$("#kategori_modal").modal("show");
	$(".modal-title").text("Tambah Kategori");
});

// Get Data Kategori to Form Kategori

$('table#kategori_table #cat-btnUpdate').on("click",function(){
	var id_cat = $(this).attr('data-id');
	method="ubah";
	// Get data with async
	$.ajax({
		url:"kategori/setdata/" + id_cat,
		type:"GET",
		dataType:"JSON",
		success:function(getKategori){
			$('#kategori_form [name = category_id]').val(getKategori.category_id);
			$('#kategori_form [name = kategori_name]').val(getKategori.category);
			$('#kategori_modal').modal('show');
			$('#kategori_modal #modal-title').text('Ubah Kategori');
		}
	})
});


// Insert or Update Data to Kategori from Modal
$("#kategori_modal #kategori_form").on("submit",function(e){
	e.preventDefault();
	var form = $(this).serialize();
	if (method == 'tambah') {
		url = 'kategori/tambah';
		txt = 'ditambah';
	}
	else{
		url = 'kategori/ubah';
		txt = 'diubah'
	}
	
	// Transfer data async
	$.ajax({
		url:url,
		type:"post",
		data:form,
		dataType:"JSON",
		success:function(AjaxKonek){
			if (AjaxKonek.status==true) {
				$('div.form-group').removeClass('has-success').removeClass('has-error')
				.find('.text-danger').remove();
				$('#kategori_modal').modal('hide');
				Swal({
					title:"Berhasil",
					text:"Kategori Berhasil "+txt,
					type:'success'
				}).then((result)=>{
					if (result.value) {
						location.reload();
						return;
					}
				})
			}
			else{
				// alert("isi");
				$.each(AjaxKonek.message, function(key, val) {
					var el = $('#' + key)
					el.closest('div.form-group')
					.removeClass('has-error')
					.addClass(val.length > 0 ? 'has-error' : 'has-success')
					.find('.text-danger').remove();
					el.after(val);
					return;
				})
			}
		}
	});
});

// {Delete Kategori }

$('table#kategori_table #cat-btnDelete').on("click",function(){
	var id_cat = $(this).attr('data-id');
	
	// Confirm 
	Swal({
		title: 'Hapus Sekarang ?',
		text: "Apakah anda ingin menghapus sekarang",
		type: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus !'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: "kategori/hapus/"+id_cat,
				type: "get",
				dataType: "JSON",
				success: function (Berhasil) {
					swal({
						title: "Berhasil",
						text: "Data berhasil dihapus",
						type: "success"
					}).then((result) => {
						if (result.value) {
							location.reload();
							return;
						}
					})
				}
			})
		}
	})
});



// {CRUD untuk Satuan}

// modal show
$('#btn-tambahSatuan').on("click",function(){
	$('#satuan_modal .modal-title').text('Tambah Satuan');
	method='tambah';
	$("#satuan_modal").modal('show');
})
// Insert or Update to Satuan
$('#satuan_form').on('submit',function(e){
	e.preventDefault();
	var formData = $(this).serialize();
	if (method == 'tambah') {
		url='satuan/tambah';
		txt='Ditambah';
	}
	else{
		url='satuan/ubah';
		txt='diubah';
	}

	// Transfer with Ajax
	$.ajax({
		url:url,
		type:'POST',
		data: formData,
		dataType:'JSON',
		success:function(satuanConnect) {
			if (satuanConnect.status == true) {
				$('div.form-group').removeClass('has-error').removeClass('has-success')
				.find('.text-danger').remove();
				$('#satuan_modal').modal('hide');
				Swal({
					title: "Berhasil",
					text: "Satuan Berhasil " + txt,
					type: 'success'
				}).then((result) => {
					if (result.value) {
						location.reload();
						return;
					}
				})
			}
			else{
				$.each(satuanConnect.msg,function(key,val) {
					var element = $('#'+key);
					element.closest('div.form-group')
					.removeClass('has-error')
					.addClass(val.length > 0 ? 'has-error':'has-success')
					.find('.text-danger').remove();
					element.after(val);
					return;
				})
			}
		}
	})
});

// Get and Set Data to satuan Modal
$('table#satuan_table #sat-btnUpdate').on('click', function () {
	var id_sat = $(this).attr('data-id');
	method = 'ubah';
	// GetData with Ajax
	$.ajax({
		url:'satuan/setdata/'+id_sat,
		type:'get',
		dataType:'JSON',
		success:function(satuanDAta){
			$('#satuan_form [name= satuan_id]').val(satuanDAta.satuan_id);
			$('#satuan_form [name = satuan_name]').val(satuanDAta.satuan);
			$('#satuan_modal').modal('show');
			$('#satuan_modal .modal-title').text("Ubah Data Satuan");
		}
	})
})

// Delete satuan Data
$('table#satuan_table #sat-btnDelete').on('click',function(){
	var id_cat = $(this).attr('data-id');

	Swal({
		title:"Hapus ?",
		text:"apakah ingin dihapus",
		type:"question",
		showCancelButton:true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus !'
	}).then((result) =>{
		if (result.value) {
			// Transfer data
			$.ajax({
				url: "satuan/hapus/" + id_cat,
				type: "get",
				dataType: "JSON",
				success: function (deleteSatuan) {
					// return
					swal({
						title: "Berhasil",
						text: "Data berhasil dihapus",
						type: "success"
					}).then((result) => {
						if (result.value) {
							location.reload();
							return;
						}
					})
				}
			});
		}
	})

});



// Pembelian Function

// Simpan Pembelian
$('#pembelian #simpan_transaksiPembelian').on('click', function (e) {
	e.preventDefault();
	var form = $("#transaksi").serialize()
	var href = 'pembelian/simpandata';
	$.ajax({
		url:href,
		type:"post",
		data:form,
		dataType:"JSON",
		success:function(DataPembelian){
			if (DataPembelian.status == true) {
				$('div.form-group').removeClass('has-error').removeClass('has-success')
					.find('.text-danger').remove();
				location.reload();
				return;
			}
			else {
				$.each(DataPembelian.msg, function (key, val) {
					var element = $('#' + key);
					element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(val.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();
					element.after(val);
					return;
				})
			}
		}
	})
});

// Ubah Data Transaksi Pembelian
$("#pembelian #edit_transaksiPembelian").on("click",function(){
	// alert("hello");return;
	$('#no_faktur').attr('disabled', false);
	$('#select_supplier').attr('disabled', false);
	$('#tgl_tsk').attr('disabled', false);
	$(this).attr('id','simpan_transaksiPembelian').addClass('hidden');
	$("#ubah_transaksiPembelian,#batal_transaksiPembelian").addClass('muncul').removeClass('hidden');
});
$("#ubah_transaksiPembelian").click(function(){
	var form = $("#transaksi").serialize()
	$.ajax({
		url: 'pembelian/simpandata',
		type: "post",
		data: form,
		dataType: "JSON",
		success: function (DataPembelian) {
			if (DataPembelian.status == true) {
				$('div.form-group').removeClass('has-error').removeClass('has-success')
					.find('.text-danger').remove();
				location.reload();
				return;
			}
			else {
				$.each(DataPembelian.msg, function (key, val) {
					var element = $('#' + key);
					element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(val.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();
					element.after(val);
					return;
				})
			}
		}
	})
})
$("#pembelian #destroy").on("click",function(){
	location='pembelian/destroy';
})

// Simpan Pembelian
$('#pembelian #simpan_detail').on('click', function (e) {
	e.preventDefault();
	var form = $("#detail_transaksi").serialize()
	var href = 'pembelian/tambahdetail';
	$.ajax({
		url: href,
		type: "post",
		data: form,
		dataType: "JSON",
		success: function (DetailPembelian) {
			if (DetailPembelian.status == true) {
				$('div.form-group').removeClass('has-error').removeClass('has-success')
					.find('.text-danger').remove();
				location.reload();
				return;
			}
			else {
				$.each(DetailPembelian.msg, function (key, val) {
					var element = $('#' + key);
					element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(val.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();
					element.after(val);
					return;
				})
			}
		}
	})
});


// Check Total Bayar Pembelian
$("#bayar_id").focusout(function(e){
	e.preventDefault();
	var ttl_belanja,bayar,ttl_all,txt_hasil;
	ttl_belanja = parseInt($("#pembayaran_beli #total_bayar").attr('data-id'));
	bayar = parseInt($(this).val());
	ttl_all = parseInt(bayar - ttl_belanja);
	if (bayar >= ttl_belanja ) {
		$("#pembayaran_beli .hasil_kembali").text(ttl_all);
		$("#pembayaran_beli #txt_pesan").removeClass('callout-danger').css('display', 'block').addClass("callout-success");
		$("#pembayaran_beli .notif_pesan").text("Lunas");
		$("#pembayaran_beli .desc_pesan").text("Pembayaran sudah lunas!!");
		$("#pembayaran_beli #txt_total").text("Bayar tidak kurang");
		return;
	}
	else{
		$("#pembayaran_beli .hasil_kembali").text(ttl_all);
		$("#pembayaran_beli #txt_total").text("Bayar kurang");
		$("#pembayaran_beli #txt_pesan").css('display', 'none');
		$("#pembayaran_beli #txt_pesan").removeClass('callout-success').css('display', 'block').addClass("callout-danger");
		$("#pembayaran_beli .notif_pesan").text("Kurang!");
		$("#pembayaran_beli .desc_pesan").text("Pembayaran belum Kurang!!");
		return;
	}
});

// Pembelian Selesai
$("#pembayaran_beli #pembelian_selesai").on("click",function(){
	var ttl_belanja = $("#pembayaran_beli #total_bayar").attr('data-id');
	var bayar = parseInt($("#pembayaran_beli #bayar_id").val());
	// alert(bayar);return;
	if (bayar == "") {
		Swal({
			title: "Kosong !",
			text: "Masukkan Pembayaran",
			type: "warning",
		})
		return;
	}
	else if (ttl_belanja > bayar){
		Swal({
			title: "Pembayaran Kurang !",
			text: "Jumlah Pembayaran kurang dari total",
			type: "warning",
		})
		return;
	}
	else{
		Swal({
			title:"Yakin ?",
			text:"Apakah ingin menyimpan",
			type:"question",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Simpan !'
		}).then((result)=>{
			if (result.value) {
				$.ajax({
					url: "pembelian/selesai",
					type:"post",
					data:{ttl_belanja:ttl_belanja,bayar:bayar},
					dataType:"JSON",
					success:function(Okey){
						console.log(Okey);
						Swal({
							title:Okey.title,
							text:Okey.text,
							type:Okey.type
						}).then((result)=>{
							if(result.value){
								location.reload();
							}
						})
					},
					error: function (jqXHR, textStatus, errorThrown) {
						console.log(jqXHR, textStatus, errorThrown);
					}
				})
			}
		})
	}
});


// Kelola Barang
// ?Button Tambah Barang
$("#barang_content #btn_tambah_barang").on("click",function(){
	method = 'tambah';
	$("#modal_barang").modal("show");
	$('#modal_barang .modal-title').text("Tambah Barang");
});

// Event Load Data to Form Modal
$("#barang_content #btn_barang_update").on("click",function(e){
	var id = $(this).attr("data-id");
	$.ajax({
		url:"barang/edit/"+id,
		type:"GET",
		dataType:"JSON",
		success:function(GetBarang){
			$("#form_barang #lbl_kd").css("display","none");
			$("#form_barang [name=input_kd]").val(GetBarang.barang_kd).attr("type","hidden");
			$("#form_barang [name=input_nama]").val(GetBarang.barang_name);
			$("#form_barang [name=input_berat]").val(GetBarang.berat);
			$("#form_barang [name=input_satuan]").val(GetBarang.satuan_id);
			$("#form_barang [name=input_kategori]").val(GetBarang.category_id);
			$("#form_barang [name=input_harga_beli]").val(GetBarang.harga_beli);
			$("#form_barang [name=input_jumlah]").val(GetBarang.stok);
			$("#modal_barang").modal("show");
		}
	})
});

// Insert and Update barang
$("#modal_barang #form_barang").on("submit", function (e) {
	e.preventDefault();
	var form = $(this).serialize();
	if (method == "tambah"){
		url = "barang/tambah";
		txt = "Ditambahkan";
	}
	else{
		url = "barang/ubah";
		txt = 'Diubah';
	}
	// Transfer Async data
	$.ajax({
		url: url,
		type: "post",
		data: form,
		dataType: "JSON",
		success: function (Berhasil) {
			if (Berhasil.status == true) {
				$('div.form-group').removeClass('has-success').removeClass('has-error')
					.find('.text-danger').remove();
				$('#modal_barang').modal('hide');
				Swal({
					title: 'Berhasil',
					text: Berhasil.title,
					type: 'success'
				}).then((result) => {
					if (result.value) {
						location.reload();
						return;
					}
				})
			} else {
				$.each(Berhasil.msg, function (key, value) {
					var element = $('#' + key);
					console.log(Berhasil.msg);
					element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(value.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();
					element.after(value);
					return;
				})
			}
		}
	});
});

// Delete Barang
$("table#barang #btn_barang_delete").on("click",function(){
	var id = $(this).attr("data-id");

	Swal({
		title: "Hapus ?",
		text: "apakah ingin dihapus",
		type: "question",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus !'
	}).then((result) => {
		if (result.value) {
			// Transfer data
			$.ajax({
				url: "barang/hapus/" + id,
				type: "GET",
				dataType: "JSON",
				success: function (hapusBerhasil) {
					swal({
						title: "Berhasil",
						text: "Data berhasil dihapus",
						type: "success"
					}).then((result) => {
						if (result.value) {
							location.reload();
							return;
						}
					})
				}
			});
		}
	})	
});

// #setting_harga
// Set Barang yang dicari
$("#setting_harga #set_barang").on("click",function(){
	var kd_barang = $("#setting_harga #cari_data").val();
	// alert(kd_barang);
	if (kd_barang == "") {
		Swal({
			title:"Perhatian !",
			text:"pilih Barang !",
			type:"warning"
		})
	}
	else{
		$.ajax({
			url:'settingbarang/setdata/'+kd_barang,
			type:"get",
			dataType:"JSON",
			success:function(dataBarang){
				$('#setting_harga #kd_view').val(dataBarang.barang);
				$('#setting_harga #kd_harga').val(dataBarang.barang);
				$('#setting_harga #nama_view').val(dataBarang.name);
				$('#setting_harga #jumlah_view').val(dataBarang.stok);
				$('#setting_harga #harga_view').val(dataBarang.harga);
				$('#setting_harga #harga_view').attr("data-harga",dataBarang.harga);
				return;
			}
		})
	}
});

// Harga FOcusout
$("#setting_harga #set_harga").on("focusout",function(){
	var harga = parseInt($(this).val());
	var harga_beli = parseInt($("#setting_harga #harga_view").attr('data-harga'));

	var total = parseInt(harga - harga_beli);
	$("#setting_harga #set_laba_harga").val(total);
});

// Tambah Harga for Item
$("#setting_harga #hargain").on("submit",function(e){
	e.preventDefault();
	// alert($(this).serialize());return;
	$.ajax({
		url:"settingbarang/tambah",
		type:"post",
		data:$(this).serialize(),
		dataType:"JSON",
		success:function(harga){
			console.log(harga);
			if (harga.status == true) {
				$('div.form-group').removeClass('has-error').removeClass('has-success')
				.find('.text-danger').remove();
				Swal({
					title: "Berhasil",
					text: "Satuan Berhasil ",
					type: 'success'
				}).then((result) => {
					if (result.value) {
						location.reload();
						return;
					}
				})
			}
			else {
				$.each(harga.msg, function (key, val) {
					var element = $('#' + key);
					element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(val.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();
					element.after(val);
					return;
				})
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR, textStatus, errorThrown);
		}
	})
});

// Edit Barang
$("table#barang #update_harga").on("click",function(){
	var id = $(this).attr("data-id");
	$.ajax({
		url:"settingbarang/setharga/"+id,
		type:"get",
		dataType:"JSON",
		success:function(Berhasil){
			console.log(Berhasil);
			$("#modal_harga [name=nama_barang_harga]").val(Berhasil.nama_barang);
			$("#modal_harga [name=nama_harga]").val(Berhasil.name);
			$("#modal_harga [name=jumlah_harga]").val(Berhasil.jumlah);
			$("#modal_harga [name=harga_jual]").val(Berhasil.jual);
			$("#modal_harga").modal("show");
			// Swal({
			// 	title:"Berhasil",
			// 	text:"Data berhasil diupdate",
			// 	type:"success"
			// }).then((result)=>{
			// 	if (result.value) {
			// 		location.reload();
			// 		return;
			// 	}
			// })
		}
	})
});

// Pilih Transaksi Penjualan

$("#penjualan #pilih_barang").on("click",function(){
	var kd_barang = $("#kd_barang_trans option:selected").val();
	if (kd_barang == "") {
		Swal({
			title:"Perhatian !",
			text:"Pilih Kode Barang",
			type:"warning"
		})
	}
	else{
		$.ajax({
			url:"penjualan/getselect/"+kd_barang,
			type:"GET",
			dataType:"JSON",
			success:function(Berhasil){
				$.each(Berhasil.prices,function (key,value){
					$(".daftar_harga li").text(value.harga_jual);
					console.log(value);
				});
				$("#penjualan [name=nama_barang_trans]").val(Berhasil.name);
				$("#penjualan [name=berat_barang_trans]").val(Berhasil.berat);
				$("#penjualan [name=satuan_barang_trans]").val(Berhasil.satuan);
				$("#penjualan [name=kategori_barang_trans]").val(Berhasil.kategori);
				$("#penjualan [name=jumlah_barang_trans]").val(1);
			}, error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR, textStatus, errorThrown);
			}
		})
	}
});

// check harga with jumlah
$("#jumlah_barang_trans").on("focusout",function(){
	var kd_barang = $("#kd_barang_trans").val();
	var jumlah = $(this).val();
	$.ajax({
		url:"penjualan/checkharga",
		type:"post",
		data:{kd:kd_barang,jml:jumlah},
		dataType:"JSON",
		success:function(Hello){
			console.log(Hello.satu);
		}, error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR, textStatus, errorThrown);
		}	
	})
});