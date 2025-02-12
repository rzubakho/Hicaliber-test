<template>
    <div >
        {{items}}
    </div>
</template>
<script>
export default {
    props: {
        items: {
            type: Array,
            required: true,
            default: () => []
        },
        meta: {
            type: Object,
            required: true,
            default: () => ({})
        }
    },
    data() {
        return {

        };
    },
    methods: {

    }
};
</script>
