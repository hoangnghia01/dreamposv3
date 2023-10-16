@if(Route::is(['index-one','index-three']))
  <!-- Sidebar -->
  @if(!Route::is(['index-three']))
  <div class="sidebar new-header sidebar-one">
    @endif
    @if(Route::is(['index-three']))
    <div class="sidebar side-three new-header">
    @endif
    @if(Route::is(['index-three']))
    <div class="container">
    @endif
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="nav">
                <li class="submenu">
                    <a href="index" ><img src="{{ URL::asset('/assets/img/icons/menu-icon.svg')}}" alt="img"><span> Main Menu</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index" ><img src="{{ URL::asset('/assets/img/icons/dashboard.svg')}}" alt="img"><span> Dashboard</span> </a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/product.svg')}}" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="productlist">Product List</a></li>
                                <li><a href="addproduct">Add Product</a></li>
                                <li><a href="categorylist">Category List</a></li>
                                <li><a href="addcategory">Add Category</a></li>
                                <li><a href="subcategorylist">Sub Category List</a></li>
                                <li><a href="subaddcategory">Add Sub Category</a></li>
                                <li><a href="brandlist">Brand List</a></li>
                                <li><a href="addbrand">Add Brand</a></li>
                                <li><a href="importproduct">Import Products</a></li>
                                <li><a href="barcode">Print Barcode</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/sales1.svg')}}" alt="img"><span> Sales</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="saleslist">Sales List</a></li>
                                <li><a href="pos">POS</a></li>
                                <li><a href="pos">New Sales</a></li>
                                <li><a href="salesreturnlists">Sales Return List</a></li>
                                <li><a href="createsalesreturns">New Sales Return</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/purchase1.svg')}}" alt="img"><span> Purchase</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="purchaselist">Purchase List</a></li>
                                <li><a href="addpurchase">Add Purchase</a></li>
                                <li><a href="importpurchase">Import Purchase</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/expense1.svg')}}" alt="img"><span> Expense</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="expenselist">Expense List</a></li>
                                <li><a href="createexpense">Add Expense</a></li>
                                <li><a href="expensecategory">Expense Category</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/quotation1.svg')}}" alt="img"><span> Quotation</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="quotationList">Quotation List</a></li>
                                <li><a href="addquotation">Add Quotation</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/transfer1.svg')}}" alt="img"><span> Transfer</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="transferlist">Transfer  List</a></li>
                                <li><a href="addtransfer">Add Transfer </a></li>
                                <li><a href="importtransfer">Import Transfer </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/return1.svg')}}" alt="img"><span> Return</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="salesreturnlist">Sales Return List</a></li>
                                <li><a href="createsalesreturn">Add Sales Return </a></li>
                                <li><a href="purchasereturnlist">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn">Add Purchase Return </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/users1.svg')}}" alt="img"><span> People</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="customerlist">Customer List</a></li>
                                <li><a href="addcustomer">Add Customer  </a></li>
                                <li><a href="supplierlist">Supplier List</a></li>
                                <li><a href="addsupplier">Add Supplier </a></li>
                                <li><a href="userlist">User List</a></li>
                                <li><a href="adduser">Add User</a></li>
                                <li><a href="storelist">Store List</a></li>
                                <li><a href="addstore">Add Store</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/places.svg')}}" alt="img"><span> Places</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="newcountry">New Country</a></li>
                                <li><a href="countrieslist">Countries list</a></li>
                                <li><a href="newstate">New State </a></li>
                                <li><a href="statelist">State list</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/users1.svg')}}" alt="img"><span> Users</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="newuser">New User </a></li>
                        <li><a href="userlists">Users List</a></li>
                    </ul>
                </li>
                <li  class="submenu">
                    <a href="javascript:void(0);"><i data-feather="layers"></i> <span> Components </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="components" ><i data-feather="layers"></i><span> Components</span> </a></li>
                        <li  class="submenu">
                            <a href="javascript:void(0);"><i data-feather="box"></i> <span>Elements </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="sweetalerts">Sweet Alerts</a></li>
                                <li><a href="tooltip">Tooltip</a></li>
                                <li><a href="popover">Popover</a></li>
                                <li><a href="ribbon">Ribbon</a></li>
                                <li><a href="clipboard">Clipboard</a></li>
                                <li><a href="drag-drop">Drag & Drop</a></li>
                                <li><a href="rangeslider">Range Slider</a></li>
                                <li><a href="rating">Rating</a></li>
                                <li><a href="toastr">Toastr</a></li>
                                <li><a href="text-editor">Text Editor</a></li>
                                <li><a href="counter">Counter</a></li>
                                <li><a href="scrollbar">Scrollbar</a></li>
                                <li><a href="spinner">Spinner</a></li>
                                <li><a href="notification">Notification</a></li>
                                <li><a href="lightbox">Lightbox</a></li>
                                <li><a href="stickynote">Sticky Note</a></li>
                                <li><a href="timeline">Timeline</a></li>
                                <li><a href="form-wizard">Form Wizard</a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a href="javascript:void(0);"><i data-feather="bar-chart-2"></i> <span> Charts  </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="chart-apex">Apex Charts</a></li>
                                <li><a href="chart-js">Chart Js</a></li>
                                <li><a href="chart-morris">Morris Charts</a></li>
                                <li><a href="chart-flot">Flot Charts</a></li>
                                <li><a href="chart-peity">Peity Charts</a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a href="javascript:void(0);"><i data-feather="award"></i><span> Icons  </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="icon-fontawesome">Fontawesome Icons</a></li>
                                <li><a href="icon-feather">Feather Icons</a></li>
                                <li><a href="icon-ionic">Ionic Icons</a></li>
                                <li><a href="icon-material">Material Icons</a></li>
                                <li><a href="icon-pe7">Pe7 Icons</a></li>
                                <li><a href="icon-simpleline">Simpleline Icons</a></li>
                                <li><a href="icon-themify">Themify Icons</a></li>
                                <li><a href="icon-weather">Weather Icons</a></li>
                                <li><a href="icon-typicon">Typicon Icons</a></li>
                                <li><a href="icon-flag">Flag Icons</a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Forms  </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="form-basic-inputs">Basic Inputs </a></li>
                                <li><a href="form-input-groups">Input Groups </a></li>
                                <li><a href="form-horizontal">Horizontal Form </a></li>
                                <li><a href="form-vertical"> Vertical Form </a></li>
                                <li><a href="form-mask">Form Mask </a></li>
                                <li><a href="form-validation">Form Validation </a></li>
                                <li><a href="form-select2">Form Select2 </a></li>
                                <li><a href="form-fileupload">File Upload </a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a href="javascript:void(0);"><i data-feather="layout"></i> <span> Table  </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="tables-basic" >Basic Tables </a></li>
                                <li><a href="data-tables">Data Table </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blankpage" ><i data-feather="file"></i><span> Blank Page</span> </a>
                        </li>
                        <li  class="submenu">
                            <a href="javascript:void(0);"><i data-feather="alert-octagon"></i> <span> Error Pages  </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="error-404">404 Error </a></li>
                                <li><a href="error-500">500 Error </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/product.svg')}}" alt="img"><span> Application</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chat">Chat</a></li>
                        <li><a href="calendar">Calendar</a></li>
                        <li><a href="email">Email</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/time.svg')}}" alt="img"><span> Report</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="purchaseorderreport">Purchase order report</a></li>
                        <li><a href="inventoryreport">Inventory Report</a></li>
                        <li><a href="salesreport">Sales Report</a></li>
                        <li><a href="invoicereport">Invoice Report</a></li>
                        <li><a href="purchasereport">Purchase Report</a></li>
                        <li><a href="supplierreport">Supplier Report</a></li>
                        <li><a href="customerreport">Customer Report</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/settings.svg')}}" alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="generalsettings">General Settings</a></li>
                        <li><a href="emailsettings">Email Settings</a></li>
                        <li><a href="paymentsettings">Payment Settings</a></li>
                        <li><a href="currencysettings">Currency Settings</a></li>
                        <li><a href="grouppermissions">Group Permissions</a></li>
                        <li><a href="taxrates">Tax Rates</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    @if(Route::is(['index-three']))
    </div>
    @endif
</div>
<!-- /Sidebar -->
@endif
<!-- Sidebar -->
@if(Route::is(['index-two']))
<div class="container">
@endif
@if(!Route::is(['index-one','index-two','index-three','index-four']))
<div class="sidebar" id="sidebar">
@endif
@if(Route::is(['index-one']))
<div class="sidebar sidebar-one hide-sidebar" id="sidebar">
@endif
@if(Route::is(['index-two']))
<div class="sidebar sidebar-two" id="sidebar">
@endif
@if(Route::is(['index-three']))
<div class="sidebar sidebar-three hide-sidebar" id="sidebar">
@endif
@if(Route::is(['index-four']))
<div class="sidebar sidebar-four" id="sidebar">
@endif
    <div class="sidebar-inner slimscroll">
        @if(!Route::is(['index-four']))
        <div id="sidebar-menu" class="sidebar-menu">
            @endif
            @if(Route::is(['index-four']))
            <div id="sidebar-menu" class="sidebar-menu sidebar-menu-three">
            <aside id="aside" class="ui-aside">
                <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                      <a class="tablinks nav-link active" href="#home" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"  role="tab" aria-controls="home" aria-selected="true">
                          <img src="{{ URL::asset('/assets/img/icons/menu-icon.svg')}}" alt="">
                      </a>
                  </li>
                  <li class="nav-item" role="presentation">
                      <a class="tablinks nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"  role="tab" aria-controls="messages" aria-selected="false">
                          <img src="{{ URL::asset('/assets/img/icons/menu-icon-01.svg')}}" alt="">
                      </a>
                  </li>
                  <li class="nav-item" role="presentation">
                      <a class="tablinks nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"  role="tab" aria-controls="profile" aria-selected="false">
                          <img src="{{ URL::asset('/assets/img/icons/menu-icon-02.svg')}}" alt="">
                      </a>
                  </li>
                  <li class="nav-item" role="presentation">
                      <a class="tablinks nav-link" id="app-tab" data-bs-toggle="tab" data-bs-target="#app"  role="tab" aria-controls="app" aria-selected="false">
                          <img src="{{ URL::asset('/assets/img/icons/menu-icon-04.svg')}}" alt="">
                      </a>
                  </li>
                  <li class="nav-item" role="presentation">
                      <a class="tablinks nav-link" href="#report" id="report-tab" data-bs-toggle="tab" data-bs-target="#report"  role="tab" aria-controls="report" aria-selected="true">
                          <img src="{{ URL::asset('/assets/img/icons/menu-icon-05.svg')}}" alt="">
                      </a>
                  </li>
                  <li class="nav-item" role="presentation">
                      <a class="tablinks nav-link" href="#set" id="set-tab" data-bs-toggle="tab" data-bs-target="#set"  role="tab" aria-controls="set" aria-selected="true">
                          <img src="{{ URL::asset('/assets/img/icons/menu-icon-06.svg')}}" alt="">
                      </a>
                  </li>
                </ul>
            </aside>
            <div class="tab-content tab-content-four pt-2">
                <ul class="tab-pane active" id="home" aria-labelledby="home-tab">
                    <li><a href="index" ><span> Dashboard</span> </a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Product</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="productlist">Product List</a></li>
                                <li><a href="addproduct">Add Product</a></li>
                                <li><a href="categorylist">Category List</a></li>
                                <li><a href="addcategory">Add Category</a></li>
                                <li><a href="subcategorylist">Sub Category List</a></li>
                                <li><a href="subaddcategory">Add Sub Category</a></li>
                                <li><a href="brandlist">Brand List</a></li>
                                <li><a href="addbrand">Add Brand</a></li>
                                <li><a href="importproduct">Import Products</a></li>
                                <li><a href="barcode">Print Barcode</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Sales</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="saleslist">Sales List</a></li>
                                <li><a href="pos">POS</a></li>
                                <li><a href="pos">New Sales</a></li>
                                <li><a href="salesreturnlists">Sales Return List</a></li>
                                <li><a href="createsalesreturns">New Sales Return</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Purchase</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="purchaselist">Purchase List</a></li>
                                <li><a href="addpurchase">Add Purchase</a></li>
                                <li><a href="importpurchase">Import Purchase</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Expense</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="expenselist">Expense List</a></li>
                                <li><a href="createexpense">Add Expense</a></li>
                                <li><a href="expensecategory">Expense Category</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Quotation</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="quotationList">Quotation List</a></li>
                                <li><a href="addquotation">Add Quotation</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Transfer</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="transferlist">Transfer  List</a></li>
                                <li><a href="addtransfer">Add Transfer </a></li>
                                <li><a href="importtransfer">Import Transfer </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Return</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="salesreturnlist">Sales Return List</a></li>
                                <li><a href="createsalesreturn">Add Sales Return </a></li>
                                <li><a href="purchasereturnlist">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn">Add Purchase Return </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> People</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="customerlist">Customer List</a></li>
                                <li><a href="addcustomer">Add Customer  </a></li>
                                <li><a href="supplierlist">Supplier List</a></li>
                                <li><a href="addsupplier">Add Supplier </a></li>
                                <li><a href="userlist">User List</a></li>
                                <li><a href="adduser">Add User</a></li>
                                <li><a href="storelist">Store List</a></li>
                                <li><a href="addstore">Add Store</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><span> Places</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="newcountry">New Country</a></li>
                                <li><a href="countrieslist">Countries list</a></li>
                                <li><a href="newstate">New State </a></li>
                                <li><a href="statelist">State list</a></li>
                            </ul>
                        </li>
                </ul>
                <ul class="tab-pane" id="messages" aria-labelledby="messages-tab">
                    <li><a href="newuser">New User </a></li>
                    <li><a href="userlists">Users List</a></li>
                </ul>
                <ul class="tab-pane" id="profile" aria-labelledby="profile-tab">
                    <li><a href="components" ><span> Components</span> </a></li>
                    <li  class="submenu">
                        <a href="javascript:void(0);"><span>Elements</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="sweetalerts">Sweet Alerts</a></li>
                            <li><a href="tooltip">Tooltip</a></li>
                            <li><a href="popover">Popover</a></li>
                            <li><a href="ribbon">Ribbon</a></li>
                            <li><a href="clipboard">Clipboard</a></li>
                            <li><a href="drag-drop">Drag & Drop</a></li>
                            <li><a href="rangeslider">Range Slider</a></li>
                            <li><a href="rating">Rating</a></li>
                            <li><a href="toastr">Toastr</a></li>
                            <li><a href="text-editor">Text Editor</a></li>
                            <li><a href="counter">Counter</a></li>
                            <li><a href="scrollbar">Scrollbar</a></li>
                            <li><a href="spinner">Spinner</a></li>
                            <li><a href="notification">Notification</a></li>
                            <li><a href="lightbox">Lightbox</a></li>
                            <li><a href="stickynote">Sticky Note</a></li>
                            <li><a href="timeline">Timeline</a></li>
                            <li><a href="form-wizard">Form Wizard</a></li>
                        </ul>
                    </li>
                    <li  class="submenu">
                        <a href="javascript:void(0);"><span>Charts  </span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="chart-apex">Apex Charts</a></li>
                            <li><a href="chart-js">Chart Js</a></li>
                            <li><a href="chart-morris">Morris Charts</a></li>
                            <li><a href="chart-flot">Flot Charts</a></li>
                            <li><a href="chart-peity">Peity Charts</a></li>
                        </ul>
                    </li>
                    <li  class="submenu">
                        <a href="javascript:void(0);"><span> Icons </span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="icon-fontawesome">Fontawesome Icons</a></li>
                            <li><a href="icon-feather">Feather Icons</a></li>
                            <li><a href="icon-ionic">Ionic Icons</a></li>
                            <li><a href="icon-material">Material Icons</a></li>
                            <li><a href="icon-pe7">Pe7 Icons</a></li>
                            <li><a href="icon-simpleline">Simpleline Icons</a></li>
                            <li><a href="icon-themify">Themify Icons</a></li>
                            <li><a href="icon-weather">Weather Icons</a></li>
                            <li><a href="icon-typicon">Typicon Icons</a></li>
                            <li><a href="icon-flag">Flag Icons</a></li>
                        </ul>
                    </li>
                    <li  class="submenu">
                        <a href="javascript:void(0);"> <span>Forms  </span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="form-basic-inputs">Basic Inputs </a></li>
                            <li><a href="form-input-groups">Input Groups </a></li>
                            <li><a href="form-horizontal">Horizontal Form </a></li>
                            <li><a href="form-vertical"> Vertical Form </a></li>
                            <li><a href="form-mask">Form Mask </a></li>
                            <li><a href="form-validation">Form Validation </a></li>
                            <li><a href="form-select2">Form Select2 </a></li>
                            <li><a href="form-fileupload">File Upload </a></li>
                        </ul>
                    </li>
                    <li  class="submenu">
                        <a href="javascript:void(0);"> <span>Table  </span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="tables-basic" >Basic Tables </a></li>
                            <li><a href="data-tables">Data Table </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blankpage" ><span> Blank Page<span> </a>
                    </li>
                    <li  class="submenu">
                        <a href="javascript:void(0);"><span> Error Pages  </span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="error-404">404 Error </a></li>
                            <li><a href="error-500">500 Error </a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="tab-pane" id="app" aria-labelledby="app-tab">
                    <li><a href="chat">Chat</a></li>
                    <li><a href="calendar">Calendar</a></li>
                    <li><a href="email">Email</a></li>
                </ul>
                <ul class="tab-pane" id="report" aria-labelledby="report-tab">
                    <li><a href="purchaseorderreport">Purchase order report</a></li>
                        <li><a href="inventoryreport">Inventory Report</a></li>
                        <li><a href="salesreport">Sales Report</a></li>
                        <li><a href="invoicereport">Invoice Report</a></li>
                        <li><a href="purchasereport">Purchase Report</a></li>
                        <li><a href="supplierreport">Supplier Report</a></li>
                        <li><a href="customerreport">Customer Report</a></li>
                </ul>
                <ul class="tab-pane" id="set" aria-labelledby="set-tab">
                    <li><a href="generalsettings">General Settings</a></li>
                    <li><a href="emailsettings">Email Settings</a></li>
                    <li><a href="paymentsettings">Payment Settings</a></li>
                    <li><a href="currencysettings">Currency Settings</a></li>
                    <li><a href="grouppermissions">Group Permissions</a></li>
                    <li><a href="taxrates">Tax Rates</a></li>
                </ul>

             </div>
            @endif
            @if(!Route::is(['index-four']))
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main</h6>
                    <ul>
                        <li class="{{ Request::is('index','index-two') ? 'active' : '' }}" >
                            <a href="{{url('index')}}"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::is('chat','calendar','email') ? 'active subdrop' : '' }}"><i data-feather="smartphone"></i><span>Application</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('chat') ? 'active' : '' }}" href="{{url('chat')}}">Chat</a></li>
                                <li><a class="{{ Request::is('calendar') ? 'active' : '' }}" href="{{url('calendar')}}">Calendar</a></li>
                                <li><a class="{{ Request::is('email') ? 'active' : '' }}" href="{{url('email')}}">Email</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Products</h6>
                    <ul>
                        <li class="{{ Request::is('productlist','editproduct') ? 'active' : '' }}"><a href="{{url('productlist')}}"><i data-feather="box"></i><span>Products</span></a></li>
                        <li class="{{ Request::is('addproduct','product-details') ? 'active' : '' }}"><a href="{{url('addproduct')}}"><i data-feather="plus-square"></i><span>Create Product</span></a></li>
                        <li class="{{ Request::is('categorylist','addcategory','editcategory') ? 'active' : '' }}"><a href="{{url('categorylist')}}"><i data-feather="codepen"></i><span>Category</span></a></li>
                        <li class="{{ Request::is('brandlist','addbrand','editbrand') ? 'active' : '' }}"><a href="{{url('brandlist')}}"><i data-feather="tag"></i><span>Brands</span></a></li>
                        <li class="{{ Request::is('subcategorylist','editsubcategory','subaddcategory') ? 'active' : '' }}"><a href="{{url('subcategorylist')}}"><i data-feather="speaker"></i><span>Sub Category</span></a></li>
                        <li class="{{ Request::is('barcode') ? 'active' : '' }}"><a href="{{url('barcode')}}"><i data-feather="align-justify"></i><span>Print Barcode</span></a></li>
                        <li class="{{ Request::is('importproduct') ? 'active' : '' }}"><a href="{{url('importproduct')}}"><i data-feather="minimize-2"></i><span>Import Products</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Sales</h6>
                    <ul>
                        <li class="{{ Request::is('saleslist','sales-details','add-sales','edit-sales') ? 'active' : '' }}"><a href="{{url('saleslist')}}"><i data-feather="shopping-cart"></i><span>Sales</span></a></li>
                        <li class="{{ Request::is('invoicereport') ? 'active' : '' }}"><a href="{{url('invoicereport')}}"><i data-feather="file-text"></i><span>Invoices</span></a></li>
                        <li class="{{ Request::is('salesreturnlists','editsalesreturns','createsalesreturns') ? 'active' : '' }}"><a href="{{url('salesreturnlists')}}"><i data-feather="copy"></i><span>Sales Return</span></a></li>
                        <li class="{{ Request::is('quotationlist','editquotation','addquotation') ? 'active' : '' }}"><a href="{{url('quotationlist')}}"><i data-feather="save"></i><span>Quotation</span></a></li>
                        <li class="{{ Request::is('pos') ? 'active' : '' }}"><a href="{{url('pos')}}"><i data-feather="hard-drive"></i><span>POS</a></li>
                        <li class="submenu">
                            <a class="{{ Request::is('transferlist','addtransfer','importtransfer','edittransfer') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="shuffle"></i><span>Transfer</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('transferlist','edittransfer','addtransfer') ? 'active' : '' }}" href="{{url('transferlist')}}">Transfer List</a></li>
                                <li><a class="{{ Request::is('importtransfer') ? 'active' : '' }}" href="{{url('importtransfer')}}">Import Transfer </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a class="{{ Request::is('salesreturnlist','createsalesreturn','editsalesreturn','purchasereturnlist','editpurchasereturn','createpurchasereturn') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="corner-up-left"></i><span>Return</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('salesreturnlist','editsalesreturn') ? 'active' : '' }}" href="{{url('salesreturnlist')}}">Sales Return</a></li>
                                <li><a class="{{ Request::is('purchasereturnlist','createpurchasereturn','editpurchasereturn') ? 'active' : '' }}" href="{{url('purchasereturnlist')}}">Purchase Return</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Purchases</h6>
                    <ul>
                        <li class="{{ Request::is('purchaselist','editpurchase','addpurchase') ? 'active' : '' }}"><a href="{{url('purchaselist')}}"><i data-feather="shopping-bag"></i><span>Purchases</span></a></li>
                        <li class="{{ Request::is('importpurchase') ? 'active' : '' }}"><a href="{{url('importpurchase')}}"><i data-feather="minimize-2"></i><span>Import Purchases</span></a></li>
                        <li class="{{ Request::is('purchaseorderreport') ? 'active' : '' }}"><a href="{{url('purchaseorderreport')}}"><i data-feather="file-minus"></i><span>Purchase Order</span></a></li>
                        <li class="{{ Request::is('purchasereturnlist') ? 'active' : '' }}"><a href="{{url('purchasereturnlist')}}"><i data-feather="refresh-cw"></i><span>Purchase Return</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Finance & Accounts</h6>
                    <ul>
                        <li class="submenu">
                            <a class="{{ Request::is('expenselist','createexpense','editexpense','expensecategory') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="file-text"></i><span>Expense</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('expenselist','createexpense','editexpense') ? 'active' : '' }}" href="{{url('expenselist')}}">Expenses</a></li>
                                <li><a class="{{ Request::is('expensecategory') ? 'active' : '' }}" href="{{url('expensecategory')}}">Expense Category</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Peoples</h6>
                    <ul>
                        <li class="{{ Request::is('customerlist','addcustomer','editcustomer') ? 'active' : '' }}"><a href="{{url('customerlist')}}"><i data-feather="user"></i><span>Customers</span></a></li>
                        <li class="{{ Request::is('supplierlist') ? 'active' : '' }}"><a href="{{url('supplierlist')}}"><i data-feather="users"></i><span>Suppliers</span></a></li>
                        <li class="{{ Request::is('userlist') ? 'active' : '' }}"><a href="{{url('userlist')}}"><i data-feather="user-check"></i><span>Users</span></a></li>
                        <li class="{{ Request::is('storelist','addstore','editstore') ? 'active' : '' }}"><a href="{{url('storelist')}}"><i data-feather="home"></i><span>Stores</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Reports</h6>
                    <ul>
                        <li class="{{ Request::is('salesreport') ? 'active' : '' }}"><a href="{{url('salesreport')}}"><i data-feather="bar-chart-2"></i><span>Sales Report</span></a></li>
                        <li class="{{ Request::is('purchaseorderreport') ? 'active' : '' }}"><a href="{{url('purchaseorderreport')}}"><i data-feather="pie-chart"></i><span>Purchase report</span></a></li>
                        <li class="{{ Request::is('inventoryreport') ? 'active' : '' }}"><a href="{{url('inventoryreport')}}"><i data-feather="credit-card"></i><span>Inventory Report</span></a></li>
                        <li class="{{ Request::is('invoicereport') ? 'active' : '' }}"><a href="{{url('invoicereport')}}"><i data-feather="file"></i><span>Invoice Report</span></a></li>
                        <li class="{{ Request::is('purchasereport') ? 'active' : '' }}"><a href="{{url('purchasereport')}}"><i data-feather="bar-chart"></i><span>Purchase Report</span></a></li>
                        <li class="{{ Request::is('supplierreport','addsupplier') ? 'active' : '' }}"><a href="{{url('supplierreport')}}"><i data-feather="database"></i><span>Supplier Report</span></a></li>
                        <li class="{{ Request::is('customerreport') ? 'active' : '' }}"><a href="{{url('customerreport')}}"><i data-feather="pie-chart"></i><span>Customer Report</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">User Management</h6>
                    <ul>
                        <li class="submenu">
                            <a class="{{ Request::is('newuser','userlists','newuseredit') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="users"></i><span>Manage Users</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('newuser','newuseredit') ? 'active' : '' }}" href="{{url('newuser')}}">New User </a></li>
                                <li><a class="{{ Request::is('userlists') ? 'active' : '' }}" href="{{url('userlists')}}">Users List</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Pages</h6>
                    <ul>
                        <li class="submenu">
                            <a class="{{ Request::is('signin','signup','forgetpassword','resetpassword') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="shield"></i><span>Authentication</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="signin">Log in</a></li>
                                <li><a href="signup">Register</a></li>
                                <li><a href="forgetpassword">Forgot Password</a></li>
                                <li><a href="resetpassword">Reset Password</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a class="{{ Request::is('error-404','error-500') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="file-minus"></i><span>Error Pages</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('error-404') ? 'active' : '' }}" href="{{url('error-404')}}">404 Error </a></li>
                                <li><a class="{{ Request::is('error-500') ? 'active' : '' }}" href="{{url('error-500')}}">500 Error </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a class="{{ Request::is('newcountry','countrieslist','editstate','editcountry','newstate','statelist') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="map"></i><span>Places</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('countrieslist','editcountry','newcountry') ? 'active' : '' }}" href="{{url('countrieslist')}}">Countries</a></li>
                                <li><a class="{{ Request::is('statelist','editstate','newstate') ? 'active' : '' }}" href="{{url('statelist')}}">States</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('blankpage') ? 'active' : '' }}">
                            <a href="{{url('blankpage')}}" ><i data-feather="file"></i><span>Blank Page</span> </a>
                        </li>
                        <li class="{{ Request::is('components') ? 'active' : '' }}">
                            <a href="{{url('components')}}"><i data-feather="pen-tool"></i><span>Components</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">UI Interface</h6>
                    <ul>
                        <li class="submenu">
                            <a class="{{ Request::is('sweetalerts','tooltip','popover','ribbon','clipboard','drag-drop','rangeslider','toastr','text-editor',
                            'counter','scrollbar','spinner','notification','lightbox','stickynote','timeline','form-wizard') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="layers"></i><span>Elements</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('sweetalerts') ? 'active' : '' }}" href="{{url('sweetalerts')}}">Sweet Alerts</a></li>
                                <li><a class="{{ Request::is('tooltip') ? 'active' : '' }}" href="{{url('tooltip')}}">Tooltip</a></li>
                                <li><a class="{{ Request::is('popover') ? 'active' : '' }}" href="{{url('popover')}}">Popover</a></li>
                                <li><a class="{{ Request::is('ribbon') ? 'active' : '' }}" href="{{url('ribbon')}}">Ribbon</a></li>
                                <li><a class="{{ Request::is('clipboard') ? 'active' : '' }}" href="{{url('clipboard')}}">Clipboard</a></li>
                                <li><a class="{{ Request::is('drag-drop') ? 'active' : '' }}" href="{{url('drag-drop')}}">Drag & Drop</a></li>
                                <li><a class="{{ Request::is('rangeslider') ? 'active' : '' }}" href="{{url('rangeslider')}}">Range Slider</a></li>
                                <li><a class="{{ Request::is('rating') ? 'active' : '' }}" href="{{url('rating')}}">Rating</a></li>
                                <li><a class="{{ Request::is('toastr') ? 'active' : '' }}" href="{{url('toastr')}}">Toastr</a></li>
                                <li><a class="{{ Request::is('text-editor') ? 'active' : '' }}" href="{{url('text-editor')}}">Text Editor</a></li>
                                <li><a class="{{ Request::is('counter') ? 'active' : '' }}" href="{{url('counter')}}">Counter</a></li>
                                <li><a class="{{ Request::is('scrollbar') ? 'active' : '' }}" href="{{url('scrollbar')}}">Scrollbar</a></li>
                                <li><a class="{{ Request::is('spinner') ? 'active' : '' }}" href="{{url('spinner')}}">Spinner</a></li>
                                <li><a class="{{ Request::is('notification') ? 'active' : '' }}" href="{{url('notification')}}">Notification</a></li>
                                <li><a class="{{ Request::is('lightbox') ? 'active' : '' }}" href="{{url('lightbox')}}">Lightbox</a></li>
                                <li><a class="{{ Request::is('stickynote') ? 'active' : '' }}" href="{{url('stickynote')}}">Sticky Note</a></li>
                                <li><a class="{{ Request::is('timeline') ? 'active' : '' }}" href="{{url('timeline')}}">Timeline</a></li>
                                <li><a class="{{ Request::is('form-wizard') ? 'active' : '' }}" href="{{url('form-wizard')}}">Form Wizard</a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a class="{{ Request::is('chart-apex','chart-js','chart-morris','chart-flot','chart-peity') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="bar-chart-2"></i><span>Charts</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('chart-apex') ? 'active' : '' }}" href="{{url('chart-apex')}}">Apex Charts</a></li>
                                <li><a class="{{ Request::is('chart-js') ? 'active' : '' }}" href="{{url('chart-js')}}">Chart Js</a></li>
                                <li><a class="{{ Request::is('chart-morris') ? 'active' : '' }}" href="{{url('chart-morris')}}">Morris Charts</a></li>
                                <li><a class="{{ Request::is('chart-flot') ? 'active' : '' }}" href="{{url('chart-flot')}}">Flot Charts</a></li>
                                <li><a class="{{ Request::is('chart-peity') ? 'active' : '' }}" href="{{url('chart-peity')}}">Peity Charts</a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a class="{{ Request::is('icon-fontawesome','icon-feather','icon-ionic','icon-material','icon-pe7','icon-simpleline',
                            'icon-themify','icon-weather','icon-typicon','icon-flag') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="database"></i><span>Icons</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('icon-fontawesome') ? 'active' : '' }}" href="{{url('icon-fontawesome')}}">Fontawesome Icons</a></li>
                                <li><a class="{{ Request::is('icon-feather') ? 'active' : '' }}" href="{{url('icon-feather')}}">Feather Icons</a></li>
                                <li><a class="{{ Request::is('icon-ionic') ? 'active' : '' }}" href="{{url('icon-ionic')}}">Ionic Icons</a></li>
                                <li><a class="{{ Request::is('icon-material') ? 'active' : '' }}" href="{{url('icon-material')}}">Material Icons</a></li>
                                <li><a class="{{ Request::is('icon-pe7') ? 'active' : '' }}" href="{{url('icon-pe7')}}">Pe7 Icons</a></li>
                                <li><a class="{{ Request::is('icon-simpleline') ? 'active' : '' }}" href="{{url('icon-simpleline')}}">Simpleline Icons</a></li>
                                <li><a class="{{ Request::is('icon-themify') ? 'active' : '' }}" href="{{url('icon-themify')}}">Themify Icons</a></li>
                                <li><a class="{{ Request::is('icon-weather') ? 'active' : '' }}" href="{{url('icon-weather')}}">Weather Icons</a></li>
                                <li><a class="{{ Request::is('icon-typicon') ? 'active' : '' }}" href="{{url('icon-typicon')}}">Typicon Icons</a></li>
                                <li><a class="{{ Request::is('icon-flag') ? 'active' : '' }}" href="{{url('icon-flag')}}">Flag Icons</a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a class="{{ Request::is('form-basic-inputs','form-input-groups','form-horizontal','form-vertical','form-mask','form-validation',
                            'form-select2','form-fileupload') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="edit"></i><span>Forms</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('form-basic-inputs') ? 'active' : '' }}" href="{{url('form-basic-inputs')}}">Basic Inputs </a></li>
                                <li><a class="{{ Request::is('form-input-groups') ? 'active' : '' }}" href="{{url('form-input-groups')}}">Input Groups </a></li>
                                <li><a class="{{ Request::is('form-horizontal') ? 'active' : '' }}" href="{{url('form-horizontal')}}">Horizontal Form </a></li>
                                <li><a class="{{ Request::is('form-vertical') ? 'active' : '' }}" href="{{url('form-vertical')}}"> Vertical Form </a></li>
                                <li><a class="{{ Request::is('form-mask') ? 'active' : '' }}" href="{{url('form-mask')}}">Form Mask </a></li>
                                <li><a class="{{ Request::is('form-validation') ? 'active' : '' }}" href="{{url('form-validation')}}">Form Validation </a></li>
                                <li><a class="{{ Request::is('form-select2') ? 'active' : '' }}" href="{{url('form-select2')}}">Form Select2 </a></li>
                                <li><a class="{{ Request::is('form-fileupload') ? 'active' : '' }}" href="{{url('form-fileupload')}}">File Upload </a></li>
                            </ul>
                        </li>
                        <li  class="submenu">
                            <a class="{{ Request::is('tables-basic','data-tables') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="columns"></i><span>Tables</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('tables-basic') ? 'active' : '' }}" href="{{url('tables-basic')}}" >Basic Tables </a></li>
                                <li><a class="{{ Request::is('data-tables') ? 'active' : '' }}" href="{{url('data-tables')}}">Data Table </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Settings</h6>
                    <ul>
                        <li class="submenu">
                            <a class="{{ Request::is('generalsettings','emailsettings','paymentsettings','createpermission','editpermission','currencysettings','grouppermissions','taxrates') ? 'active subdrop' : '' }}" href="javascript:void(0);"><i data-feather="settings"></i><span>Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('generalsettings') ? 'active' : '' }}" href="{{url('generalsettings')}}">General Settings</a></li>
                                <li><a class="{{ Request::is('emailsettings') ? 'active' : '' }}" href="{{url('emailsettings')}}">Email Settings</a></li>
                                <li><a class="{{ Request::is('paymentsettings') ? 'active' : '' }}" href="{{url('paymentsettings')}}">Payment Settings</a></li>
                                <li><a class="{{ Request::is('currencysettings') ? 'active' : '' }}" href="{{url('currencysettings')}}">Currency Settings</a></li>
                                <li><a class="{{ Request::is('grouppermissions','editpermission','createpermission') ? 'active' : '' }}" href="{{url('grouppermissions')}}">Group Permissions</a></li>
                                <li><a class="{{ Request::is('taxrates') ? 'active' : '' }}" href="{{url('taxrates')}}">Tax Rates</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('signin')}}" ><i data-feather="log-out"></i><span>Logout</span> </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif

        </div>
    </div>
</div>
<!-- /Sidebar -->
