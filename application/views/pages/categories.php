<section class="detail" style="overflow-y: scroll;">
    <?php if($item != null) { ?>
    <h2><?= $title; ?></h2>
    <br>
    <div class="card-detail">
        <?php 
        foreach($item as $it) : ?>
        <div class="box">
            <img src="<?= base_url(); ?>/assets/upload/<?= $it->img_item; ?>">
            <h3 style="font-size: 16px;"><?= $it->nm_item; ?></h3>
            <p><strong><?= $it->brand_item; ?></strong></p>
            <p>Rp.<span><?= $it->prc_item; ?></span>/hari</p>
            <p>Stok Tersedia: <span><?= $it->stk_item; ?></span> Buah</p>
            <div class="wrapper-input">
                <?php if(! $this->session->userdata('username')) { ?>
                    <input type="number" value="1" class="num" id="<?php echo $it->id_item;?>" name="quantity">
                    <a href="<?= site_url('auth'); ?>">
                        <input type="submit" class="btn-cart" value="Masukan Keranjang">
                    </a>
                <?php } else { ?>
                    <input type="number" value="1" class="num" id="<?php echo $it->id_item;?>" name="quantity">
                    <input type="submit" value="Masukan Keranjang" class="add_cart btn-cart" data-produkid="<?php echo $it->id_item;?>" data-produknama="<?php echo $it->nm_item;?>" data-produkharga="<?php echo $it->prc_item;?>" id="keranjang" onclick="document.querySelector('.shopping-cart').classList.add('active');">
                <?php } ?>
                <!-- <input type="submit" value="Masukan Keranjang" class="btn-cart"> -->
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <?php } else { ?>
        <div style="font-size: 35px; text-align: center;">
            <h1>No Data Found!</h1>
        </div>
    <?php } ?>
</section>