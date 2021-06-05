<template>
    <teleport to="head">
        <title>Welcome hello</title>
    </teleport>
    <layout title="Welcome">
        <h1>Lorem</h1>
    </layout>
</template>

<script>
import Layout from "../Shared/Layout";
export default {
    name: "Welcome",
    components: {Layout},
    props:{
        title:{
            required:true,
            type:String
        }
    },
    metaInfo() {
        return {
            title: `Welcome ${this.title}`,
        }
    },
}
</script>

<style scoped>

</style>
