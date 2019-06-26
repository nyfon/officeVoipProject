@include('admin.partials.header')
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">
        <!-- Page Sidebar -->
    @include('admin.partials.sidebar')
    <!-- /Page Sidebar -->
        <!-- Page Content -->
        @yield('content')

        <!-- /Page Content -->
    </div>
    <!-- /Page Container -->
    <!-- Main Container -->

</div>
@include('admin.partials.footer')
