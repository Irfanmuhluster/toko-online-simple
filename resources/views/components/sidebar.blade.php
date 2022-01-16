<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link" style="color: white;">
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active" style="color: white;">
                    {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                    <p>
                        Product
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link" style="color: white;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.product.create') }}" class="nav-link" style="color: white;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Product</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active" style="color: white;">
                    {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                    <p>
                        Order
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color: white;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Order</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color: white;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Order</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active" style="color: white;">
                    {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                    <p>
                        Purchase
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.purchase.create') }}" class="nav-link" style="color: white;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Purchase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.purchase.index') }}" class="nav-link" style="color: white;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Purchase</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</div>
