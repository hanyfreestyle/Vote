<div class="wrapper">
    <div class="Pc_FullRow">
        <div class="PC_RightDiv">
            <div class="Pc_logoDiv">
                <div class="pc_SitelogoDiv">
                    <img src="MembersCss/img/logo_1.png" />
                </div>
            </div>
            <div class="Pc_MainDiv">
                <div class="Pc_HomeFormLogin">
                    <form role="form"  method="post" class="mb-lg"  id="validate-form" data-parsley-validate enctype="multipart/form-data" >
                        <span class="ErrMass"><?php echo $errorMessage; ?></span>

                        <div class="form-group has-feedback">
                            <input name="txtUserName" placeholder="اسم المستخدم" required="required" data-parsley-minlength="5" class="form-control BorderC">

                        </div>

                        <div class="form-group has-feedback">
                            <input name="txtPassword" class="form-control BorderC" type="password" placeholder="كلمة المرور"  required="required" data-parsley-minlength="6" >
                        </div>

                        <button type="submit" class="btn btn-block login_but">تسجيل دخول</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="PC_LeftDiv"></div>
    </div>
</div>