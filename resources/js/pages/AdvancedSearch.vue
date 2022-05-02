<template>
    <main>
        <div class="container py-5">
            <div class="search-group col-6">
                <div class="input-group">
                    <select
                        v-model="selected"
                        class="form-select"
                        aria-label="Example select with button addon"
                    >
                        <option disabled value="">
                            Choose one specialization...
                        </option>
                        <option
                            v-for="specialization of allSpecializations"
                            :key="specialization.id"
                            :value="specialization.specialization_name"
                        >
                            {{ specialization.specialization_name }}
                        </option>
                    </select>
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
                <h2
                    v-if="!advancedResults.advancedRes"
                    class="text-center text-white fw-bold"
                >
                    There aren't results.
                </h2>
                <info-card
                    v-for="advancedResult of advancedResults.advancedRes"
                    :key="advancedResult.id"
                    :result="advancedResult"
                />
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios";
import InfoCard from "../components/InfoCard.vue";

export default {
    components: { InfoCard },

    data() {
        return {
            allSpecializations: [],
            selected: "",
            advancedResults: null,
            searchCity: "",
            boolean: false,
        };
    },
    methods: {
        async getAdvancedResults(searchCity = null, selected = null) {
            try {
                await axios
                    .get(
                        "/api/specializations" +
                            "?advancedFilter=" +
                            searchCity +
                            "&" +
                            "filter=" +
                            selected
                    )
                    .then((resp) => {
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
            if (this.searchCity != "" && this.selected != "") {
                this.getAdvancedResults(this.searchCity, this.selected);
                window.scrollTo(0, 0);
            }
        },
        async getAllSpec() {
            try {
                await axios.get("/api/specializations").then((resp) => {
                    this.allSpecializations = resp.data.allSpec;
                });
            } catch (er) {
                console.log(er);
            }
        },
    },
    mounted() {
        this.getAllSpec();
    },
};
</script>

<style lang="scss" scoped>
main {
    background-color: #59a7b8;
    height: calc(100vh - 47px);
}
</style>
