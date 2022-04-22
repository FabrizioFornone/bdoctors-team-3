<template>
    <div class="ms_main">

        <div class="my-4">
            <input type="text" 
            class="form-input" 
            placeholder="Inserisci specializzazione." 
            v-model="searchText" 
            @keydown.enter="findSearchSubmit()" />

            <button @click="findSearchSubmit()">Search</button>
        </div>

        <a href="/search" class="btn btn-primary text-white ms_button">Advanced Search</a>

        <div>
            <info-card 
            v-for="specialization of specializations" 
            :key="specialization.id" 
            :specialization="specialization">
            </info-card>
        </div>

    </div>
</template>

<script>

import axios from "axios";
import InfoCard from '../components/InfoCard.vue';

export default {
    components: { InfoCard },

    data() {
        return {
            infos: [],
            users:[],
            specializations: [],
            searchText: '',
        }
    },

    mounted() {
        this.getInfos();
        this.getSpecialization();
        console.log(this.specializations)
    },

    methods: {
        // getSpecialization() {
        //     axios.get("/api/specializations").then(resp => {
        //         this.specialization = resp.data;
        //     });
        // },

        getInfos() {
            axios.get("/api/infos").then(resp => {
                this.infos = resp.data;
            });
        },

        async getSpecialization(searchText = null) {
            try {
                const resp = await axios.get("/api/specializations", {
                    params: {
                        filter: searchText,
                    },
                });
                this.specializations = resp.data;
            } catch (er) {
                console.log(er);
            }
        },

        findSearchSubmit() {
            this.getSpecialization(this.searchText);
            // console.log(this.specializations)
            // console.log(this.searchText);
        },

    },
}
</script>

<style lang="scss" scoped>

    .ms_main {
        min-height: 800px;

        .ms_button {
            margin-bottom: 30px;
        }
    }

</style>