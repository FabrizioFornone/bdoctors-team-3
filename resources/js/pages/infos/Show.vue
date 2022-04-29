<template>
    <main>
        <div class="container ms_infos">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <!-- Back Arrow -->
                    <a href="javascript:history.back()">
                        <i class="fa-solid fa-arrow-left ms_back-arrow mt-3"></i>
                    </a>
                    <!-- Profile Card -->
                    <div class="card my-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <h4 class="mb-0">
                                    <strong>Doctor's Profile</strong>
                                </h4>
                            </div>
                            <div class="d-flex">
                            <!-- Message Button -->
                                    <div>
                                        <router-link
                                        class="btn btn-primary rounded text-white my-2 me-3"
                                        :to="{
                                            name: 'message.index',
                                            params: { result: info.id },
                                        }"
                                        >Message</router-link
                                    >
                                    </div>
                                    
                                    <!-- Review Buttton -->
                                    <div>
                                        <router-link
                                        class="btn btn-primary rounded text-white my-2"
                                            :to="{
                                                name: 'review.index',
                                                params: { result: info.id },
                                            }"
                                            >Review</router-link
                                        >
                                    </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col-6">
                                    <div class="photo-box">
                                        <img
                                            :src="info.photo"
                                            class="card-img"
                                            alt="..."
                                        />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h3 class="py-2">
                                        <strong>Name:</strong>
                                        {{ info.user.name }}
                                        {{ info.user.surname }}
                                    </h3>

                                    <h5 class="py-2">
                                        <strong>Address:</strong>
                                        {{ info.address }}
                                    </h5>
                                    <h5 class="py-2">
                                        <strong>Phone Number:</strong>
                                        {{ info.phone }}
                                    </h5>
                                    <h5 class="py-2">
                                        <strong>Performances:</strong>
                                        {{ info.performances }}
                                    </h5>

                                    <h5>
                                        <strong>Specializations:</strong>
                                        <div
                                            v-for="specialization of info.specializations"
                                            :key="specialization.id"
                                        >
                                            {{
                                                specialization.specialization_name
                                            }}
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            info: {},
        };
    },

    methods: {
        async getInfo() {
            try {
                const response = await axios.get(
                    "/api/specializations/" + this.$route.params.result
                );
                this.info = response.data;
            } catch (er) {
                this.$router.replace({
                    name: "error",
                });
            }
        },
    },

    mounted() {
        this.getInfo();
    },
};
</script>

<style lang="scss" scoped>
main {
    min-height: calc(100vh - 279px);

    .spec-sty {
        background-color: aqua;
        border-radius: 15px;
        padding: 3px 6px;
    }
}
</style>
