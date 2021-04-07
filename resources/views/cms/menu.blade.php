<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('news.index') }}" class="nav-link">
                <i class="nav-icon far fa-newspaper"></i>
                <p>Новости</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>Категории</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('tags.index') }}" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>Теги</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>Пользователи</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
