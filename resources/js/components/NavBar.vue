<template>
    <nav class="navbar navbar-expand-lg navbar-dark py-1">
        <div class="container">
            <a class="navbar-brand" href="/">BDoctors</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 text-white">
                    <li class="nav-item" v-if="!user">
                        <a class="nav-link fw-bold" href="/login">Doctor Login</a>
                    </li>
                    <li class="nav-item" v-if="!user">
                        <a class="nav-link fw-bold" href="/register">Register as a Doctor</a>
                    </li>
                    <li class="nav-item" v-else>
                        <a class="nav-link fw-bold" href="/home"> {{ user.name }} {{ user.surname}} </a>
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
.navbar {
    background: #59A7B8;
}
</style>