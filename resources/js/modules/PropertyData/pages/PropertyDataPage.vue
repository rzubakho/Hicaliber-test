<template>
    <div>
        <property-data-filters/>
        <Property-data-list
            :items="items"
            :meta="meta"
        />
    </div>
</template>

<script>
import PropertyDataList from "@modules/PropertyData/components/PropertyDataList.vue";
import PropertyDataFilters from "@modules/PropertyData/components/PropertyDataFilters.vue";
import PropertyDataService from "@/services/property-data.service";

export default {
    name: "PropertyDataPage",
    components: {PropertyDataFilters, PropertyDataList },
    data() {
        return {
            items: [],
            meta: {},
            filters: {}
        };
    },

    computed: {

    },

    methods: {

    },
    created() {
        PropertyDataService.getList(this.params)
            .then((data) => {
                this.items = data.data;
                this.meta = data;
            });
    }
};
</script>
