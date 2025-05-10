@vite('resources/css/app.css')
<div class="header-container">
        <div class="menu-container">
            <button class="menu-toggle" aria-label="Abrir menú">
                <svg class="hamburger-icon" width="30" height="30" viewBox="0 0 30 30">
                    <line x1="5" y1="10" x2="25" y2="10" stroke="#482922" stroke-width="3" />
                    <line x1="5" y1="20" x2="25" y2="20" stroke="#482922" stroke-width="3" />
                </svg>
            </button>
            <ul class="list-container">
                <li><a href="#">Man</a></li>
                <li><a href="#">Woman</a></li>
                <li><a href="#">Collections</a></li>
                <li><a href="#">Stores</a></li>
                <li><a href="">All products</a></li>
            </ul>
        </div>
        <div class="logo-container">
            <svg width="200" height="50" viewBox="10 36.39 170.91 44.11" xmlns="http://www.w3.org/2000/svg">
                <a href="{{ url('/') }}">
                    <text x="10" y="70" class="logo">FKN REBELS</text>
                </a>
            </svg>
        </div>    
        <div class="user-container">
            <button class="user-toggle">
                <svg class="icono-user" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                    fill="none">
                    <path
                        d="M7.88971 14.9995C5.71156 14.9995 3.53385 14.9995 1.3557 14.9995C1.00196 14.9995 0.900898 14.8968 0.904383 14.5431C0.935313 11.6519 2.98757 9.13143 5.83354 8.4888C6.17289 8.41223 6.51573 8.35132 6.86336 
                        8.34696C7.85007 8.33391 8.84548 8.23776 9.81868 8.45617C12.4124 9.03876 14.0521 10.6334 14.7513 13.1912C14.8715 13.6311 14.9147 14.0862 14.9203 14.5431C14.9243 14.8663 14.7936 14.9999 14.4729 14.9999C12.2787 
                        14.9999 10.0844 14.9999 7.89014 14.9999L7.88971 14.9995Z
                        M11.245 4.32851C11.262 6.15371 9.7717 7.64998 7.9194 7.66782C6.10021 7.68522 4.59119 6.19243 4.57725 4.36114C4.56331 2.52506 6.04227 1.01226 7.86233 1.00008C9.7412 0.987893 11.2276 2.45023 11.245 4.32851Z"
                        stroke="#482922" stroke-miterlimit="10" />
                </svg>
            </button>
            <div class="user-dropdown">
                @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button>Logout</button>
                </form>
                @endauth
            </div>
        </div>
</div>
    @vite('resources/js/app.js')