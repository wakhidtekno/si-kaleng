<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Selamat Datang - UPZIS NU Bojonggede</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">UPZIS NU Bojonggede</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#kaleng">Kaleng</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#saldo">Saldo</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#penerimaan">Penerimaan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#penyaluran">Penyaluran</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">SEDINO SEDEKAH SEWU</h1>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">"yang sedikit menjadi cukup yang sempit menjadi lapang"</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="kaleng">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-1">Kaleng Infaq</h2>
                <!-- Portfolio Grid Items-->
                <div class="row">
                    <p class="text-center font-weight-light mb-0">
                        “Gerakan kaleng koin ini bertujuan menjalin kebersamaan dan komunikasi antara sesama warga dan pengurus NU, memperlancar program-program yang terhambat dana, seperti Rumah Sakit NU Kendal, dan menjadi solusi problem sosial masyarakat seperti memberi bantuan banjir di Kaluwungu Selatan belum lama ini,”
                    </p>
                </div>
                <p class="text-center"> <strong><em>KH. Danial Royan</em></strong> (Ketua PCNU Kendal)</p>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="saldo">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Saldo</h2>

                <!-- About Section Button-->
                <div class="text-center mt-4 h1">
                    @php
                    $total = App\Models\Saldo::orderBy('id','desc')->first()->total;
                     @endphp
                    Rp {{ number_format($total,2,',','.' )}}
                </div>
            </div>
        </section>

        {{-- penerimaan section --}}
        <section class="page-section" id="penerimaan">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-2">Penerimaan Infaq</h2>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Penerimaan</h6>
                            </div>

                            <div class="card-body">
                                    @if (session()->has('pesan'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{ session()->get('pesan') }}
                                    </div>
                                @endif
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kaleng</th>
                                                    <th>RT</th>
                                                    <th>RW</th>
                                                    <th>Tanggal Pegambilan</th>
                                                    <th>Bulan</th>
                                                    <th>Tahun</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($penerimaan as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $item->kaleng->no_register }}</td>
                                                    <td>{{$item->kaleng->munfik->rt}}</td>
                                                    <td>{{$item->kaleng->munfik->rw}}</td>
                                                    <td>{{ date('d-m-Y H:i:s',strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->bulan }}</td>
                                                    <td>{{ $item->tahun }}</td>
                                                    <td>Rp {{ number_format($item->jumlah,2,',','.' )}}</td>
                                                </tr>
                                                @empty
                                                 <tr>
                                                    <td colspan="9" class="text-center">Tidak ada data</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Penyaluran --}}
        <section class="page-section" id="penyaluran">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-2">Penyaluran Infaq</h2>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Penyaluran</h6>
                            </div>

                            <div class="card-body">
                                    @if (session()->has('pesan'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{ session()->get('pesan') }}
                                    </div>
                                @endif
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal</th>
                                                    <th>Bulan</th>
                                                    <th>Tahun</th>
                                                    <th>Keperluan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($penyaluran as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>Rp {{ number_format($item->jumlah,2,',','.' )}}</td>
                                                    <td>{{ date('d-m-Y H:i:s',strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->bulan }}</td>
                                                    <td>{{ $item->tahun }}</td>
                                                    <td>{{ $item->keperluan }}</td>
                                                </tr>
                                                @empty
                                                 <tr>
                                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Hubungi Kami</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form id="contactForm" action="{{route('pesan.store')}}" method="post">
                            @csrf
                            @if (session()->has('pesan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session()->get('pesan') }}
                            </div>
                            @endif
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama" />
                                    @error('nama')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>HP</label>
                                    <input class="form-control" name="hp" id="hp" type="tel" placeholder="Nomor Handphone" />
                                    @error('hp')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Pesan</label>
                                    <textarea class="form-control" name="pesan" id="pesan" rows="5" placeholder="Tulis pesan disini."></textarea>
                                    @error('pesan')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <br />
                            <div class="form-group"><button class="btn btn-primary btn-xl"  type="submit">Kirim</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © {{ date('Y') }}</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Bootstrap core JS-->
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
