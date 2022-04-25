<template>
    <main>
        <div v-if="!boolean" class="jumbotron">
            <div class="container">
                <div class="search-group col-7">
                    <h1 class="py-5">Look for your healthcare professional</h1>
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

                        <div class="btn-group px-2">
                            <button
                                class="btn btn-primary rounded text-white me-2"
                                @click="findSearchSubmit()"
                            >
                                Search
                            </button>
                        </div>
                    </div>

                    <div class="error-div text-danger" v-if="error">
                        <p>
                            The input field needs at least one specialization
                            selected.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-5" v-if="boolean">
            <button
                class="btn btn-primary rounded text-white my-2"
                @click="changeBoolean()"
            >
                Back to filter
            </button>

            <info-card
                v-for="result of results"
                :key="result.id"
                :result="result"
            />

            <h2 v-if="(results.length = [])">There aren't results.</h2>
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
            infos: [],
            users: [],
            results: [],
            searchText: "",
            boolean: false,
            error: false,
        };
    },

    mounted() {
        this.getInfos();
    },

    methods: {
        getInfos() {
            axios.get("/api/infos").then((resp) => {
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
                this.results = resp.data;
            } catch (er) {
                console.log(er);
            }
        },

        findSearchSubmit() {
            if (this.searchText != "") {
                this.getSpecialization(this.searchText);
                this.boolean = true;
                this.error = false;
                window.scrollTo(0, 0);
            } else {
                this.error = true;
                console.log(this.error);
            }
        },
        changeBoolean() {
            this.boolean = !this.boolean;
            this.searchText = "";
        },
    },
};
</script>

<style lang="scss" scoped>
// .ms_main {
//     min-height: 800px;

//     .ms_button {
//         margin-bottom: 30px;
//     }
// }
.jumbotron {
    height: calc(100vh - 64px);
    background: url("/imgs/jumbotron.png") center center;
    background-size: cover;
    position: relative;

    .search-group {
        position: absolute;
        top: 50%;
        left: 35%;
        transform: translate(-50%, -50%);

        h1 {
            color: #fff;
        }

        .btn-group {
            .btn-search {
                min-width: 150px;
            }
        }

        .error-div {
            position: absolute;
            top: 90px;
            left: 0;
        }
    }
}
</style>
