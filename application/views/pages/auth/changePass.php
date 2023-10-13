<section class="login">
    <div class="content">
            <p class="p1">Change Password</p>
            <?php echo $this->session->flashdata('msg'); ?>
            <br>
            <form action="<?= site_url('auth/changepass'); ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Current Password</label>
                    <div class="input-group">
                        <input type="hidden" name="userid" value="<?= $this->session->userdata('userid'); ?>">
                        <input type="password" id="curpass" class="form-control" name="curpassword" style="text-transform: none;">
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
                    <label for="exampleInputEmail1">New Password</label>
                    <div class="input-group">
                        <input type="password" id="newpass" class="form-control" name="newpassword" style="text-transform: none;">
                        <div class="input-group-append">
    
                            
                            <span id="mybutton2" onclick="change2()" class="input-group-text">
    
                                
                                <svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <label for="exampleInputEmail1">Retype Password</label>
                    <div class="input-group">
                        <input type="password" id="repass" class="form-control" name="repassword" style="text-transform: none;">
                        <div class="input-group-append">
    
                            
                            <span id="mybutton3" onclick="change3()" class="input-group-text">
    
                                
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
                <input type="submit" value="Change Password" class="btn" name="Login">
                <!-- <button type="submit" class="btn btn-primary" name="Login">Login</button> -->
            </form>
    </div>
 
</section>