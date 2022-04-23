<template>
    <div class="col">
        <div class="card">
            <img :src="specialization.photo" class="card-img-top" alt="..." />
            <div class="card-body">
                <h5 class="card-title">Dettagli Dottore</h5>
                <span> {{ specialization.name }} {{ specialization.surname }}</span>
                <br/>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
            </div>
            <div class="card-footer">
                <!-- <router-link :to="{ name:'post.show', params: { post: post.slug } }">Dettagli</router-link> -->
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        specialization: Object
    },

    methods: {
        // getInfoCardImg(specialization) {
        //     return (
        //         specialization.photo ??
        //         "https://www.logistec.com/wp-content/uploads/2017/12/placeholder.png"
        //     );
        // }
    }
}

</script>

<style lang="scss" scoped>
.post-card {
    min-height: 100%;
    .card-img-top {
        max-height: 250px;
        object-fit: cover;
    }
}
</style>