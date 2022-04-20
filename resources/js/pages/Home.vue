<template>
    <div>

        <div class="container py-3">
            <h5>Home</h5>
        </div>

    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "app",

    data() {
        return {
            users: [],
        }
    },

    methods: {
        getInfos() {
            axios.get("/api/infos").then(resp => {
                console.log('infos')
                this.users = resp.data;
                console.log('infos')

            });
        }
    },

    mounted() {
        this.getInfos();
    }
}
</script>

<style lang="sass" scoped>

</style>