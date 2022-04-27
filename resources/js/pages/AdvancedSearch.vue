<template>

    <div>
        <h1>saluti dalla pagina di ricerca avanzata.</h1>
        <br />
        <input type="text"/>  <!-- ricerca per specializzazione es. allergy, surgery, etc... -->

        <select name="" id=""></select> <!-- filtro per media voti delle recensioni del dottore. --> 
        
        <select name="" id=""></select>  <!-- filtro per numero di recensioni del dottore. -->

         <div class="input-group">
            <input type="text" 
                class="form-control" 
                aria-label="Sizing example input" 
                aria-describedby="inputGroup-sizing-default" 
                placeholder="filter by city" 
                v-model="searchCity"
            />
        </div>
        
    </div>

</template>

<script>
export default {
    
}
</script>

<style lang="scss" scoped>

</style>