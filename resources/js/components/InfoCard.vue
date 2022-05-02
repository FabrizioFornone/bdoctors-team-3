<template>
    <div>
        <div class="card my-3 py-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Doctor information on left side of card -->
                    <div class="d-flex">
                        <div class="card-img">
                            <img :src="result.photo" alt="..." />
                        </div>
                        <div class="info-box ps-4">
                            <div class="py-2">
                                <i
                                    class="fa-solid fa-user-doctor icon-size"
                                ></i>
                                <span>{{ result.name }}</span>
                                <span>{{ result.surname }}</span>
                            </div>
                            <div class="py-2">
                                <i
                                    class="fa-solid fa-briefcase-medical icon-size"
                                ></i>
                                {{ result.specialization_name }}
                            </div>
                            <div class="py-2">
                                <i class="fa-solid fa-city icon-size"></i>
                                <span>{{ result.city }}</span>
                            </div>
                            <div class="py-2">
                                <i
                                    class="fa-solid fa-house-chimney-medical icon-size"
                                ></i>
                                <span>{{ result.business_address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Details button on right side of card -->
                <div class="d-flex justify-content-center">
                    <router-link
                        class="btn btn-primary rounded text-white fw-bold my-2 me-3"
                        :to="{
                            name: 'results.show',
                            params: { result: result.id },
                        }"
                    >
                        Details
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        result: Object,
    },

    methods: {},
};
</script>

<style lang="scss" scoped>
.card {
    &:hover {
        background-color: #f5f5f5;
    }

    .info-box {
        font-size: 20px;
    }

    .card-img {
        height: 175px;
        width: 150px;
        border: 0.5px solid #ccc;
        border-radius: 5px;

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }
    }
}

@media screen and (max-width: 575px) {
    .card-body {
        padding: 5px !important;

        .card-img {
            height: 140px !important;
            width: 120px !important;
        }

        .info-box {
            padding-left: 10px !important ;
            font-size: 14px !important;

            .icon-size {
                width: 20px;
            }
        }
    }
}
</style>
