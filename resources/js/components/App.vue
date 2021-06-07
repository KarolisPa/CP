<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">Creative Partner</router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" to="/events" class="nav-item nav-link">Renginiai</router-link>
                        <router-link exact-active-class="active" to="/organizers" class="nav-item nav-link">Organizatoriai</router-link>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
