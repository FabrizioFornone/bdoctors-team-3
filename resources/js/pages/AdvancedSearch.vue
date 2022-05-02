<template>
    <main>
        <div class="container py-5">
            <div class="search-group col-6">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default"
                        placeholder="Search by specialization"
                        v-model="searchText"
                        @keydown.enter="findSearchSubmit()"
                    />
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search by specialization"
                        v-model="searchText"
                        @keydown.enter="findSearchSubmit()"
                    />
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search by city"
                        v-model="searchCity"
                        @keydown.enter="findSearchSubmit()"
                    />
                    
                    <button
                        class="btn btn-primary rounded text-white ms-2"
                        @click="findSearchSubmit()"
                    >
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>

            <div v-if="boolean" class="my-5">
                <h2 v-if="!advancedResults.advancedRes" class="text-center text-white fw-bold">There aren't results.</h2>
                <info-card
                    v-for="advancedResult of advancedResults.advancedRes"
                    :key="advancedResult.id"
                    :result="advancedResult"
                />
            </div>
        </div>
        <!-- <input type="text" /> -->
        <!-- ricerca per specializzazione es. allergy, surgery, etc... -->

        <!-- <select name="" id=""></select> -->
        <!-- filtro per media voti delle recensioni del dottore. -->

        <!-- <select name="" id=""></select> -->
        <!-- filtro per numero di recensioni del dottore. -->
    </main>
</template>

<script>
import axios from "axios";
import InfoCard from "../components/InfoCard.vue";

export default {
    components: { InfoCard },

    data() {
        return {
            advancedResults: null,
            searchText: "",
            searchCity: "",
            boolean: false
        };
    },
    methods: {
        async getAdvancedResults(searchCity = null, searchText = null) {
            try {
                await axios.get('/api/specializations' + '?advancedFilter=' + searchCity + '&' + 'filter=' + searchText).then((resp) => {
    
                    this.advancedResults = resp.data;
                    this.boolean = true;
    
                    if (this.advancedResults.advancedRes.length == 0) {
                        this.advancedResults.advancedRes = null;
                    }
                });
            } catch (er) {
                console.log(er);
            }
        },
        findSearchSubmit() {
            if (this.searchCity != "" && this.searchText != "") {
                this.getAdvancedResults(this.searchCity, this.searchText);
                // this.boolean = true;
                // this.error = false;
                window.scrollTo(0, 0);
            } else {
                // this.error = true;
            }
        },


        // callAPI(searchCity, searchText, criteriaThree) {
        // axios.get('/api/specializations' + '?advancedFilter=' + searchCity + '&' + 'filter=' + searchText ).then((res) => {
        //         this.sumResults = this.shuffleResult(this.sumResults);
        //         });
        //     },
        //     // Method linked to Home button
        //     homeMix() {
        //         this.sumResults = [];
        //         this.callAPI("movie", "popular");
        //         this.callAPI("tv", "popular");
        //     },
    },

    // var outputUrl = redirectUrl + '?url=' + url + '&title=' + title;
};

</script>

<style lang="scss" scoped>
main {
    background-color: #59A7B8;
    height: calc(100vh - 47px);  
}
</style>
