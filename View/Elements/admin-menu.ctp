<ul class="nav navbar-nav">
    <li class="divider-vertical"><a href="/admin/home">Home</a></li>
    <li class="divider-vertical"><a href="/admin/request/view" id="request-link-menu">Requests</a></li>
    <li class="divider-vertical"><a href="/admin/properties/view" id="menu-properties">Properties</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu-customer">Customers<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="/admin/customer/view" id="menu-customer-view">View customers</a></li>
            <li><a href="/admin/customer/add" id="menu-customer-add">Add new customer</a></li>
        </ul>
    </li>
    <li class="divider-vertical"><a href="/admin/viewings/view" id="menu-viewings">Viewings</a></li>
    <li class="divider-vertical"><a href="/offers">Offers</a></li>
    <?php if($this->Session->read('Auth.User')['Group']['id'] == 4): ?>
        <li class="divider-vertical"><a href="/staffs">Staff</a></li>
    <?php endif ?>
</ul>
