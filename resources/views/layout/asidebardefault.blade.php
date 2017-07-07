
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                <div class="email">john.doe@example.com</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">><i class="material-icons">input</i>Sign Out</a></li>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{(isset($page) && $page && $page=='dashboard')?'active':''}}">
                    <a href="{{url('/dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{(isset($page) && $page && $page=='orders')?'active':''}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">toc</i>
                        <span>Orders</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page=='pending-order')?'active':''}}">
                            <a href="{{ url('/order/pending-order')  }}">Pending Orders</a>
                        </li>
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page=='order-history')?'active':''}}">
                            <a href="{{ url('/order/order-history')  }}">
                                Order History
                            </a>

                        </li>
                    </ul>
                </li>

                <li class="{{(isset($page) && $page && $page=='customer')?'active':''}}">
                    <a href="{{url('/customer')}}">
                        <i class="material-icons">group</i>
                        <span>Customers</span>
                    </a>
                </li>


                <li class="{{(isset($page) && $page && $page=='categories')?'active':''}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Categories</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page=='add-category')?'active':''}}">
                            <a href="{{ url('/category')  }}">Add Category</a>
                        </li>
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page=='view-category')?'active':''}}">
                            <a href="{{ url('/category/view-all-category')  }}">
                                View Categories
                            </a>

                        </li>

                    </ul>
                </li>


                <li class="{{(isset($page) && $page && $page=='products')?'active':''}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">toc</i>
                        <span>Menu Items</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page=='add-product')?'active':''}}">
                            <a href="{{ url('/product/add-product')  }}">Add Menu Item</a>
                        </li>
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page=='view-product')?'active':''}}">
                            <a href="{{ url('/product/view-all-product')  }}">
                                View Menu Item
                            </a>

                        </li>
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page=='bucket-product')?'active':''}}">
                            <a href="{{ url('/product/add-bucket-product')  }}">Add New Bucket</a>
                        </li>
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page=='view-bucket-product')?'active':''}}">
                            <a href="{{ url('/product/view-bucket-product')  }}">View Bucket Product</a>
                        </li>
                    </ul>
                </li>

                 <li class="{{(isset($page) && $page && $page=='aboutus')?'active':''}}">
                    <a href="{{url('/about-us')}}">
                        <i class="material-icons">local_library</i>
                        <span>About Us</span>
                    </a>
                </li>

                <li class="{{(isset($page) && $page && $page=='discount')?'active':''}}">
                    <a href="{{url('/add-discount')}}">
                        <i class="material-icons">label</i>
                        <span>Discounts</span>
                    </a>
                </li>
                <li class="{{(isset($page) && $page && $page=='coupon')?'active':''}}">
                    <a href="{{url('/add-coupon')}}">
                        <i class="material-icons">subtitles</i>
                        <span>Coupons</span>
                    </a>
                </li>




                <li class="header">MORE</li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons col-red">donut_large</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons col-amber">donut_large</i>
                        <span>Notifications</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 <a href="javascript:void(0);">Order App</a>.
            </div>
            <div class="version">
                {{--<b>Version: </b> 1.0.4--}}
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
