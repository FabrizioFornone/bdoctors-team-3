<template>
    <div>

        <div class="my-4">
            <input type="text" class="form-input" placeholder="Inserisci parola chiave." v-model="searchText" @keydown.enter="findSearchSubmit"/>
            <button>Search</button>
        </div>

        <a href="/search" class="btn btn-primary text-white">Advanced Search</a>

    </div>
</template>

<script>

import axios from "axios";

export default {
    data() {
        return {
            users: [],
            searchText: '',
        }
    },

    mounted() {
        this.getInfos();
    },

    methods: {
        getInfos() {
            axios.get("/api/user").then(resp => {
                this.user = resp.data;
                console.log(this.user)
            });
        }
    }
}
</script>

<style lang="sass" scoped>

</style>