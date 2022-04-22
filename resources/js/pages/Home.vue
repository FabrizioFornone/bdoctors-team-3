<template>
    <div>
        <div class="input-group my-3">
                <input type="text" 
                class="form-control" 
                aria-label="Sizing example input" 
                aria-describedby="inputGroup-sizing-default" 
                placeholder="Inserisci parola chiave." 
                v-model="searchText" 
                @keydown.enter="findSearchSubmit()" />
            </div>
        <div class="my-3">
            <button class="btn btn-primary text-white" @click="findSearchSubmit()">Search</button>
            <a href="/search" class="btn btn-primary text-white">Advanced Search</a>
        </div>

       

        <div class="ciao">
            <info-card 
            v-for="specialization of specializations" 
            :key="specialization.id" 
            :specialization="specialization">
            </info-card>
        </div>






        <!-- <div v-for="specialization of specializations" :key="specialization.id">
            {{ specialization.name }}
        </div> -->

        <!-- <div v-for="info of infos" :key="info.id">
            {{ info.user.name }}
            {{ info.user.surname }}
            {{ info.phone }}
        </div> -->

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
        // console.log(this.specializations)
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

<style lang="sass" scoped>

</style>