<template>
    <div class="container mt-5">
        <div class="col-12 text-center">
            <h1>Renginiai</h1>
            <router-link :to='{name:"EventList"}' class="navbar-brand">Renginiai</router-link>
            <h1>Organizatoriai</h1>
            <router-link :to='{name:"OrganizerList"}' class="navbar-brand">Organizatoriai</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "welcome"
}
</script>

<style scoped>

</style>
