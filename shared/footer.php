<footer class="ct-footer">
                <div class="container">
                    <div class="ct-footer-meta text-center-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <address>
                                    <span><?php echo $r['identitas_website'] ?><br>
                                    <?php echo $r['identitas_alamat'] ?><br>
                                    <span>No Telp:<?php echo $r['identitas_notelp'] ?></span>
                                </address>
                            </div>
                            <div class="col-sm-9 col-md-9">
                                <ul class="ct-socials list-unstyled list-inline">
                                    <li>
                                        <a href="<?php echo $r['identitas_fb'] ?>" target="_blank"><img alt="facebook" src="https://www.solodev.com/assets/footer/facebook-white.png"></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $r['identitas_tw'] ?>" target="_blank"><img alt="twitter" src="https://www.solodev.com/assets/footer/twitter-white.png"></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $r['identitas_yb'] ?>" target="_blank"><img alt="youtube" src="https://www.solodev.com/assets/footer/youtube-white.png"></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $r['identitas_ig'] ?>" target="_blank"><img alt="instagram" src="https://www.solodev.com/assets/footer/instagram-white.png"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ct-footer-post">
                    <div class="container">
                        <div class="inner-left">
                            <ul>
                                <li>
                                    <a href="?module=room">Cari Kamar</a>
                                </li>
                                <li>
                                    <a href="?module=payment">Pembayaran</a>
                                </li>
                                <li>
                                    <a href="?module=cart">Cart</a>
                                </li>
                                <li>
                                    <a href="?module=checkout">Checkout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="inner-right">
                            <p>
                                Copyright © 2018 <?php echo $r['identitas_website'] ?>
                            </p>
                            <p>
                                <a class="ct-u-motive-color" href="" target="_blank">Web Design</a> by <?php echo $r['identitas_author'] ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>


            <style>
a.foot,
a.foot:hover,
a.foot:focus,
a.foot:active {
    text-decoration: none;
    color: inherit
}

a.foot {
    -webkit-transition: all .25s ease-in-out;
    transition: all .25s ease-in-out
}

.ct-u-paddingTop10 {
    padding-top: 10px !important
}

.ct-footer {
    background-color: #111;
    padding-top: 30px;
    margin-top: 20px;
    position: relative;
}

.ct-footer-pre {
    width: 100%;
    padding-bottom: 55px;
    border-bottom: 1px solid #555;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

@media (min-width:1200px) {
    .ct-footer-pre {
        display: table
    }
    .ct-footer-pre > .inner {
        display: table-cell;
        vertical-align: middle
    }
}

@media (max-width:1199px) {
    .ct-footer-pre .form-group {
        padding-top: 15px
    }
}

.ct-footer-pre span {
    font-family: 'Open Sans Condensed', sans-serif;
    color: #ebebeb;
    font-size: 30px
}

.ct-footer-pre .form-group {
    position: relative;
    margin: 0;
}

.ct-footer-pre .form-group:before,
.ct-footer-pre .form-group:after {
    content: '';
    display: table
}

.ct-footer-pre .form-group:after {
    clear: both
}

.ct-footer-pre .form-group input {
    border: 1px solid #00bff3;
    background-color: #333;
    color: #fff;
    height: 50px;
    padding: 0 30px;
    margin: 0 5px;
    border-radius: 0 !important;
}

@media (min-width:480px) {
    .ct-footer-pre .form-group input {
        width: 331px
    }
}

.ct-footer-pre .form-group button {
    height: 50px;
    position: relative;
    width: 80px;
    padding: 0
}

@media (min-width:480px) {
    .ct-footer-pre .form-group button {
        top: -1px
    }
}

@media (max-width:479px) {
    .ct-footer-pre .form-group input {
        float: left;
        width: 70%;
        margin: 0
    }
    .ct-footer-pre .form-group button {
        float: left;
        width: 30%
    }
}

.ct-footer-list {
    padding:20px 0;
    list-style: none;
    padding-left: 0;
    display: table;
    width: 100%;
    border-bottom: 1px solid #555;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

@media (max-width:479px) {
    .ct-footer-list {
        padding: 20px 0
    }
}

@media (min-width:1200px) {
    .ct-footer-list > li {
        width: 20%;
        display: table-cell;
        vertical-align: top
    }
    .ct-footer-list > li:last-child {
        width: 7%
    }
}

@media (min-width:768px) and (max-width:1199px) {
    .ct-footer-list > li {
        width: 33.3333%
    }
}

@media (min-width:480px) and (max-width:767px) {
    .ct-footer-list > li {
        width: 50%
    }
}

@media (max-width:479px) {
    .ct-footer-list > li {
        width: 100%;
        text-align: center
    }
}

@media (max-width:1199px) {
    .ct-footer-list > li {
        display: inline-block;
        float: left
    }
}

.ct-footer-list > li .ct-footer-list-header {
    font-family: 'Open Sans Condensed', sans-serif;
    color: #00bff3;
    font-size: 30px
}

.ct-footer-list > li ul {
    list-style: none;
    padding-left: 0;
}

.ct-footer-list > li ul li a {
    color: #fff;
}

.ct-footer-list > li ul li a:hover {
    text-decoration: underline
}

.ct-footer-post {
    background: #000;
    padding: 20px 0px 10px 0;
}

.ct-footer-post .inner-left,
.ct-footer-post .inner-right {
    padding: 20px 0
}

.ct-footer-post ul {
    list-style: none;
    padding-left: 0;
    margin: 0 -20px;
}

.ct-footer-post ul li {
    display: inline-block;
    margin: 0 20px
}

.ct-footer-post a {
    color: #fff;
}

.ct-footer-post a:hover {
    text-decoration: underline
}

.ct-footer-post p {
    color: #fff;
}

@media (min-width:768px) {
    .ct-footer-post p {
        display: inline-block
    }
    .ct-footer-post p + p {
        padding-left: 50px
    }
}

@media (min-width:992px) {
    .ct-footer-post .inner-left {
        float: left
    }
    .ct-footer-post .inner-right {
        float: right
    }
}

@media (max-width:991px) {
    .ct-footer-post {
        text-align: center
    }
}

.ct-footer-meta {
    padding-top: 0px;
}

.ct-footer-meta .ct-socials {
    text-align: center;
    padding: 0px 0;
}

.ct-footer-meta .ct-socials li {
    padding: 0 3px
}

.ct-footer--with-button {
    padding-top: 150px
}

address {
    color: #fff;
    display: inline-block;
}

address span {
    font-weight: 600
}

address a {
    color: #fff;
}

address a:hover {
    text-decoration: underline
}

@media (max-width:767px) {
    address {
        padding-top: 30px
    }
}

.btn.foot {
    font-family: 'Open Sans Condensed', sans-serif;
    border-radius: 0;
    border: none;
    text-transform: uppercase;
    color: #111;
    font-size: 26px;
    padding: 12px 30px;
}

.btn.btn-motive {
    background-color: #00bff3;
    -webkit-transition: all .25s ease;
    transition: all .25s ease;
}

.btn.btn-motive:hover {
    background-color: #00bff3;
}

.btn.btn-motive:hover:active {
    background-color: #00bff3
}

.btn.btn-violet {
    color: #fff;
    background-color: #4f4f99;
    -webkit-transition: all .25s ease;
    transition: all .25s ease;
}

.btn.btn-violet:hover {
    background-color: #37376b;
}

.btn.btn-violet:hover:active {
    background-color: #2f2f5b
}

.btn.btn-green {
    color: #fff;
    background-color: #43670f;
    -webkit-transition: all .25s ease;
    transition: all .25s ease;
}

.btn.btn-green:hover {
    background-color: #36520c;
}

.btn.btn-green:hover:active {
    background-color: #314a0b
}

.btn.btn-red {
    color: #fff;
    background-color: #da2229;
    -webkit-transition: all .25s ease;
    transition: all .25s ease;
}

.btn.btn-red:hover {
    background-color: #ae1b21;
}

.btn.btn-red:hover:active {
    background-color: #9d181e
}

.btn.btn-white {
    background-color: #fff;
    -webkit-transition: all .25s ease;
    transition: all .25s ease;
}

.btn.btn-white:hover {
    background-color: #d9d9d9;
}

.btn.btn-white:hover:active {
    background-color: #c9c9c9
}

.btn.btn-large {
    padding: 20px 50px;
    font-size: 30px;
    white-space: normal;
}

@media (max-width:479px) {
    .btn.btn-large {
        padding: 20px 10px;
        line-height: .9;
        font-size: 26px;
        letter-spacing: -.2px
    }
}
.ct-mediaSection {
    background-attachment: fixed
}

.ct-section_header--type1 {
    font-family: 'Open Sans Condensed', sans-serif;
    color: #000;
    font-size: 115px;
    text-transform: uppercase;
}

@media (max-width:479px) {
    .ct-section_header--type1 {
        font-size: 60px;
        line-height: .8
    }
}

.ct-section_header--type2 small {
    font-family: 'coquette', fantasy;
    font-size: 58px;
    line-height: .7;
    display: block;
    font-weight: 700;
    position: relative;
    left: -12px
}

.ct-section_header--type2 span {
    font-family: 'Bebas Neue';
    font-size: 115px;
    line-height: .8
}

.ct-section_header--type2 img {
    display: inline-block;
    float: left;
    position: relative;
    top: 15px;
    padding-right: 3px
}

.ct-section_header--type3 {
    text-align: center;
}

.ct-section_header--type3 small {
    font-family: 'coquette', fantasy;
    font-size: 50px;
    padding: 15px 0;
    font-weight: 700;
    color: #fff;
    background-image: url("/core/fileparse.php/16/urlt/../images/ribbon.png");
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    display: block
}

.ct-section_header--type3 span {
    font-family: 'Bebas Neue';
    font-size: 150px;
    font-weight: 400;
    text-transform: uppercase;
    line-height: .85
}

@media (max-width:479px) {
    .ct-section_header--type3 small {
        font-size: 25px
    }
    .ct-section_header--type3 span {
        font-size: 90px
    }
}

.ct-section_header--type4 {
    text-align: center;
}

.ct-section_header--type4:before,
.ct-section_header--type4:after {
    content: '';
    display: table
}

.ct-section_header--type4:after {
    clear: both
}

.ct-section_header--type4 small {
    font-family: 'coquette', fantasy;
    font-size: 50px;
    color: inherit;
    font-weight: 700;
    display: block
}

.ct-section_header--type4 span {
    font-family: 'nimbus-sans-condensed', sans-serif;
    font-weight: 400;
    font-weight: bold;
    font-size: 150px;
    text-transform: uppercase;
    display: block;
    line-height: .7
}

@media (max-width:479px) {
    .ct-section_header--type4 small {
        font-size: 40px
    }
    .ct-section_header--type4 span {
        font-size: 80px
    }
}

.ct-section_header + p {
    font-size: 30px;
    font-weight: 700;
    letter-spacing: -1.5px;
    text-align: center;
}

@media (max-width:479px) {
    .ct-section_header + p {
        font-size: 22px
    }
}

.ct-section_header--type4 + p {
    font-family: 'nimbus-sans-condensed', sans-serif;
    font-weight: 400;
    font-size: 40px;
    font-weight: 700;
    line-height: 1;
}

@media (max-width:479px) {
    .ct-section_header--type4 + p {
        font-size: 28px
    }
}
</style>