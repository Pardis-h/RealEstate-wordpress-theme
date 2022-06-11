<div class="header-tow bg-white py-3 d-print-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="d-lg-flex justify-content-center align-items-center text-center" action="<?php echo home_url() ?>" method="get">
                    <input type="text" placeholder="عنوان آگهی . . . ." name="s" value="<?php echo (isset($_GET['s']) && !empty($_GET['s']))?$_GET['s']:'' ?>" class="form-control ml-lg-3 mb-2 mb-lg-0">
                    <input type="hidden" name="post_type" value="advertising_home">
                    <select class="custom-select ml-lg-3 mb-2 mb-lg-0" name="type">
                        <option value="false"> نوع ملک </option>
                        <option value="ویلایی" <?php if(isset($_GET['type']) && !empty($_GET['type'])) selected($_GET['type'],'ویلایی') ?>> ویلایی </option>
                        <option value="آپارتمان" <?php if(isset($_GET['type']) && !empty($_GET['type'])) selected($_GET['type'],'آپارتمان') ?>> آپارتمان </option>
                        <option value="تجاری" <?php if(isset($_GET['type']) && !empty($_GET['type'])) selected($_GET['type'],'تجاری') ?>> تجاری </option>
                    </select>
                    <select class="custom-select ml-lg-3 mb-2 mb-lg-0">
                        <option selected> قیمت </option>
                        <option value="1"> بالای 600 میلیون </option>
                        <option value="2"> از 250 میلیون تا 600 میلیون </option>
                        <option value="3">  از 0 تومن تا 250 میلیون </option>
                    </select>
                    <button class="btn px-4 py-2"> جستجو </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->