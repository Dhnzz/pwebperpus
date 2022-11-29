<!DOCTYPE html>
<html lang="en">
 <head>
    <title>E-Library</title>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/assetp/css/templatemo-digital-trend.css">
    <link rel="stylesheet" href="assets/assetp/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/assetp/css/aos.css">
    <link rel="stylesheet" href="assets/assetp/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/assetp/css/owl.theme.default.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>

        .scroll-div{
            overflow: hidden;
            overflow-y: scroll;
            scrollbar-width: none;
        }

        .scroll-div::-webkit-scrollbar{
            display:none;
        }

        .bg {
            background: rgb(29,115,204);
            background: linear-gradient(144deg, rgba(29,115,204,1) 0%, rgba(216,45,253,1) 100%);
        }

        .trans-dikit{
            background-color: rgba(255,255,255,0.70);
            
        }
        .nav-bg{
            /* background: rgb(43,219,193);
            background: linear-gradient(90deg, rgba(43,219,193,1) 0%, rgba(186,24,235,1) 100%);  */
            background-color:#303030;
        }

        .parent {
            width: 42px; /* I took the width from your post and placed it in css */
            height: 42px;
        }
        .parent img {
            height: 100%;
            width: 100%;
        }

    </style>
    </head>

 <body class="bg">

     <!-- Navigation Bar  -->

    <nav class="navbar navbar-expand-lg shadow rounded-4 bg-primary m-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <i class="fa fa-book"></i> &nbsp E-Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                <!-- <h4 class="nav-link active text-light" aria-current="page" href="#">Beranda</h4> -->
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-3 rounded-pill text-center pb-2" type="search" placeholder="Cari buku disini" aria-label="Search" style="width:35vh;">
                <button class="btn btn-outline-success rounded-pill text-center text-light bg-success pb-2" type="submit"><i class="fa fa-search"></i></button>
            </form>
            </div>
        </div>
    </nav>

    <!-- End Navigation  -->


    <!-- Colum dan container 1,2,3,4 -->
    <container class="container-fluid">

        <div class="row m-3">
            <div class="col-md-2">
                <div class="col-md-12 rounded-4 border shadow  bg-light">
                    <div class="container-fluid">
                    <div class="row" >
                        <div class="col-sm-12">
                            <img src="assets/assetp/images/working-girl.png" class="img-fluid" alt="working girl">
                        </div>
                        <div class="col-sm-12 text-center p-3 mb-3">
                            <h3>Selamat Datang</h3>
                            <h4>Rahmat Onggi</h4>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-12 rounded-4 border shadow mt-3  bg-light" style="height:85vh;">
                    <div class="list-group">
                        <h4 class="list-group-item list-group-item-action active text-center" aria-current="true">
                         Daftar Pinjaman
                        </h4>
                        <button type="button" class="list-group-item list-group-item-action">A second button item</button>
                        <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                        <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                        <button type="button" class="list-group-item list-group-item-action">A second button item</button>
                        <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                        <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                    </div>          
                </div>
            </div>
            <div class="col-md-10">
                <div class="col-md-12 rounded-4 border shadow  bg-light" >
                
                <!-- Carousel start  -->

                            <div id="carouselExampleCaptions" class="carousel slide p-3" data-bs-ride="false">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active bg-dark" style="height:25vh;">
                                    <img src="..." class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                    </div>
                                    </div>
                                    <div class="carousel-item bg-dark rounded-4" style="height:25vh;">
                                    <img src="..." class="d-block w-100 rounded-4" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>Some representative placeholder content for the second slide.</p>
                                    </div>
                                    </div>
                                    <div class="carousel-item bg-dark rounded-4" style="height:25vh;">
                                    <img src="..." class="d-block w-100 rounded-4" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p>Some representative placeholder content for the third slide.</p>
                                    </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                    <!-- carousel end  -->
                </div>


                <div class="col-md-12 rounded-4 border shadow mt-4 bg-light" style="height: 90vh;">
                     <!-- <div class="col-sm-12 shadow-lg p-4 bg-primary rounded-4">
                        <h2 class="text-center text-white"><i class="fa fa-book"></i> &nbsp BUKU YANG TERSEDIA</h2>
                     </div> -->
                 <div class="container-fluid p-4">  

                    <div class="container-fluid scroll-div"  style="height: 75vh;">
                    
                    <!-- Tabs tombol Buku -->
                    <ul class="nav nav-pills bg-dark rounded-4 mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Buku Fiksi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pelajaran</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Agama</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Tambah</button>
                        </li>
                    </ul>
                    <!-- tabs button end -->    

                    <!-- isi Tiap tabs -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

                        <div class="row pt-5">
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/bukupelajaran.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">IPA KELAS 6</h5>
                                        <p class="card-text">Ini Hanyalah Buku Place Holder Untuk Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/bukupelajaran.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">IPA KELAS 6</h5>
                                        <p class="card-text">Ini Hanyalah Buku Place Holder Untuk Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/bukupelajaran.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">IPA KELAS 6</h5>
                                        <p class="card-text">Ini Hanyalah Buku Place Holder Untuk Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/bukupelajaran.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">IPA KELAS 6</h5>
                                        <p class="card-text">Ini Hanyalah Buku Place Holder Untuk Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/bukupelajaran.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">IPA KELAS 6</h5>
                                        <p class="card-text">Ini Hanyalah Buku Place Holder Untuk Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/bukupelajaran.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">IPA KELAS 6</h5>
                                        <p class="card-text">Ini Hanyalah Buku Place Holder Untuk Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/bukupelajaran.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">IPA KELAS 6</h5>
                                        <p class="card-text">Ini Hanyalah Buku Place Holder Untuk Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                        </div>    

                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

                        <div class="row pt-5">
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/buku.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Legenda Roger</h5>
                                        <p class="card-text">Buku Roger sumatra yang menceritakan asal mula dari meme roger</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/buku.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Legenda Roger</h5>
                                        <p class="card-text">Buku Roger sumatra yang menceritakan asal mula dari meme roger</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/buku.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Legenda Roger</h5>
                                        <p class="card-text">Buku Roger sumatra yang menceritakan asal mula dari meme roger</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/buku.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Legenda Roger</h5>
                                        <p class="card-text">Buku Roger sumatra yang menceritakan asal mula dari meme roger</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/buku.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Legenda Roger</h5>
                                        <p class="card-text">Buku Roger sumatra yang menceritakan asal mula dari meme roger</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/buku.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Legenda Roger</h5>
                                        <p class="card-text">Buku Roger sumatra yang menceritakan asal mula dari meme roger</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 m-4">
                                <div class="card rounded-4" style="width: 15rem;">
                                    <img src="assets/img/buku.jpg" class="card-img-top rounded-4 rounded-bottom" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Legenda Roger</h5>
                                        <p class="card-text">Buku Roger sumatra yang menceritakan asal mula dari meme roger</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">Buku Agama</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">Tambah tab buku di line ini untuk buttonnya ada di atas</div>
                        
                    </div>
                        
                    </div>

                 </div>
                    
                </div>
                
            
            </div>
        </div>

        


    </container>
    
    <!-- End Container  -->
 </body>
 
 <footer>
 </footer>
</html>