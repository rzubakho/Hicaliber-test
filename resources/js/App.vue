<template>
    <el-container style="border: 1px solid #eee">
        <property-data-page />
    </el-container>
</template>

<script>

import PropertyDataPage from "@modules/PropertyData/pages/PropertyDataPage.vue";

export default {
    name: 'App',
    components: {PropertyDataPage},
};
</script>
