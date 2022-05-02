<template>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1 fs-5">
        <div class="container-fluid">
            <a href="/">
                <img src="/imgs/logo-wide-black.svg" alt="" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarSupportedContent"
            >
                <ul class="navbar-nav mb-2 mb-lg-0 text-white">
                    <li class="nav-item" v-if="!user">
                        <a class="nav-link fw-bold" href="/login"
                            >Doctor Login</a
                        >
                    </li>
                    <li class="nav-item" v-if="!user">
                        <a class="nav-link fw-bold" href="/register"
                            >Register as a Doctor</a
                        >
                    </li>
                    <li class="nav-item" v-else>
                        <a class="nav-link fw-bold" href="/home">
                           Dr. {{ user.name }} {{ user.surname }}
                        </a>
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
        };
    },

    mounted() {
        this.getUser();
    },

    methods: {
        getUser() {
            axios.get("/api/user").then((resp) => {
                this.user = resp.data;
            });
        },
    },
};
</script>

<style lang="scss" scoped>
.navbar {
    z-index: 1001;
    background-color: #fff;
    opacity: 0.8;

    .nav-link {
        color: #2d3035;
        border-bottom: 3px solid transparent;

        &:hover {
            color: #454952;
            border-bottom: 3px solid #454952;
        }
    }

    img {
        width: 200px;
    }
}
</style>
