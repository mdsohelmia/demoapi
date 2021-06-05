<template>
    <main>
        <header>
            <inertia-link href="/">Home</inertia-link>
            <inertia-link href="/about">About</inertia-link>
            <inertia-link href="/contact">Contact</inertia-link>
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>

<script>
export default {
    name: "Layout",
    props: {
        title: String,
    },
    watch: {
        title: {
            immediate: true,
            handler(title) {
                document.title = title
            },
        },
    },
}
</script>

<style scoped>

</style>
