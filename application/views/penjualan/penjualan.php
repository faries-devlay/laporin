<?php if ($this->session->has_userdata('pembelian')) {
    $disable = "disabled";
}
else{
    $disable ="";
}
?>
<div class="overlay">
    <div class="loader"></div>
</div>
<div class="content-wrapper penjualan" id="penjualan">
    <div class="content">
        <div class="box box-default">
            <div class="box-header">
                <div class="col-sm-4">
                    <h4 class="text-shadow"><span class="fa fa-balance-scale"></span>&nbsp;Penjualan</h4>
                </div>
                <div class="col-sm-4 text-center">
                    <span class="box-title">Kode Transaksi<br><?= $max_kode ?></span>
                </div>
                <div class="col-sm-4 text-right">
                    <span class="box-title"><?= $date ?></span>
                </div>
                
            </div>
        </div>
        <form id="detail_transaksi" action="" method="post">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="title-normal">Detail Barang</span>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <span class="fa fa-minus"></span>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="col-sm-6">
                                <label for="kd_barang_trans">Kode Barang</label>
                            <div class="input-group">
                                <select name="kd_barang_trans" id="kd_barang_trans" class="form-control">
                                    <option value="">Pilih Kode Barang</option>
                                    <?php
                                        foreach ($barang as $key => $value) {
                                    ?>
                                    <option value="<?= $value->barang_kd ?>"><?= $value->barang_kd." - ".$value->barang_name." ".$value->berat." gram" ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger" id="pilih_barang">Pilih</button>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nama_barang_trans">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang_trans" name="nama_barang_trans" Readonly>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="berat_barang_trans">Berat</label>
                                <input type="text" class="form-control" id="berat_barang_trans" Readonly name="berat_barang_trans">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="satuan_barang_trans">Satuan</label>
                                <input type="text" class="form-control" id="satuan_barang_trans" Readonly name="satuan_barang_trans">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="kategori_barang_trans">Kategori</label>
                                <input type="text" class="form-control" id="kategori_barang_trans" Readonly name="kategori_barang_trans">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="jumlah_barang_trans">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah_barang_trans" id="jumlah_barang_trans">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="harga_barang_trans">Harga Barang</label>
                                <input type="number" class="form-control" id="harga_barang_trans" name="harga_barang_trans">
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" id="simpan_detail_trans" class="btn btn-success pull-right">Simpan</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="box">
                            <div class="box-body">
                                <p>Daftar Harga</p>
                                <ul class="daftar_harga">
                                    <li>Nama Harga Beli 1 x Rp 25.000,00</li>
                                    <li>Nama Harga Beli 1 x Rp 25.000,00</li>
                                    <li>Nama Harga Beli 1 x Rp 25.000,00</li>
                                    <li>Nama Harga Beli 1 x Rp 25.000,00</li>
                                    <li>Nama Harga Beli 1 x Rp 25.000,00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="box box-solid">
            <div class="box-header">
                <span class="title-normal">Detail Table</span>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool"><span class=" fa fa-minus"></span></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </thead>
                            <?php
                            $hasil = 0; 
                            if (isset($_SESSION['detail_beli'])) {
                            ?>        
                            <tbody>
                                <?php $No='1';
                                foreach ($_SESSION['detail_beli'] as $key => $detail) :
                                    var_dump($key);
                                ?>
                                    <tr>
                                        <td><?= $No ?></td>
                                        <td class=''><?= $detail['kd_barang'] ?></td>
                                        <td><?= $detail['nama_barang'] ?></td>
                                        <td><?= 'Rp '.number_format($detail['harga_barang'],2,',','.') ?></td>
                                        <td><?= $detail['jumlah_barang'] ?></td>
                                        <td><?php $total = $detail['harga_barang'] * $detail['jumlah_barang']; $hasil+=$total; echo 'Rp '.number_format($total,2,',','.') ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>pembelian/unset/<?= $key ?>" id="unset_session" class="tn input-sm btn-danger"><span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>
                                <?php $No++; endforeach;?>
                            </tbody>
                            <?php
                            }
                            else{
                            ?>
                            <tbody>
                                <tr>
                                    <span>Tabel Kosong</span>
                                </tr>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row" id="pembayaran_beli">
                    <div class="col-sm-6">
                        <div class="callout" id="txt_pesan" style="display:none;">
                            <h4 class="notif_pesan">Lunas</h4>
                            <p class="desc_pesan">Pembelian sudah Lunas!!</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cover_total">
                            <span class="total_pembelian col-sm-5">Total Pembelian</span>
                            <span class="hasil_total col-sm-6" id='total_bayar' data-id="<?php echo $hasil; ?>"><?= number_format($hasil,2,',','.'); ?></span>
                        </div>
                        <div class="cover_bayar">
                            <label for="bayar_id" class="bayar col-sm-5">Bayar</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="inpt_bayar" id="bayar_id">
                                <small class="form-text" id="txt_total"></small>
                            </div>
                        </div>
                        <div class="cover_kembali">
                            <span class="total_kembali col-sm-5">Kembali</span>
                            <span class="hasil_kembali col-sm-6"></span>
                        </div>
                        <div class="cover_button">
                            <button class="btn btn-primary col-sm-3 pull-right" id="pembelian_selesai">Selesai</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>