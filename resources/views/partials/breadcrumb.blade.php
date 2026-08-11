<section id="bread-crumb">
    <div class="container-fluid">
        <div class="row">
            <div class="col p-2 ps-5">
                
                <ul>
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    
                    @php
                        $pathSegments = explode('/', request()->path());
                        $currentPath = '';

                        foreach ($pathSegments as $segment) {
                            $currentPath .= '/' . $segment;
                            echo '<li class="breadcrumb-item"><a href="' . $currentPath . '">' . $segment . '</a></li>';
                        }
                    @endphp
                </ul>

            </div>
        </div>
    </div>
</section>