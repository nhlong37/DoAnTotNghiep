<div class="menu_mobi_add">
    <a class="logo-mb" href="">
        <img src="{{ asset('assets/images/logo.png') }}"alt="">
    </a>
    
    <div class="load-menu"></div>
</div>
<div class="menu_mobi w-clear">
    <p class="menu_baophu"></p>
    <p class="icon_menu_mobi"><i class="fas fa-bars"></i></p>        
    <a class="logo-mobi" href=""><img src="{{ asset('assets/user/images/logo.png') }}"alt=""></a>
    <div class="search-res">
        <p class="icon-search transition"><i class="fa fa-search"></i></p>
        <div class="search-grid w-clear">
            <input type="text" name="keyword2" id="keyword2" placeholder="Nhập từ khoá cần tìm" />
            <p ><i class="fa fa-search"></i></p>
        </div>
    </div>
    <?php /* ?><a href="" class="home_mobi"><i class="fa fa-home" aria-hidden="true"></i></a> */?>
</div>
{{-- onclick="onSearch('keyword2');" --}}
{{-- onkeypress="doEnter(event,'keyword2');" --}}