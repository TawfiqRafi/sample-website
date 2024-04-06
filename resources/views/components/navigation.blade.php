<nav class="main-navigation">
    <ul class="navigation" data-widget="tree">
        <li>
            <a href="{{ route('dashboard') }}" class="dashboard">
                <i class="bx bxs-dashboard text-blue-400"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class='bx bxs-category text-green-400'></i>
                <span>Services</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ route('service.list') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>All Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('service.create') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Add Service</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class='bx bxs-videos text-green-400'></i>
                <span>Courses</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ route('course.list') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>All Courses</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('course.create') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Add Course</span>
                    </a>
                </li>
            </ul>
        </li>


        <li>
            <a href="{{ route('home.index') }}" class="dashboard">
                <i class='bx bxs-home' ></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('about-us.index') }}" class="dashboard">
                <i class='bx bxs-food-menu'></i>
                <span>About Us</span>
            </a>
        </li>
        <li>
            <a href="{{ route('privacy-policy.index') }}" class="dashboard">
                <i class='bx bx-map-alt'></i>
                <span>Privacy & Policy</span>
            </a>
        </li>
        <li>
            <a href="{{ route('terms-condition.index') }}" class="dashboard">
                <i class='bx bx-detail' ></i>
                <span>Terms & Condition</span>
            </a>
        </li>
        <li>
            <a href="{{ route('subscribers.index') }}" class="dashboard">
                <i class='bx bx-group'></i>
                <span>Subscribers</span>
            </a>
        </li>
        <li>
            <a href="{{ route('messages.index') }}" class="dashboard">
                <i class='bx bxs-message'></i>
                <span>Contact Messages</span>
            </a>
        </li>
        <li>
            <a href="{{ route('settings.index') }}" class="dashboard">
                <i class='bx bx-cog'></i>
                <span>Site Settings</span>
            </a>
        </li>
    </ul>
</nav>
