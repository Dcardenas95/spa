<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active bg-light rounded ml-4">
                        <a class="nav-link" href="#">
                            <router-link :to="{ name: 'clientes' }">
                                <h4>Clientes</h4>
                            </router-link>
                        </a>
                    </li>
                    <li class="nav-item active bg-light rounded ml-4">
                        <a class="nav-link bg-light rounded" href="#"><h4>Abogados</h4></a>
                    </li>
                    <li class="nav-item active bg-light rounded ml-4">
                        <a class="nav-link" href="#"><h4>Casos</h4></a>
                    </li>
                    <li class="nav-item active bg-light rounded ml-4">
                        <a class="nav-link" href="#"><h4>Casos Asigandos</h4></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input
                        class="form-control mr-sm-2"
                        type="search"
                        placeholder="Buscar"
                        aria-label="Search"
                    />
                    <button
                        class="btn btn-dark btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
                        Buscar
                    </button>
                </form>
            </div>
        </nav>
        <div>
            <router-view></router-view>
        </div>

    </div>
</template>

<script>

export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
