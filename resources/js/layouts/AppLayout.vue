<template>
    <component :is="layout">
        <slot />
    </component>
</template>

<script>
export default {
    name: 'AppLayout',
    computed: {
        layout () {
            const defaultLayout = 'DefaultLayout'
            const layout = this.$route.meta.layout || defaultLayout
            return () => import(`../layouts/${layout}.vue`)
        }
    }
}
</script>
