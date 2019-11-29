<div class="cl-mcont">
    <div class='row'>
        <div class="col-md-6">
            <div class="block-flat">
                <div class="header">
                    <h4>Selamat datang di
                        <?php echo $r['identitas_website'] ?>
                    </h4>
                </div>
                <div class="content">
                    <div class='blockquote'>
                        <?php echo $r['identitas_deskripsi'] ?>
                    </div>
                    <div style="text-align: center;margin-top: 30px;">
            <a class="btn btn-primary" href="?module=room">Cari Kamar</a>
                </div> </div>
            </div>
            <div class="block-flat" style="margin-top: -10px;">
                        <div class='text-orange'>
                            <h5>Informasi <?php echo $r['identitas_website'] ?> </h5>
                        </div>
                Alamat :  <?php echo $r['identitas_alamat'] ?><br>
                No Telp:  <?php echo $r['identitas_notelp'] ?>
            </div>
        </div>
    <div class="col-md-6">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $slidesactive=mysqli_query($connect,"SELECT * FROM slide LIMIT 1");
                    if(mysqli_num_rows($slidesactive) === 0) {
                        ?>
                <div class="item active">
                    <img src="http://placehold.it/2000x2000" alt="Slide 1">
                    <div class="carousel-caption">
                        Caption Slide 1
                    </div>
                </div>
                <?php } else {
                while ($slideactive=mysqli_fetch_array($slidesactive)) { ?>
                <div class="item active">
                    <img src="admin/assets/images/slide/<?php echo $slideactive['slide_photo'] ?>" alt="Slide 1" style="width: 100%;height:350px !important">
                    <div class="carousel-caption">
                        <?php echo $slideactive['slide_name'] ?>
                    </div>
                </div>
                <?php } } 
                $no=1;
                $slides=mysqli_query($connect,"SELECT * FROM slide LIMIT 5");
                if(mysqli_num_rows($slides) != 0) {
                while ($slide=mysqli_fetch_array($slides)) { 
                 if ($no == 1) {?>
               <?php } else { ?>   
                <div class="item">
                    <img src="admin/assets/images/slide/<?php echo $slide['slide_photo'] ?>" alt="Slide 2" style="width: 100%;height:350px !important">
                    <div class="carousel-caption">
                        <?php echo $slide['slide_name'] ?>
                    </div>
                </div>
                <?php  }
                  $no++;
                }}
                ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
</div>