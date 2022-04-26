<template>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img :src="result.photo" class="card-img" alt="..." />
                    </div>
                    <div>
                        <span> {{ result.name }} </span>
                        <span> {{ result.surname }}</span>
                        <span> {{ result.specialization_name }}</span>
                    </div>
                </div>
                <a href="#" class="card-title">Dettagli Dottore</a>
                <a href="/message" class="btn btn-primary text-white">
                Message
                </a>
                <a href="/review" class="btn btn-primary text-white">
                Review
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        result: Object,
    },

    methods: {
        // getInfoCardImg(specialization) {
        //     return (
        //         specialization.photo ??
        //         "https://www.logistec.com/wp-content/uploads/2017/12/placeholder.png"
        //     );
        // }
    },
};
</script>

<style lang="scss" scoped>
// .post-card {
//     min-height: 100%;
//     .card-img-top {
//         max-height: 250px;
//         object-fit: cover;
//     }
// }

.card-img {
    max-width: 120px;
}
</style>
