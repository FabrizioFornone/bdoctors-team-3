<template>
    <main>
        <div v-if="!boolean" class="jumbotron">
            <div class="container">
                <div class="col-6 input-box">
                    <h1 class="py-5 text-uppercase text-black">
                        look for your healthcare professionals
                    </h1>
                    <div class="input-group">
                        <!-- <input
                            type="text"
                            class="form-control"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            placeholder="Search by specialization"
                            v-model="searchText"
                            @keydown.enter="findSearchSubmit()"
                        /> -->
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
                        <div class="btn-group">
                            <button
                                class="btn btn-primary rounded text-white"
                                @click="findSearchSubmit()"
                            >
                                <i
                                    class="fa-solid fa-magnifying-glass px-2"
                                ></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-danger" v-if="error">
                        <p class="fw-bold">
                            You need at least one specialization selected.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5" v-if="boolean">
            <div class="col-sm-12 col-lg-8 offset-lg-2 py-5">
                <div class="d-flex justify-content-between mb-3">
                    <!-- Back Arrow -->
                    <div>
                        <a class="align-middle me-3">
                            <i
                                class="fa-solid fa-arrow-left ms_back-arrow"
                                @click="changeBoolean()"
                            ></i>
                        </a>
                    </div>
                    <div>
                        <a
                            href="/search"
                            class="btn btn-primary text-white rounded my-2 mx-auto fw-bold"
                        >
                            Advanced Search
                        </a>
                    </div>
                </div>
                <info-card
                    v-for="result of results.specializations"
                    :key="result.id"
                    :result="result"
                />
                <h2
                    v-if="!results.specializations"
                    class="text-center text-danger fw-bold"
                >
                    We're sorry, there aren't any registered doctors with that
                    specialization.
                </h2>
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
            users: [],
            results: null,
            searchText: "",
            boolean: false,
            error: false,
        };
    },

    methods: {
        async getSpecialization(selected = null) {
            try {
                const resp = await axios.get("/api/specializations", {
                    params: {
                        filter: selected,
                    },
                });
                this.results = resp.data;

                if (this.results.specializations.length == 0) {
                    this.results.specializations = null;
                }
            } catch (er) {
                console.log(er);
            }
        },

        findSearchSubmit() {
            if (this.selected != "") {
                this.getSpecialization(this.selected);
                this.boolean = true;
                this.error = false;
                window.scrollTo(0, 0);
            } else {
                this.error = true;
            }
        },
        changeBoolean() {
            this.boolean = !this.boolean;
            this.selected = "";
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

    .jumbotron {
        height: 100vh;
        background: url("/imgs/jumbotron.png") 65% 50%;
        background-size: cover;
        position: relative;

        .input-box {
            position: absolute;
            top: 40%;
            left: 40%;
            transform: translate(-50%, -50%);

            button {
                margin-left: 15px;
            }
        }

        h1 {
            color: #fff;
            min-width: 150px;
        }
    }
}

@media screen and (max-width: 991px) {
    main {
        .jumbotron {
            background: url("/imgs/jumbo-mobile.png") center center no-repeat;
            background-size: cover;
            position: relative;

            .input-group {
                flex-direction: column;

                select {
                    width: 100%;
                    min-width: 225px;
                }

                .btn-group {
                    button {
                        margin-left: 0;
                        margin-top: 30px;
                        width: 100%;
                    }
                }
            }
        }
    }
}
</style>
