<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1">
        <div class="container">
            <a class="navbar-brand" href="/">BDoctors</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 text-white">

                    <li class="nav-item d-flex">
                        <a class="nav-link" href="/login" v-if="!user">Sei già registrato?</a>
                        <a class="nav-link" href="/register" v-if="!user"> Sei un dottore?</a>
                        <a class="nav-link" href="/home" v-else> {{ user.name }} </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</template>

<script>

import axios from "axios";

export default {
    data() {
        return { 
            user: null,
        }
    },

    mounted() {
        this.getUser();
    },

    methods: {
        getUser() {
            axios.get("/api/user").then(resp => {
                this.user = resp.data;
                // console.log(this.user)
            });
        },
    },
}

</script>

<style lang="scss" scoped>
</style>