<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/upload/default.png">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="<?= base_url(); ?>/assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">

    <title><?= $title; ?></title>

</head>

<body>

    <header class="header">
        <a href="<?= site_url('page'); ?>" class="logo" style="text-decoration: none;"> <i class="fa-solid"><img src="<?= base_url(); ?>/assets/upload/default.png" alt="" height="40px"></i> JejakaOutdoor <span style="color: black;"> | Login</span></a>
    </header>

    <section class="login">
        <div class="content">
            <p class="p1">Login</p>
            <?php echo $this->session->flashdata('msg'); ?>
            <br>
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="">Username</label>
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <div class="input-group">
                        <input type="password" id="pass" class="form-control" name="password" style="text-transform: none;">
                        <div class="input-group-append">
    
                            
                            <span id="mybutton" onclick="change()" class="input-group-text">
    
                                
                                <svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <input type="submit" value="Login" class="btn" name="Login">
                <!-- <button type="submit" class="btn btn-primary" name="Login">Login</button> -->
            </form>

            <!-- <form action="" method="post">
                <input class="box" type="text" placeholder="Username" name="username">
                    
                <input class="box" type="password" placeholder="Password" id="password" name="password">
                <input type="submit" value="Login" class="btn" name="Login">
            </form> -->
            <p class="p2" data-bs-toggle="modal" data-bs-target="#forgotpass" data-bs-whatever="@mdo">lupa password? <a href="#">klik disini</a></p>
            <p class="p2">tidak memiliki akun? <a href="<?= site_url('auth/register'); ?>">daftar</a></p>
        </div>
    </section>

    <?php $this->load->view('partial/footer'); ?>

    <!-- custom js -->
    <div class="modal fade" id="forgotpass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Lupa Password</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form action="<?= site_url('auth/respass'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><h5>Masukan Email Anda!</h5></label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" style="text-transform: lowercase;">
                        <p style="color: red;"><?= form_error('email'); ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="pass" name="password" placeholder="*********">
                        <p style="color: red;"><?= form_error('password'); ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="passconf" placeholder="*********">
                        <p style="color: red;"><?= form_error('passconf'); ?></p>
                    </div>
                    <button type="submit" class="btn" name="submit">Submit</button>
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                </form>
        </div>
        <div class="modal-footer">
            <p>&copy; Mahasiswa Unla | Jejaka Outdoor</p>
        </div>
        </div>
    </div>
    </div>
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- INI -->
    <script src="/js/number-incrementer.bootstrap.js"></script>
    <script>
            // membuat fungsi change
            function change() {
    
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('pass').type;
    
                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {
    
                    //ubah form input password menjadi text
                    document.getElementById('pass').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="Crimson" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
                }
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('pass').type = 'password';
    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
                }
            }
        </script>

</body>

</html>