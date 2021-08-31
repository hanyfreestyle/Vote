<div class="pcBack"><div class="login_DivCenter">


<div class="container-fluid logo_container"><div class="row">
<div class="col-md-12 py-4 LogoDiv"><img src="css/logo_1.png" class="Logo_img" /></div>
</div></div>

<div class="container-fluid welcome_container">
    <div class="row">
        <div class="col-md-12">
            <p class="py-4">
                مرحبا بك عزيزى العميل فى حسابك على بوابة قيم .. يمكنك استعراض وطباعة تقييمات عملائك لأداء فريق العمل
            </p>

        </div>
    </div>
</div>



<div class="container-fluid form_container">
    <div class="row">
        <div class="col-md-12 formPP">
            <form role="form"  method="post" class="mb-lg"  id="validate-form" data-parsley-validate enctype="multipart/form-data" >
                <div class="ErrMass"><?php echo $errorMessage; ?></div>

                <div class="form-group has-feedback">
                    <input name="txtUserName" placeholder="اسم المستخدم" required="required" data-parsley-minlength="5" class="form-control BorderC">

                </div>

                <div class="form-group has-feedback">
                    <input name="txtPassword" class="form-control BorderC" type="password" placeholder="كلمة المرور"  required="required" data-parsley-minlength="6" >

                </div>

                <button type="submit" class="btn btn-block mobile_but">تسجيل دخول</button>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid photo_container"></div>

</div></div>


