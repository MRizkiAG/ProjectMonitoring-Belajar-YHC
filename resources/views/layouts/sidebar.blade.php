<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <x-sidebar_nav_item active="{{ Route::current()->getName() == 'home' ? '' : 'collapsed' }}"
            link="{{ route('home') }}" title="Dashboard" icon="house-fill" />
        <!-- End Home Nav -->

        <x-sidebar_nav_item active="{{ Route::current()->getName() == 'project.index' ? '' : 'collapsed' }}"
            link="{{ route('project.index') }}" title="Project" icon="journal-code" />
        <!-- End Dashboard Nav -->

    </ul>

</aside>
