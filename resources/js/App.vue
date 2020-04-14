<template>
    <div class="page">
        <!-- Main Navbar-->
        <header class="header">
            <nav class="navbar">
                <!-- Search Box-->
                <div class="search-box">
                    <button class="dismiss"><i class="icon-close"></i></button>
                    <form id="searchForm" action="#" role="search">
                        <input type="search" placeholder="What are you looking for..." class="form-control">
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <!-- Navbar Header-->
                        <div class="navbar-header">
                            <!-- Navbar Brand --><a href="/" class="navbar-brand d-none d-sm-inline-block">
                            <div class="brand-text d-none d-lg-inline-block"><span>@</span><strong> Портфолио </strong></div>
                            <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>@</strong></div></a>
                            <!-- Toggle Button--><a id="toggle-btn" href="/" class="menu-btn active "><span></span><span></span><span></span></a>
                        </div>
                        <!-- Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Search-->
                            <li class="nav-item d-flex align-items-center"></li>
                            <li class="nav-item"><a href="/" class="nav-link logout"><span class="d-none d-sm-inline">Главная</span></a></li>
                            <li class="nav-item"><a href="/userprofile" class="nav-link logout"><span class="d-none d-sm-inline">Мой профиль</span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <nav class="side-navbar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center">
                    <div class="title">
                    </div>
                </div>
                <!-- Sidebar Navidation Menus--><span class="heading">Меню</span>
                <navigation></navigation>
            </nav>
            <div class="content-inner" style="padding-bottom: 59px;">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Админ панель</h2>
                    </div>
                </header>
                <!-- Dashboard Counts Section-->
                <router-view></router-view>
                <footer class="main-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>@ Portfolio © 2020</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>

    import Navigation from "./components/layouts/blocks/nav/Navigation";
    export default {
        name: "App",
        components: {Navigation},
        comments: {Navigation}
    }
</script>

<style scoped>

</style>