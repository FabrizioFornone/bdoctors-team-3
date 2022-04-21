<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1">
        <div class="container">
            <a class="navbar-brand" href="/">BDoctors</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">

                    <li class="nav-item d-flex">
                        <a class="nav-link" href="/login" v-if="!user">Sei già registrato?</a>
                        <a class="nav-link" href="/register" v-if="!user"> Sei un dottore?</a>
                        <a class="nav-link" href="/admin" v-else> {{ user.name }} </a>
                    </li>

                </ul>
            </div>
            <!-- {{user.name}} -->
        </div>
    </nav>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
</style>