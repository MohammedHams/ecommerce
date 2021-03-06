@php
$prefix = Request::route()->getPrefix();
$route =Route::current()->getName();
@endphp
<aside class="main-sidebar" >
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Easy</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route == 'admin.dashboard')?'active':''}}">
                <a href="{{route('admin.dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{($prefix == 'admin/brand')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'brands.view')?'active':''}}"><a href="{{route('brands.view')}}"><i class="ti-more"></i>All Brands</a></li>
                </ul>
            </li>

            <li class="treeview {{($prefix == 'admin/category')?'active':''}}" >
                <a href="#">
                    <i data-feather="mail" ></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'category.view')?'active':''}}"><a href="{{route('category.view')}}"><i class="ti-more"></i>All Category</a></li>
                    <li class="{{($route == 'subcategory.view')?'active':''}}"><a href="{{route('subcategory.view')}}"><i class="ti-more"></i>All SubCategory</a></li>
                    <li class="{{($route == 'subsubcategory.view')?'active':''}}"><a href="{{route('subsubcategory.view')}}"><i class="ti-more"></i>All Sub->SubCategory</a></li>

                </ul>
            </li>

            <li class="treeview {{($prefix == 'admin/products')?'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'product.add')?'active':''}}"><a href="{{route('product.add')}}"><i class="ti-more"></i>Add Products</a></li>
                    <li class="{{($route == 'product.manage')?'active':''}}"><a href="{{route('product.manage')}}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>



                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>




        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
