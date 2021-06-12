<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="registermodal">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Log In</h4>
                <div class="login-form">
                    <form>

                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="*******">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                        </div>

                    </form>
                </div>

                <div class="social-login mb-3">
                    <ul>
                        <li>
                            <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                            <label for="reg" class="checkbox-custom-label">Save Password</label>
                        </li>
                        <li class="right"><a href="#" class="theme-cl">Forget Password?</a></li>
                    </ul>
                </div>

                {{-- <div class="modal-divider"><span>Or login via</span></div>
                <div class="social-login ntr mb-3">
                    <ul>
                        <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                        <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                    </ul>
                </div> --}}

                <div class="text-center">
                    <p class="mt-2">Haven't Any Account? <a href="register.html" class="link">Click here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
